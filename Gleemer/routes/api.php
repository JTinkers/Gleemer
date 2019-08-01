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

// Private API (no limits)
Route::middleware('apiauth')->group(function()
{
	Route::post('/snippets/store', function(Request $request)
	{
		$languages = collect(config('gleemer.languages'));

		$validator = Validator::make($request->all(),
		[
			'api_key' => 'required|exists:users,api_key',
			'title' => 'required|unique:snippets|max:255|min:16',
			'contents' => 'required|max:4096|min:16'
		]);

		if ($validator->fails())
		{
			return $validator->messages()->first();
		}

		$entry = new App\Snippet();
		$entry->fill($request->except('api_key'));
		$entry->language = '~';
		$entry->date_posted = \Carbon\Carbon::now();
		$entry->date_updated = \Carbon\Carbon::now();
		$entry->user_id = App\User::where('api_key', $request->api_key)->first()->id;
		$entry->visibility_mode = 'unlisted';
		$entry->save();

		return 'gleemer.test/snippet/show/slug/' . $entry->slug;
	});
});
