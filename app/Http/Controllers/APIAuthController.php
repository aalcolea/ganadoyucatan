<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class APIAuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email' => 'required',
            'telefono' => 'required|numeric|unique:persona,email_user|min:10']);
        /*pr
        imero probar login*/
        return response()->json('message' => 'Hola');
    }
    public function login(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
        $messages = [
            'email.required' => 'Cuenta erronea y requerida',
            'password.required' => 'Por favor escribe una contraseña',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo crear el token'], 500);
        }
        $userId = Auth::id();
        $currentDateTime = Carbon::now();
        Persona::where('id', $userId)->update(['ult_vez' => $currentDateTime]);
        return response()->json(compact('token'));
    }
}
