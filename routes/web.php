<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CompetenciaController;
use App\Http\Controllers\Auth\AprendizajeController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function() {
    Route::post('crearCarrera', 'CarreraController@create');
    Route::resource('/carreras', 'CarreraController');
    Route::get('/carreras/{id}', 'CarreraController@show');

    Route::post('/carreras/{id}/crearPlan', 'PlanController@create');
    Route::delete('/carreras/{id}/{plan}', 'PlanController@destroy');
    Route::put('/carreras/{id}/{plan}', 'PlanController@update');
    Route::get('/carreras/{id}/{plan}', 'PlanController@show');
    Route::resource('/usuarios', 'UserController');
    Route::post('register', 'UserController@create');

    Route::get('/carreras/{id}/{plan}/competencias', 'CompetenciaController@index');
    Route::get('/carreras/{id}/{plan}/aprendizajes', 'AprendizajeController@index');


    Auth::routes();
    Route::get('/home', 'HomeController@index');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('/login', 'Auth\LoginController@login');
});




/*

Route::group(['middleware' => ['auth']], function () {
    
}); */ 






