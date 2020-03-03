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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostsController@index');

Route::get('/create', 'PostsController@create');

Route::post('/store', 'PostsController@store');

Route::get('/destroy/{post_id}', 'PostsController@destroy');

Route::get('posts/{post_id}/likes', 'LikesController@store');

Route::get('/likes/{like_id}', 'LikesController@destroy');

Route::post('/posts/{comment_id}/comments', 'CommentsController@store');

Route::get('/comments/{comment_id}', 'CommentsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
