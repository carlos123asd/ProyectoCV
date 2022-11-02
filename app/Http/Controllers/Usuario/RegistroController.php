<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Estudio;
use App\Models\Experiencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        return view("usuario.registro",["tipos_users"=>User::ARRAY_TYPE]);
    }

    public function index_iniciar(){
        return view("usuario.inicio");
    }

    public function agregar_usuario(Request $request){ //validar
        $this->validate($request,[ //comprueba si ya hay un email en bbdd
            "email"=> "required|unique:users",
            "password"=>"required",
            "name"=>"required",
            "surname"=> "required",
            "type_user"=>"required"
        ]);
        User::create([
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "name"=>$request->name,
            "surname"=>$request->surname,
            "type_user"=>$request->type_user
        ]);//hace el save tambien (create)
        return redirect()->route("usuario.home");
    }
    

    public function iniciar_sesion(Request $request){
        if(auth()->attempt($request->only("email","password"))){ //intento de auth y genera sesion
            return redirect()->route("usuario.home");
        }else{
            Session::flash("mensaje",__("message.usuario_session_error"));
            return redirect()->back();
        }
    } 

    public function generar_informe(){
        $experiencias = Experiencia::all();
        $educacion = Estudio::all();
        $data = [
            "Experiencias"=>$experiencias,
            "Educacion"=>$educacion,
        ];
        $jump = "\r\n";
        $separator = "\t";

        Storage::disk('local')->put('cv-project-'.auth()->user()->id.'.txt',$$experiencias);
        //https://laravel.com/docs/9.x/filesystem#main-content
    }
}

