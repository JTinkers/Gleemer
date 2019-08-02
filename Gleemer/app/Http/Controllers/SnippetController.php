<?php

namespace App\Http\Controllers;

use App\Snippet;
use App\View;
use App\Http\Facades\UserManager;
use App\Http\Facades\TimeoutManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use \Validator;

class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('snippet.index', ['models' => Snippet::where('visibility_mode', '!=', 'unlisted')->get()
			->where('is_visible_to_user', true)
			->sortByDesc('date_posted')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snippet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$timeoutExpiry = TimeoutManager::getTimeoutExpiryDate('snippet_submission');

		if($timeoutExpiry >= Carbon::now())
		{
			session()->flash('alert', __('general.timedout', ['time' => $timeoutExpiry->diffForHumans()]));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		TimeoutManager::addTimeout('snippet_submission');

		if(!UserManager::get())
		{
			session()->flash('alert', __('user.not_logged'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$languages = collect(config('gleemer.languages'));

		$validator = Validator::make($request->all(),
		[
			'title' => 'required|unique:snippets|max:255|min:16',
	        'contents' => 'required|max:4096|min:16',
	        'language' => ['required', Rule::in($languages)],
   		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

            return redirect()->back();
       	}

		$entry = new Snippet();
		$entry->fill($request->all());
		$entry->date_posted = Carbon::now();
		$entry->date_updated = Carbon::now();
		$entry->user_id = UserManager::get()->id;
		$entry->save();

		return redirect('/snippet/show/' . $entry->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function show(Snippet $snippet)
    {
		if(!$snippet->is_visible_to_user)
		{
			session()->flash('alert', __('snippet.cant_view'));
			session()->flash('alert_type', 'error');

			return redirect('/');
		}

		$ratingValue = 0;

		if(UserManager::get())
		{
			$view = View::where('snippet_id', $snippet->id)->where('user_id', UserManager::get()->id)->first();

			if(!$view)
			{
				$view = new View();
				$view->snippet_id = $snippet->id;
				$view->user_id = UserManager::get()->id;
				$view->date_viewed = Carbon::now();
				$view->save();
			}

			$rating = $snippet->ratings()->where('user_id', UserManager::get()->id)->first();

			if($rating)
			{
				$ratingValue = $rating->value;
			}
		}

        return view('snippet.show', ['snippet' => $snippet, 'rating_value' => $ratingValue]);
    }

    public function showSlug($slug)
    {
		$snippet = Snippet::all()->where('slug', $slug)->first();

		if($snippet)
		{
			return $this->show($snippet);
		}

		return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function edit(Snippet $snippet)
    {
		if(!UserManager::get())
		{
			session()->flash('alert', __('user.not_logged'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		if($snippet->user->id != UserManager::get()->id)
		{
			session()->flash('alert', __('snippet.cant_edit_someones'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

        return view('snippet.edit', ['snippet' => $snippet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snippet $snippet)
    {
		if(!UserManager::get())
		{
			session()->flash('alert', __('user.not_logged'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		if($snippet->user->id != UserManager::get()->id)
		{
			session()->flash('alert', __('snippets.cant_edit_someones'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$languages = collect(config('gleemer.languages'));

		$validator = Validator::make($request->all(),
		[
			'title' => ($request->title != $snippet->title ? 'unique:snippets|' : '') . 'max:255|min:16',
			'contents' => 'required|max:4096|min:16',
			'language' => ['required', Rule::in($languages)],
		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$snippet->fill($request->all());
		$snippet->save();

		return redirect('snippet/show/' . $snippet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
		if(!UserManager::get())
		{
			return redirect()->back();
		}

		if(!boolval(UserManager::get()->flags & config('gleemer.power_flags')::DeleteSnippet))
		{
			session()->flash('alert', __('general.no_power'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$snippet->delete();

		return redirect('/');
    }
}
