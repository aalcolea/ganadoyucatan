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
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'El correo electrónico es requerido',
            'password.required' => 'Por favor, escribe una contraseña',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres'
        ];

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            $userId = Auth::id();
            $currentDateTime = Carbon::now();
            Persona::where('idpersona', $userId)->update(['ult_vez' => $currentDateTime]);
            return response()->json([
                'message' => 'Inicio de sesion exitoso',
                'user' = $user,
                'token' => $token,
                'typealert' => 'success']);
        }else{
            return response()->json('message' => 'Usuario o contraseña incorrecta')
        }
    }
}
