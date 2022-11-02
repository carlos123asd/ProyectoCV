<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducacionRequest;
use App\Models\Estudio;
use App\Models\User;
use Illuminate\Http\Request;

class EstudiosController extends Controller
{
    public function index(){
        $estudios = "";
        if(Auth()->user()->type_user == User::TYPE_ADMIN){
            $estudios = Estudio::all();
        }else if(Auth()->user()->type_user == User::TYPE_USER){
            $estudios = Estudio::where("id_user",auth()->user()->id)->get();
        }
        return view("educacion.index",["estudios"=>$estudios]);
    }

    public function crear(EducacionRequest $request){
        Estudio::create([
            "grado"=>$request->grado,
            "nombre"=>$request->nombre,
            "fecha_inicial"=>$request->fecha_inicial,
            "fecha_final"=>$request->fecha_final,
            "id_user"=>auth()->user()->id
        ]);
        return redirect()->route("educacion.lista");
    }

    public function crearview(){
        return view("educacion.crear",["id"=>null]);
    }

    public function editar($id){
        $educacion = Estudio::find($id);
        return view("educacion.crear",["educacion"=>$educacion,"id"=>$id]);
    }

    public function actualizar(Request $request){
         $request->validate([
            "grado"=>"required|min:3",
            "nombre"=>"required",
            "fecha_inicial"=>"required",
        ]);
        $estudio = Estudio::find($request->id);
        $estudio->update([
            "nombre"=>$request->nombre,
            "grado"=>$request->grado,
            "fecha_inicial"=>$request->fecha_inicial,
            "fecha_final"=>$request->fecha_final,
            "id_user"=>auth()->user()->id
        ]);
        return redirect()->route("educacion.lista");
    }

    public function eliminar(Request $request){
        $estudio = Estudio::find($request->id);
        $estudio->delete();
        return response("ok");    //si queremos responder => "->json(["respuesta"=>"ok"]);"
    }
}

