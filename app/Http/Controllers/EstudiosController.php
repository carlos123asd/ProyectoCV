<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudiosController extends Controller
{
    public function index(){
        $estudios = Estudio::all();
        return view("educacion.index",["estudios"=>$estudios]);
    }

    public function crear(Request $request){
        $resultado = $request->validate([
            "grado"=>"required|min:3",
            "nombre"=>"required",
            "fecha_inicial"=>"required",
        ]);
        $estudios = Estudio::all();
        $estudio = new Estudio();
        $estudio->grado = request("grado");
        $estudio->nombre = request("nombre");
        $estudio->fecha_inicial = request("fecha_inicial");
        $estudio->fecha_final = request("fecha_final");
        $estudio->save();
        return view("educacion.index",["estudios"=>$estudios]);
    }

    public function crearview(){
        return view("educacion.crear",["id"=>null]);
    }

    public function editar($id){
        $estudio = Estudio::find($id);
        return view("educacion.crear",["estudio"=>$estudio,"id"=>$id]);
    }

    public function actualizar($id){
        $estudio = Estudio::find($id);
        $estudio->grado = request("grado");
        $estudio->nombre = request("nombre");
        $estudio->fecha_inicial = request("fecha_inicial");
        $estudio->fecha_final = request("fecha_final");
        $estudio->save();
        return redirect()->action([EstudiosController::class,'index']);
    }

    public function eliminar($id){
        $estudio = Estudio::find($id);
        $estudio->delete();
        return response()->json(["respuesta"=>"ok"]);
    }
}

