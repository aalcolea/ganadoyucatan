<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash, Validator;
use Carbon\Carbon;
use App\Models\Persona;

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
        $id = Auth::id();
        $msg = MensajeProducto::where('vendedorid', $id)->where('status', '0')->get(); 
        return response()->json(['msg' => $msg]);
    }
}
