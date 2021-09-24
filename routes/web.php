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
    });

    Route::get('/sistema', 'SystemController@mainView');

    Route::name('role.')->group(function () {
        Route::get('/roles','SystemController@roleIndex');
        Route::post('/role','SystemController@roleStore');
    });

    Route::name('permission.')->group(function () {
        Route::get('/permissions','SystemController@permissionIndex');
        Route::post('/permission','SystemController@permissionStore');
    });
    
});