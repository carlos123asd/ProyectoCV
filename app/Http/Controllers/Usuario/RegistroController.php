<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegistroController extends Controller
{
    public function __construct()
    {
       /* $this->middleware([
            "guest"
        ]);

        $this->middleware("auth")->only("index"); //uno, acepta array y cadena
        $this->middleware("auth")->except("index"); //todos excepto uno, acepta array y cadena*/
    }

    public function index()
    {
        return view("usuario.registro");
    }

    public function index_iniciar(){
        return view("usuario.inicio");
    }

    public function agregar_usuario(Request $request){ //validar
        $this->validate($request,[ //comprueba si ya hay un email en bbdd
            "email"=> "required|unique:users",
            "password"=>"required",
            "name"=>"required",
            "surname"=> "required"
        ]);
        User::create([
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "name"=>$request->name,
            "surname"=>$request->surname
        ]);//hace el save tambien (create)
        return redirect()->route("usuario.home");
    }
    

    public function iniciar_sesion(Request $request){
       /* $this->validate($request,[
            "email"=>"required",
            "password"=>"required"
        ]);*/
        if(auth()->attempt($request->only("email","password"))){ //intento de auth y genera sesion
            return redirect()->route("usuario.home");
        }else{
            Session::flash("mensaje",__("message.usuario_session_error"));
            return redirect()->back();
        }
    } 
}
//Solucionar traduccion HECHO
//Vincular estudios y experiencias con user HECHO
//crud de estudios y experiencias para los auth
