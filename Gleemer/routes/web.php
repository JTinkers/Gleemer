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

Route::get('/', 'SnippetController@index');
Route::get('/snippet/create', 'SnippetController@create');
Route::get('/snippet/show/{snippet}', 'SnippetController@show');
Route::post('/snippet/store', 'SnippetController@store');

Route::post('/rating/store', 'RatingController@store');

Route::post('/comment/store', 'CommentController@store');

Route::post('/user/store', 'UserController@store');

Route::post('/user/login', 'UserController@login');

Route::get('/user/show/{user}', 'UserController@show');

Route::get('/user/', 'UserController@index');

Route::get('/search/{pattern}', 'SearchController@find');

Route::get('/locale/{locale}', function($locale)
{
	session(['locale' => $locale]);

	return redirect()->back();
});
