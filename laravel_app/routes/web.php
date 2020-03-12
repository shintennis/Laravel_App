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

//投稿一覧
Route::get('/', 'PostsController@index');



//プロフィール編集
Route::get('/user/edit', 'UsersController@edit');

//プロフィール編集
Route::post('user/update', 'UsersController@update');

//プロフィール画面
Route::get('/user/{user_id}', 'UsersController@show');

//投稿画面
Route::get('/create', 'PostsController@create');

//投稿
Route::post('/store', 'PostsController@store');

//投稿削除
Route::get('/destroy/{post_id}', 'PostsController@destroy');

//いいね！
Route::get('posts/{post_id}/likes', 'LikesController@store');

//いいね！取下げ
Route::get('/likes/{like_id}', 'LikesController@destroy');

//コメント
Route::post('/posts/{comment_id}/comments', 'CommentsController@store');

//コメント削除
Route::get('/comments/{comment_id}', 'CommentsController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
