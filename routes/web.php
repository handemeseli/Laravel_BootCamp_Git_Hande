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

Route::get('/', 'LoginController@loginView');
Route::post('/login','LoginController@login')->name('login');

Route::get('/merhaba','HomeController@hello');
Route::get('/index','HomeController@indexView');
Route::get('/create', 'HomeController@createView');
Route::post('/create', 'HomeController@create');
Route::get('/sil/{id}', 'HomeController@delete')->where(array('id'=> '[0-9]+'));
Route::post('/guncelle/{id}', 'HomeController@update')->where(array('id'=>'[0-9]+'));;
Route::get('/guncelle/{id}','HomeController@updateView')->where(array('id'=> '[0-9]+'));

Route::get('/user-import','ExcelUploadController@userImportView')->name('user.upload');
Route::post('/user-import-post','ExcelUploadController@userImport')->name('user.import');

Route::get('/indir','ExcelDownloadController@userDownload')->name('user.download');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/urun-ekle','ProductController@productCreateView')->name('product.add');
Route::post('/urun-kaydet','ProductController@productCreate')->name('product.create');

Route::get('/urun-listele','ProductController@productView')->name('product.list');

