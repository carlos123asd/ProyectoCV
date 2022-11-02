<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Experiencia;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienciasController extends Controller
{
    //
    public function index(){
        $experiencias = "";
        if(Auth()->user()->type_user == User::TYPE_ADMIN){
            $experiencias = Experiencia::all();
        }else if(Auth()->user()->type_user == User::TYPE_USER){
            $experiencias = Experiencia::where("id_user",auth()->user()->id)->get(); //Todos los datos
        }
        return view("experiencia.index",["experiencias"=>$experiencias]);
    }

    public function index_crear(){
        $empresas= Empresa::all();
        return view("experiencia.crear",["empresas"=>$empresas,"id"=>null]);
    }

    public function index_actualizar(Request $request){
        $empresa= Empresa::all();
        $experiencia= Experiencia::find($request->id);
        $id=$experiencia->id;
        return view("experiencia.crear",[
            "empresas"=>$empresa,
            "id"=>$id,
            "experiencia"=>$experiencia
        ]);
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
        $experiencia= Experiencia::find($request->id);
        $experiencia->update([
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "fecha_inicio"=>$request->fecha_inicio,
            "fecha_fin"=>$request->fecha_fin,
            "empresa_id"=>$request->empresa_id,
            "id_user"=>auth()->user()->id
        ]);
        return redirect()->route("experiencia.tabla");
    }

    public function eliminar(Request $request){
        $experiencia = Experiencia::find($request->id);
        $experiencia->delete();
        return response("ok");
    }
}

//como pasar el csrf por ajax HECHO
//estudios crud y filtrar HECHO / falta filtrar
//los usuarios tengan roles, añadir un campo mas (tipos:admin y user) HECHO
//si eres admin puedes ver todo y si eres user solo lo tuyo HECHO