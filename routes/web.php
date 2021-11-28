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
Route::resource('/carreras', 'CarreraController')->middleware('auth');
Route::get('/login/logout', 'Auth\LoginController@logout');
Route::get('home', 'CarreraController@show');
Route::post('create', 'CarreraController@create');
Route::post('register', 'UsuarioController@create_user');


Route::get('modificarCarrera', function() {
    return view('modals.modificarCarrera');
});

Route::group(['middleware' => ['auth']], function () {
    
});