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

use App\Task;

Route::get('/', 'PostsController@index')->name('home');

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::post('/posts/{post}/comment', 'CommentsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/tasks', 'TaskController@index');

Route::get('/tasks/{task}', 'TaskController@show');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/about', function() {
    return view('about');
});