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

// Internal API (unlimited, inaccessible from outside)
Route::prefix('iapi')->group(function()
{
	Route::get('/snippets/{page}', function($page)
	{
		return App\Snippet::with('user')
			->orderByDesc('date_posted')
			->where('visibility_mode', '!=', 'unlisted')->get()
			->where('is_visible_to_user', true)
			->forPage($page, 20);
	});

	Route::middleware('apiauth')->group(function()
	{
		Route::get('{api_key}/snippets/{page}', function($api_key, $page)
		{
			return App\Snippet::with('user')
				->orderByDesc('date_posted')
				->where('visibility_mode', '!=', 'unlisted')->get()
				->where('is_visible_to_user', true)
				->forPage($page, 20);
		});
	});
});

Route::get('/youre_banned', function()
{
	if(!UserManager::get() || !UserManager::get()->isBanned)
	{
		return redirect('/');
	}

	return view('pages.misc.banned',
	[
		'ban' => UserManager::get()->bans->last()
	]);
});

Route::middleware(['gdprnote', 'banenforcer'])->group(function()
{
	Route::get('/', 'SnippetController@index');
	Route::get('/api', function()
	{
		return view('pages.api.index');
	});

	Route::get('/snippet/create', 'SnippetController@create');
	Route::get('/snippet/destroy/{snippet}', 'SnippetController@destroy');
	Route::get('/snippet/edit/{snippet}', 'SnippetController@edit');
	Route::post('/snippet/update/{snippet}', 'SnippetController@update');
	Route::get('/snippet/show/{snippet}', 'SnippetController@show');
	Route::get('/snippet/show/slug/{slug}', 'SnippetController@showSlug');
	Route::post('/snippet/store', 'SnippetController@store');
	Route::post('/rating/store', 'RatingController@store');
	Route::post('/comment/store', 'CommentController@store');
	Route::get('/comment/destroy/{comment}', 'CommentController@destroy');
	Route::post('/favourite/store', 'FavouriteController@store');
	Route::post('/user/store', 'UserController@store');
	Route::post('/user/login', 'UserController@login');
	Route::post('/user/update/{user}', 'UserController@update');
	Route::post('/user/ban/{user}', 'UserController@ban');
	Route::get('/user/unban/{user}', 'UserController@unban');
	Route::get('/user/show/{user}', 'UserController@show');
	Route::get('/user/edit/{user}', 'UserController@edit');
	Route::get('/user/', 'UserController@index');
	Route::get('/search/{pattern}', 'SearchController@find');
	Route::get('/locale/{locale}', function($locale)
	{
		session(['locale' => $locale]);

		return redirect()->back();
	});
});
