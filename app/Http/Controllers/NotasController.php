<?php
namespace App\Http\Controllers;

class NotasController extends Controller 
{
    function index($nota=null,$resultado=null)
    {
      return view("notas",["nota"=>$nota,"resultado"=>$resultado]);
    }

    function calcularnotas()
    {
        $nota = request("nota");
        $resultado = null;

        if($nota < 5)
        {  //,,notable,sobre,bien
            $resultado = "insuficiente";
        }else if($nota == 5)
        {
            $resultado = "Suficiente";
        }else if($nota > 5 && $nota <= 7)
        {
            $resultado = "Notable";
        }else if($nota > 7 && $nota <= 10)
        {
            $resultado = "Sobresaliente";
        }
       // return view("notas",["nota"=>$nota,"resultado"=>$resultado]);
       return redirect()->route("notas.get",["nota"=>$nota,"resultado"=>$resultado]); //->with(["nota"=>$nota,"resultado"=>$resultado]); Mensajes para ususario, flash
    }
}
