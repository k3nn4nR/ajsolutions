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

    Route::get('/grupostrabajo', function () {
        return view('grupostrabajo');
    });

    Route::get('/reportes', function () {
        return view('reportes');
    });

    Route::get('/tests', function () {
        return view('evaluaciones');
    });

    Route::get('/home', 'HomeController@index')->name('home');

    Route::name('trabajador.')->group(function () {
        Route::get('/trabajador','TrabajadorController@mainView')->name('view');
        Route::get('/trabajadores','TrabajadorController@index')->name('index');
        Route::get('/trabajadores-evaluaciones/{trabajador}','TrabajadorController@getEvaluaciones')->name('evaluaciones.index');
        Route::put('/trabajador-evaluaciones','TrabajadorController@storeEvaluacion');
        Route::get('/trabajadores-evaluaciones-historico/{trabajador}','TrabajadorController@getEvaluacionesHistorico')->name('evaluaciones.historico.index');
        Route::post('/trabajador','TrabajadorController@store');
        Route::delete('/trabajador/{trabajador}','TrabajadorController@destroy');
        Route::get('/trabajador/{dni}/evaluacion/{id}','TrabajadorController@getEvaluacion');
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
        Route::post('/evaluacion-trabajador','EvaluacionController@storEvaluacionTrabajador');
        Route::get('/evaluacion-trabajador/{id}','EvaluacionController@getResult');
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
        Route::get('/proyectos-all','ProyectoController@getAll');
        Route::post('/proyecto','ProyectoController@store');
        Route::post('/proyecto-trabajadores','ProyectoController@storeGrupoTrabajo');
        Route::get('/proyecto-trabajadores','ProyectoController@getGrupoTrabajo');
        Route::post('/proyecto-trabajador-delete','ProyectoController@destroyTrabajador');
        Route::post('/proyecto-trabajador-reemplazar','ProyectoController@reempalzarTrabajador');
        Route::post('/proyecto-trabajador-agregar','ProyectoController@agregarTrabajador');
        Route::post('/proyecto-finalizar','ProyectoController@finishProyecto');
        Route::delete('/proyecto/{proyecto}','ProyectoController@destroy');
        Route::get('/proyecto/{id}/edit','ProyectoController@edit');
        Route::get('/proyecto/{id}/trabajadores','ProyectoController@getTrabajadores');
    });

    Route::name('usuario.')->group(function () {
        Route::get('/usuario','UserController@index');
        Route::post('/usuario','UserController@store');
        Route::put('/usuario','UserController@update');
        Route::delete('/usuario/{user}','UserController@destroy');
    });
});
