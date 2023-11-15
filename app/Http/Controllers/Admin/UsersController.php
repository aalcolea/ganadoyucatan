<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Hash;
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
   /* public function postUProfInfo(Request $request, $id){
        $nombre = e($request->input('txtNombre'));
        $apellido = e($request->input('txtApellido'));
        
        $u = Persona::findOrFail($id);
        

    }*/
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
