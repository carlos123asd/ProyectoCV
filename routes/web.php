<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\ExperienciasController;
use App\Http\Controllers\HolaController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\Usuario\RegistroController;
use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/hola", function(){
    return "hola mundo";
});

Route::get("/carlos/{nombre?}", [HolaController::class,"index"]);

Route::get("/notas/{nota?}/{resultado?}", [NotasController::class,"index"])->name("notas.get");
Route::post("/notas", [NotasController::class,"calcularnotas"]);

//Experiencia
Route::get("/crear",[ExperienciasController::class,'crear']);
Route::get("/actualizar/{id}/{nombre}",[ExperienciasController::class,'actualizar']);
Route::get("/experiencias",[ExperienciasController::class,'index'])->name("experiencia.tabla");

//Estudios
/*Route::group(["prefix"=>"/estudios"],function(){
    Route::get("/crear", function(){
        return view("educacion.crear",["estudio"=>null]);
    });
    Route::get("/",[EstudiosController::class,'index']);
    Route::get("/editar/{id}",[EstudiosController::class,"editar"])->name("educacion.modificar");
    Route::post("/create",[EstudiosController::class,'crear'])->name("educacion.create");
    Route::post("/edit/{id}",[EstudiosController::class,'actualizar'])->name("educacion.edit");
});*/

Route::group(["prefix"=>"/estudios"], function(){
    Route::get("/",[EstudiosController::class,"index"])->name("educacion.lista");
    Route::get("/crear",[EstudiosController::class,"crearview"])->name("educacion.crear");
    Route::post("/create",[EstudiosController::class,"crear"])->name("educacion.create");
    Route::post("/modificar/{id}",[EstudiosController::class,"actualizar"])->name("educacion.modificar");
    Route::get("/editar/{id}",[EstudiosController::class,"editar"])->name("educacion.editar");
    Route::get("/eliminar/{id?}",[EstudiosController::class,"eliminar"])->name("educacion.eliminar");
});


//Empresa
Route::group(["prefix"=>"/empresas"],function(){
    Route::get("/",[EmpresaController::class,"index"])->name("empresa.lista");
});

//usuarios
Route::group(["prefix"=>"/usuario"],function(){
    Route::get("/",[RegistroController::class,"index"])->name("usuario.registro");
    Route::get("/iniciar",[RegistroController::class,"index_iniciar"])->name("usuario.inicio");
    Route::post("/inicio",[RegistroController::class,"iniciar_sesion"])->name("usuario.iniciar");
    Route::post("/registrar/{id?}",[RegistroController::class,"agregar_usuario"])->name("usuario.registrar")->middleware("auth");
    Route::view("/home","recurso.index")->name("usuario.home")->middleware("auth");
    Route::get("/cerrar_sesion",[UsuarioController::class,"cerrar_sesion"])->name("usuario.cerrar_sesion")->middleware("auth");
});



