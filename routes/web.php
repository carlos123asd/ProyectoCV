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
Route::group(["prefix"=>"/experiencias"], function(){
    Route::get("/",[ExperienciasController::class,'index'])->name("experiencia.tabla");
    Route::get("/crearview/{id?}",[ExperienciasController::class,'index_crear'])->name("experiencia.viewcrear");
    Route::get("/actualizarview/{id}",[ExperienciasController::class,'index_actualizar'])->name("experiencia.viewactualizar");
    Route::post("/crear",[ExperienciasController::class,'crear'])->name("experiencia.crear");
    Route::post("/actualizar/{id}",[ExperienciasController::class,'actualizar'])->name("experiencia.actualizar");
    Route::delete("/eliminar",[ExperienciasController::class,'eliminar'])->name("experiencia.eliminar");
});

Route::group(["prefix"=>"/estudios"], function(){
    Route::get("/",[EstudiosController::class,"index"])->name("educacion.lista");
    Route::get("/crear",[EstudiosController::class,"crearview"])->name("educacion.crear");
    Route::post("/create",[EstudiosController::class,"crear"])->name("educacion.create");
    Route::post("/modificar/{id}",[EstudiosController::class,"actualizar"])->name("educacion.modificar");
    Route::get("/editar/{id}",[EstudiosController::class,"editar"])->name("educacion.editar");
    Route::delete("/eliminar",[EstudiosController::class,"eliminar"])->name("educacion.eliminar");
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
    Route::post("/registrar",[RegistroController::class,"agregar_usuario"])->name("usuario.registrar");
    Route::get("/generar",[RegistroController::class,"generar_informe"])->name("usuario.generar");
    Route::view("/home","recurso.index")->name("usuario.home")->middleware("auth");
    Route::get("/cerrar_sesion",[UsuarioController::class,"cerrar_sesion"])->name("usuario.cerrar_sesion")->middleware("auth");
});


//aplicar los plurales -> 1 en singular 0 en plural y 3 varios = plural  HECHO

/*De que manera se puede autogenerar todos los archivos necesarios para un modelo (crear)
 Respuesta=> podemnos acompañar el make o alguna sentencia contructiva mediante argumentos simplicados, por ejemplo:
 - php artisan make:model -acf...(las que queramos)
 -a(all:migration,seeder,factory,policy,resource controller,clases para el modelo)
 -c(controller)
 -f(factory)
 -m(migration)
*/ //HECHO

//aplicar como automatizar la informacion (nutrirla) una base de datos
//como volcar informacion de una base de datos a un archivo
