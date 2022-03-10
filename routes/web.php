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

Route::get('/', function () {
    return view('public');
});

Route::get('/post/id={id}', function () {
    return view('public');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@listar');
Route::get('/post/create', 'PostsController@criar');
Route::post('/post/store', 'PostsController@salvar');
Route::get('/post/edit/{id}', 'PostsController@editar');
Route::post('/post/update/{id}', 'PostsController@atualizar');
Route::get('/post/move-to-lixeira/{id}', 'PostsController@toLixeira');
Route::get('/posts/lixeira', 'PostsController@lixeira');
Route::get('/post/restore/{id}', 'PostsController@restore');
Route::get('/post/destroy/{id}', 'PostsController@deletar');
