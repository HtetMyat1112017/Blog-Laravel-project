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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'ArticleController@index');
//---------------------------------article start-----------------------------//
Route::get("articles/","ArticleController@index")->name("article.index");
Route::get("articles/detail/{id}","ArticleController@detail")->name("article.detail");
Route::get("articles/add","ArticleController@create")->name("article.create");
Route::post("articles/add","ArticleController@store")->name("article.store");
Route::get("article/edit/{id}","ArticleController@edit")->name("article.edit");
Route::post("article/update/{id}","ArticleController@update")->name("article.update");
Route::get("article/delete/{id}","ArticleController@destroy")->name("article.destroy");
//---------------------------------article end-----------------------------//
Route::get("article/comment/add","CommentController@create")->name('comment.create');
Route::post("article/comment/add","CommentController@store")->name("comment.store");
Route::get("article/comment/delete/{id}","CommentController@delete")->name("comment.delete");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
