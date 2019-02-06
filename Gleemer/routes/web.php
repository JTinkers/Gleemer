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

Route::get('/', function ()
{
    return view('snippets.index');
});

Route::get('/api', function ()
{
    return view('pages.api');
});


Route::get('/snippets', function ()
{
    return view('snippets.index');
});

Route::get('/snippets/create', function ()
{
    return view('snippets.create');
});
