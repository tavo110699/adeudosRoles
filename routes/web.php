<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\C_informacionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\AdeudosController;

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
    //  return view('auth.login');
    return view('auth.login');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['midleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('alumnos', AlumnosController::class);
    Route::resource('inicio', InicioController::class);
    Route::resource('carreras', CarrerasController::class);
    Route::resource('departamentos', DepartamentosController::class);
    Route::resource('adeudos', AdeudosController::class);
    Route::get('buscar', function () {
        return view('adeudos.search');
    });
    Route::name('download-baja')->get('/download-baja/{id}', 'App\Http\Controllers\AdeudosController@printPDFbaja');
    Route::name('download-titulacion')->get('/download-titulacion/{id}', 'App\Http\Controllers\AdeudosController@printPDFtitulacion');
    Route::name('download-posgrado')->get('/download-posgrado/{id}', 'App\Http\Controllers\AdeudosController@printPDFposgrado');

});
Route::get('/inicio/', 'App\Http\Controllers\InicioController@index');
Route::get('/c_informacion/', 'App\Http\Controllers\C_informacionController@index');

//con esto se accede a todas las rutas de este controlador
//Route::get('/C_informacion/create', [C_informacionController::class, 'create']);
Route::resource('c_informacion', C_informacionController::class);
Route::resource('c_computo', C_informacionController::class);
Route::resource('dep_desarrolloacademico', C_informacionController::class);
Route::resource('dept_academico', C_informacionController::class);



