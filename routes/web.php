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


Auth::routes();
Route::get('/','PostController@index');
Route::get('/home', 'PostController@index');
Route::get('/{slug}', 'PostController@show')->where('slug','[A-Za-z0-9-_]+');
Route::get('/user/{id}','PostController@showposts');
Route::group(['middleware'=>['auth']],function(){
	Route::post('comment/add','CommentsController@store');
	Route::get('/admin/index','PostController@indexDashboard');
	Route::resource('/admin/posts/','Auth\PostsController');
	Route::get('admin/posts/allposts','Auth\PostsController@index');
});
