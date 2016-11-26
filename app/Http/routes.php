<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','SearchController@getIndexSearch');

Route::get('/api/v1/search','SearchController@getSearch');
Route::get('/api/v1/search/{id}','SearchController@getViewSearch');
Route::get('/api/v1/search/category/{id}/','SearchController@getCatSearch');
Route::get('/api/v1/category','SearchController@getCategory');

Route::get('/admin','AdminController@getIndex');
Route::get('/admin/my-film','AdminController@getMyFilm');
Route::get('/admin/profile','AdminController@getProfile');
Route::post('/admin/profile','AdminController@postProfile');
Route::get('/admin/add/movie','AdminController@getAddMovie');
Route::post('/admin/add/movie','AdminController@postAddMovie');
Route::post('/admin/add/movie/{id}','AdminController@postAddMovie');
Route::get('/admin/add/movie/{id}','AdminController@getAddMovie');
Route::get('/admin/anexo','AdminController@getAnexo');
Route::post('/admin/anexo','AdminController@postAnexo');
Route::get('/admin/delete/{id}','AdminController@getDelete');
Route::get('/admin/register','AdminController@getCreate');
Route::post('/admin/register','AdminController@postCreate');
Route::get('/admin/users','AdminController@getUsers');
Route::get('/admin/delete/user/{id}','AdminController@getDeleteUser');
Route::auth();
