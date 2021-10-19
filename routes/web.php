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

Route::get('/', 'HomeController@index');

Route::get('/about', 'AboutController@index');

Route::get('/contact', 'ContactController@index');

Route::get('/form', 'FormController@index');

Route::get('/buku', 'BukuController@index');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');

Route::get('/buku/{buku}', 'BukuController@show')->name('buku.show');

Route::get('/buku/edit/{buku}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/{buku}', 'BukuController@update')->name('buku.update');

Route::post('/buku/delete/{buku}', 'BukuController@delete')->name('buku.delete');