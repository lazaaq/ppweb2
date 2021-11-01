<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes([
    'register' => false,
    'reset' => false,
]);



Route::get('/', 'HomeController@index');

Route::get('/about', 'AboutController@index')->name('about');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/form', 'FormController@index');

Route::get('/buku', 'BukuController@index')->name('buku');
Route::get('/buku/create', 'BukuController@create')->name('buku.create');
Route::post('/buku', 'BukuController@store')->name('buku.store');

Route::get('/buku/search', 'BukuController@search')->name('buku.search');

Route::get('/buku/{buku}', 'BukuController@show')->name('buku.show');

Route::get('/buku/edit/{buku}', 'BukuController@edit')->name('buku.edit');
Route::post('/buku/{buku}', 'BukuController@update')->name('buku.update');

Route::post('/buku/delete/{buku}', 'BukuController@delete')->name('buku.delete');

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['admin'])->group(function(){
    // Route::resource('/users', UsersController::class);
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::get('/users/{user}', [UsersController::class, 'show']);
    Route::get('/users/{user}/edit', [UsersController::class, 'edit']);
    Route::post('/users/store', [UsersController::class, 'store']);
    Route::put('/users/{user}/update', [UsersController::class, 'update']);
});