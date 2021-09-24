<?php

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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::name('trabajador.')->group(function () {
        Route::get('/trabajador','TrabajadorController@mainView')->name('view');
        Route::get('/trabajadores','TrabajadorController@index')->name('index');
        Route::post('/trabajador','TrabajadorController@store')->name('index');
        Route::delete('/trabajador/{trabajador}','TrabajadorController@destroy');
    });

    Route::get('/sistema', 'SystemController@mainView');

    //falta agregar la ruta para asigar permisos
    Route::name('role.')->group(function () {
        Route::get('/roles','SystemController@roleIndex');
        Route::post('/role','SystemController@roleStore');
    });

    //falta agregar la ruta para asigar roles
    Route::name('permission.')->group(function () {
        Route::get('/permissions','SystemController@permissionIndex');
        Route::post('/permission','SystemController@permissionStore');
    });

    Route::name('evaluacion.')->group(function () {
        Route::get('/evaluaciones','EvaluacionController@evaluacionIndex');
        Route::get('/evaluacion','EvaluacionController@mainView');
        Route::post('/evaluacion','EvaluacionController@evaluacionStore');
        Route::delete('evaluacion/{evaluacion}','EvaluacionController@evaluacionDestroy');
    });

    Route::name('factor.')->group(function () {
        Route::get('/factores','EvaluacionController@factorIndex');
        Route::post('/factor','EvaluacionController@factorStore');
        Route::delete('factor/{factor}','EvaluacionController@factorDestroy');
    });

    Route::name('pregunta.')->group(function () {
        Route::get('/preguntas','EvaluacionController@preguntaIndex');
        Route::post('/pregunta','EvaluacionController@preguntaStore');
        Route::delete('pregunta/{pregunta}','EvaluacionController@preguntaDestroy');
    });

    Route::name('proyecto.')->group(function () {
        Route::get('/proyecto','ProyectoController@mainView')->name('view');
        Route::get('/proyectos','ProyectoController@index')->name('index');
        Route::post('/proyecto','ProyectoController@store')->name('index');
        Route::delete('/proyecto/{proyecto}','ProyectoController@destroy');
    });
    
});
