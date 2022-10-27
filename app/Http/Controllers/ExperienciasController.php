<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Experiencia;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienciasController extends Controller
{
    //
    public function index(){
        $experiencias = Experiencia::where("id_user",auth()->user()->id)->get(); //Todos los datos
        return view("experiencia.index",["experiencias"=>$experiencias]);
    }

    public function index_crear(){
        $empresas= Empresa::all();
        return view("experiencia.crear",["empresas"=>$empresas,"id"=>""]);
    }

    public function crear(Request $request){
        $this->validate($request,[
            "nombre"=>"required",
            "descripcion"=>"required",
            "fecha_inicio"=>"required",
            "empresa_id"=>"required"
        ]);
        Experiencia::create([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "fecha_inicio"=>$request->fecha_inicio,
            "fecha_fin"=>$request->fecha_fin,
            "empresa_id"=>$request->empresa_id,
            "id_user"=>auth()->user()->id
        ]);
        return redirect()->route("experiencia.tabla");
    }

    public function actualizar(Request $request){
        $this->validate($request,[
            "nombre"=>"required",
            "descripcion"=>"required",
            "fecha_inicio"=>"required",
            "empresa_id"=>"required"
        ]);
        Experiencia::updated([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "fecha_inicio"=>$request->fecha_inicio,
            "fecha_fin"=>$request->fecha_fin,
            "empresa_id"=>$request->empresa_id,
            "id_user"=>$request->session()->get(auth()->user()->id)
        ]);
        return redirect()->route("experiencia.tabla");
    }

    public function eliminar(Request $request){
        $experiencia = Experiencia::find($request->id);
        $experiencia->delete();
        return response();
    }
}

//como pasar el csrf por ajax 
//estudios crud y filtrar
//los usuarios tengan roles, añadir un campo mas (tipos:admin y user)
//si eres admin puedes ver todo y si eres user solo lo tuyo