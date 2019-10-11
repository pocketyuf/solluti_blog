<?php

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

Route::get('/signin', function () {
    return view('login');
});

//LoginController
Route::get('/', 'LoginController@fetch');
Route::patch('/login', 'LoginController@store');
Route::patch('/register', 'LoginController@register');
Route::get('/logout', 'LoginController@logout');

//RegistroController
Route::get('/postagem/{id}', 'RegistroController@postagem');
Route::patch('/cadastrar/{id}', 'RegistroController@store');
Route::get('/delete/{id}/{reg}', 'RegistroController@delete');
