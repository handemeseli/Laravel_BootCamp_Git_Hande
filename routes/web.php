<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
Route::get('/admin', 'AdminController@index');

Route::get('/merhaba','HomeController@hello');
Route::get('/index','HomeController@indexView');
Route::get('/create', 'HomeController@createView');
Route::post('/create', 'HomeController@create');
Route::get('/sil/{id}', 'HomeController@delete')->where(array('id'=> '[0-9]+'));
Route::post('/guncelle/{id}', 'HomeController@update');
Route::get('/guncelle/{id}','HomeController@updateView')->where(array('id'=> '[0-9]+'));
