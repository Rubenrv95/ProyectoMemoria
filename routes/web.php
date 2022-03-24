<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('home');
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');


Route::post('crearCarrera', 'CarreraController@create');
Route::resource('/carreras', 'CarreraController');
Route::post('crearPlan', 'CarreraController@createPlan');

Route::resource('/usuarios', 'UserController');
Route::post('register', 'UserController@create');


/*

Route::group(['middleware' => ['auth']], function () {
    
}); */ 






