<?php


use App\Http\Controllers\CarreraController;
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
Route::group(['middleware' => ['auth']], function () {
    
});
Route::get('home', 'CarreraController@show');
