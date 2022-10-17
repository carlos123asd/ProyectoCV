<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use DateTime;
use Illuminate\Http\Request;

class ExperienciasController extends Controller
{
    //
    public function index(){
        $experiencias = Experiencia::all(); //Todos los datos
        return view("experiencia.index",["experiencias"=>$experiencias,"aeropuerto"=>"barajas"]);
    }

    public function crear(){
        $experiencia = new Experiencia();
        $experiencia->nombre = "conductor".rand(0,9999);
        $experiencia->descripcion = "conducir";
        $experiencia->fecha_inicio = new DateTime("2022-03-23 00:00:00");
        $experiencia->fecha_fin = null;
        $experiencia->save();
    }

    public function actualizar($id,$nombre){
        $experiencia = Experiencia::find($id);
        $experiencia->nombre = $nombre;
        $experiencia->save();
      //  dd($experiencia);
    }
}
