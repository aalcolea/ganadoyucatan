<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\Models\Persona;
use Carbon\Carbon;

class APIAuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email' => 'required',
            'telefono' => 'required|numeric|unique:persona,email_user|min:10']);
        /*primero probar login*/
    }
}
