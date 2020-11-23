<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
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

Route::get('/', HomeController::class);
//CUANDO SON VARIAS RUTAS DENTRO DE UN CONTROLADOR, DEBEMOS LLAMAR LAS FUNCIONES DENTRO DE ARRAYS
Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index'); 

Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');

Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');

Route::get('cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');

Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');

/*DE ESTA MANERA SE LLAMABAN LAS RUTAS EN LARAVEL 7
Route::get('/', 'HomeController');
Route::get('cursos', 'CursoController@index'); 
Route::get('cursos/create', 'CursoController@create');
Route::get('cursos/{cursos}', 'CursoController@show');*/

/*
Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) { //con el signo de interrogacion, le decimos al programa que la variable es opcional
    if($categoria){
        return "Bienvenido al curso $curso, de la categoria $categoria";
    }else{
        return "Bienvenido al curso: $curso";
    }
    
    //return "Bienvenido al curso $curso, de la categoria $categoria";
});*/