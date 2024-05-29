<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash, Validator;
use Carbon\Carbon;
use App\Models\Persona;
use App\Models\MensajeProducto;

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
                              ->get(); 

        $msg = $msg->map(function ($item) {
            foreach ($item->getAttributes() as $key => $value) {
                if (is_string($value)) {
                    if (!mb_check_encoding($value, 'UTF-8')) {
                        dd('Invalid UTF-8 encoding detected in field: ' . $key . ' with value: ' . $value);
                        $value = mb_convert_encoding($value, 'UTF-8', 'auto');
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
