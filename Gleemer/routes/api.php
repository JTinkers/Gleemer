<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public API
/*Route::get('/snippets', function()
{
	return App\Snippet::where('visibility_mode', '!=', 'unlisted')->get()
		->where('is_visible_to_user', true)
		->sortByDesc('date_posted');
});*/

Route::get('/snippets/page/{page}', function($page)
{
	return App\Snippet::with('user')
		->orderByDesc('date_posted')
		->where('visibility_mode', '!=', 'unlisted')->get()
		->where('is_visible_to_user', true)
		->forPage($page, 8);
});

//Private API
Route::middleware('apiauth')->group(function()
{
	Route::post('/snippets/store', function(Request $request)
	{
		$languages = collect(config('gleemer.languages'));

		$request->validate(
		[
			'api_key' => 'required|exists:users,api_key',
			'title' => 'required|unique:snippets|max:255|min:16',
			'contents' => 'required|max:4096|min:16',
			'language' => ['required', Illuminate\Validation\Rule::in($languages)],
		]);

		$entry = new App\Snippet();
		$entry->fill($request->except('api_key'));
		$entry->date_posted = \Carbon\Carbon::now();
		$entry->date_updated = \Carbon\Carbon::now();
		$entry->user_id = App\User::where('api_key', $request->api_key)->first()->id;
		$entry->save();

		return 'gleemer.test/snippet/show/slug/' . $entry->slug;
	});
});
