<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index($id)
    {
        $empresa = Empresa::find($id);
        $view = view("empresa.index",["empresa"=>$empresa]);
        return $view;
    }
}
