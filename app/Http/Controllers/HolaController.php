<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaController extends Controller
{
    function index(string $nombre = null)
    {
        $coleccion = [
            "curso"=>"primero",
            "modalidad"=>"formacion profesional",
            "centro"=>"IFP"
        ];
        return view("carlos",["nombre"=>$nombre,"coleccion"=>$coleccion]);
    }
}
