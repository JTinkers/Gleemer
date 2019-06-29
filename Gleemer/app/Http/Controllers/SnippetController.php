<?php

namespace App\Http\Controllers;

use App\Snippet;
use App\View;
use App\Http\Facades\UserManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('snippet.index', ['models' => Snippet::all()->sortByDesc('date_posted')]);
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
		if(!UserManager::get())
		{
			return redirect()->back();
		}

		$languages = collect(config('gleemer.languages'));

		$request->validate(
		[
	        'title' => 'required|max:255|min:16',
	        'contents' => 'required|max:4096|min:16',
	        'language' => ['required', Rule::in($languages)],
	    ]);

		$entry = new Snippet();
		$entry->fill($request->all());
		$entry->date_posted = Carbon::now();
		$entry->date_updated = Carbon::now();
		$entry->user_id = UserManager::get()->id; // TODO: get it from session/helper class
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
		}

        return view('snippet.show', ['snippet' => $snippet]);
    }

    public function showSlug($slug)
    {
		$snippet = Snippet::all()->where('slug', $slug)->first();

		if($snippet)
		{
			$this->show($snippet);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
        //
    }
}
