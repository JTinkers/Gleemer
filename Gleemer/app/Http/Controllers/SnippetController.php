<?php

namespace App\Http\Controllers;

use App\Snippet;
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
        return view('snippets.index')
            ->with(['snippets' => Snippet::all()->sortBy('datePosted')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snippets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$languages = collect(config('snippets.languages'));

		$request->validate(
		[
	        'title' => 'required|max:255|min:16',
	        'content' => 'required|max:4096|min:16',
	        'language' => ['required', Rule::in($languages)],
	    ]);

		$entry = new Snippet();
		$entry->fill($request->all());
		$entry->datePosted = Carbon::now();
		$entry->userId = 1; // TODO: get it from session/helper class
		$entry->save();

		return redirect('/snippets/view/' . $entry->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function view(Snippet $snippet)
    {
		return view('snippets.view')->with(['snippet' => $snippet]);
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
