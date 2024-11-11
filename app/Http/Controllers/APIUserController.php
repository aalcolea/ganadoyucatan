<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash, Validator;
use Carbon\Carbon;
use App\Models\Persona;
use App\Models\MensajeProducto;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
class APIUserController extends Controller
{
    public function getUProfInfo(){
        $id = Auth::id();
        $user = Persona::where('idpersona', $id)->first();
        return response()->json(['user' => $user]);
    }
    public function updateProfile(Request $request){
        $id = Auth::id();
        $data = $request->all();
        $u = Persona::findOrFail($id);
        $u->nombres = $data['name'];
        $u->apellidos = $data['lastname'];
        $u->asociacion = $data['asociacion'];
        $u->save();
        return response()->json(['message' => 'Editado con exito'], 200);
    }
    public function updatePic(Request $request){
        $id = Auth::id(); 
        $u = Persona::findOrFail($id);
        if ($request->input('imagen')) {
            $imagenBase64 = $request->input('imagen');
            $imagen = base64_decode($imagenBase64);
            if ($imagen === false) {
                return response()->json(['message' => 'La imagen no pudo ser decodificada'], 400);
            }
            $imgWebp = imagecreatefromstring($imagen);
            if (!$imgWebp) {
                return response()->json(['message' => 'Error al procesar la imagen'], 500);
            }
            $nombreArchivo = $u->email_user . '.webp';
            $destinationPath = Storage::disk('userspics')->path($nombreArchivo);
            
            if (!imagewebp($imgWebp, $destinationPath)) {
                return response()->json(['message' => 'Error al guardar la imagen'], 500);
            }
            imagedestroy($imgWebp);
            $u->foto = $nombreArchivo;
            $u->save();

            return response()->json(['message' => 'Imagen actualizada correctamente para: ' . $u->email_user], 200);
        } else {
            return response()->json(['message' => 'No se bien la imagen para enviar'], 400);
        }
    }
    public function updateFiscoData(Request $request){
        $id = Auth::id();
        $data = $request->all();
        $u = Persona::findOrFail($id);
        $u->nit = $data['nit'];
        $u->nombrefiscal = $data['nombrefiscal'];
        $u->direccionfiscal = $data['direccionfiscal'];
        $u->save();
        return response()->json(['message' => 'Editado con éxito'], 200);
    }
    public function getUserMsgs(){
        try {
            $id = Auth::id();
            if (!$id) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $msg = MensajeProducto::where('vendedorid', $id)
                                  ->where('status', '!=', '2')
                                  ->orderBy('id', 'desc')
                                  ->get(); 

            $msg = $msg->map(function ($item) {
                foreach ($item->getAttributes() as $key => $value) {
                    if (is_string($value)) {
                        if (!mb_check_encoding($value, 'UTF-8')) {
                            $value = preg_replace('/[^\x{0009}\x{000A}\x{000D}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}\x{10000}-\x{10FFFF}]/u', '', $value);
                        }
                        $item->$key = $value;
                    }
                }
                return $item;
            });
            return response()->json(['msg' => $msg]);
        } catch (\Exception $e) {
            dd('Error fetching mensajes: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function updateMessageStatus(Request $request){
        $messageId = $request->input('messageId');
        if(!$messageId){
            return response()->json(['error'=>'Message id requerido'], 400);
        }
        $message = MensajeProducto::find($messageId);
        if (!$message) {
            return response()->json(['error' => 'MessageId no existe'], 404);
        }
        $message->delete();
         return response()->json(['success' => 'Message eliminado exitosamente'], 200);
    }
    public function store(Request $request){
        $message = new MensajeProducto();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->messagebody = $request->messagebody;
        $message->save();

        event(new NewMessageNotification($message));

        return response()->json(['message' => 'Mensaje creado y notificación enviada']);
    }
}
