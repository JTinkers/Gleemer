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

Route::get('/api', function ()
{
    return view('pages.api');
});

Route::get('/', 'SnippetController@index');
Route::get('/snippets', 'SnippetController@index');
Route::get('/snippets/create', 'SnippetController@create');
Route::post('/snippets/store', 'SnippetController@store');
Route::get('/snippets/view/{snippet}', 'SnippetController@view');
