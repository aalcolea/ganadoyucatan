<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash, Validator;
use Carbon\Carbon;
use App\Models\Persona;
class UsersController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }
    public function getUsers(Request $request){
        $orderBy = $request->get('sort', 'nombres');
        $users = Persona::orderBy($orderBy)->paginate(25);
        $data = ['users' => $users];
        return view('Admin.Users.usersHome', $data);
    }
    public function getUserInfo($id){
    $user = Persona::find($id); 
    return view('partials.user_info', compact('user'));
    }
    public function getUProfInfo(){
        $id = Auth::id();
        $user = Persona::where('idpersona', $id)->get();
        $user = $user[0];
        $data = ['user'=> $user];
        return view('Admin.Users.profile', $data);
    }
    public function postUProfInfo(Request $request, $id){
        $rules = [
            'password' => 'required|min:6',
            'cpassword' => 'required|min:6|same:password',
        ];
        
        $messages = [
            'password.required' => 'Por favor escriba una contraseña',
            'password.min' => 'La contraseña debe contener al menos 6 caracteres',
            'cpassword.required' => 'Por favor escriba la confirmación de contraseña',
            'cpassword.min' => 'La contraseña debe contener al menos 6 caracteres',
            'cpassword.same' => 'Las contraseñas deben ser iguales',
        ];
        $nombre = e($request->input('txtNombre'));
        $apellido = e($request->input('txtApellido'));
        $pass = Hash::make($request->input('txtPassword'));$validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return back()->withErrors($validator)->with('message', 'Se ha producdio un error')->with('typealert', 'danger');
        }else{
        
            $u = Persona::findOrFail($id);
            $u->nombres = $nombre;
            $u->apellidos = $apellido;
            $u->password = $pass;
            if($u->save()){
                return back();
            } 
        }
    }
    public function postEditUser(Request $request, $id){
        $nombre = e($request->input('txtNombre'));
        $apellido = e($request->input('txtApellido'));
        $number = e($request->input('txtTelefono'));
        $rolid = e($request->input('listRolid'));
        $status = e($request->input('listStatus'));
        $pass = Hash::make($request->input('txtPassword'));
        
        $u = Persona::findOrFail($id);
        $u->nombres = $nombre;
        $u->apellidos = $apellido;
        $u->email_user = $number;
        $u->rolid = $rolid;
        $u->status = $status;
        $u->password = $pass;
        if($u->save()){
            return back();
        }else{
            echo "error";
        }
    }
    public function reactiveAccount($id){
        $user = Persona::find($id);
        $currentDateTime = Carbon::now();
        $user->rolid = '6';
        $user->updated_at = $currentDateTime;
        if($user->save()){
            return true;
        }else{
            return false;
        }

    }
}
