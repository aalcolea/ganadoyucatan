<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash, Validator;
use Carbon\Carbon;
use App\Models\Persona;
use App\Models\MensajeProducto;
use App\Events\NewMessageNotification;
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
        return response()->json(['message' => 'Editado con éxito'], 200);
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
