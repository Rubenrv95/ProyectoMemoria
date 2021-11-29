<?php


use App\Http\Controllers\CarreraController;
use App\Http\Controllers\UsuarioController;
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
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/logout', 'Auth\LoginController@logout');


Route::post('create', 'CarreraController@create');
Route::resource('/carreras', 'CarreraController');
Route::get('deleteCarrera/{id}', 'CarreraController@destroy');


Route::get('/planes', 'CarreraController@verPlan');

Route::post('register', 'UsuarioController@create_user');


Route::group(['middleware' => ['auth']], function () {
    
});