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

Route::redirect('/','posts/view');


Route::get('posts/view/{tag?}', function () {
    return view('public');
});

Route::get('/post/view/{id}', function () {
    return view('public');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostsController@all');
Route::get('/post/create', 'PostsController@create');
Route::post('/post/store', 'PostsController@store');
Route::get('/post/edit/{post}', 'PostsController@unique');
Route::post('/post/update/{post}', 'PostsController@update');
Route::get('/post/move-to-trash/{post}', 'PostsController@moveToTrash');
Route::get('/posts/trash', 'PostsController@trash');
Route::get('/post/restore/{post}', 'PostsController@restore');
Route::get('/post/destroy/{post}', 'PostsController@destroy');
