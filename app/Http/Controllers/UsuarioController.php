<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{

    public function loginUsuario(Request $request){
        $username = $request->input('usuario');
        $password = $request->input('password');

        $usuario = DB::connection("mysql")->table("users")
        ->where("usuario", $username)
        ->orWhere("email", $username)
        ->first();

        if (!$usuario) {
            return response()->json(["No encontramos ningún usuario registrado con el usuario/correo ingresado", 0], 200);
        } else {
            if($usuario->password == md5($password)){
                Session::flush();
                Session::start();
                Session::put('id', $usuario->id);
                Session::put('nombre', $usuario->nombre);
                Session::put('email', $usuario->email);
                Session::put('imagen', $usuario->imagen);
                Session::put('rol', $usuario->rol);
                Session::put('logueado', true);
                
                return response()->json(["Bienvenido ".$usuario->nombre, 1], 200);
            }else{
                return response()->json(["Contraseña incorrecta", 0], 200);
            }
        }
    }

    public function misDatos(){
    
        $idUsuario = Session::get('id');

        $usuario = DB::connection("mysql")->table("users")
        ->where("id", $idUsuario)
        ->first();
        
        return response()->json($usuario, 200);
        
    }


    public function verificarLogin(){
        if(Session::has('logueado')){
            return response()->json(1, 200);
        }else{
            return response()->json(0, 200);
        }
    }


}
