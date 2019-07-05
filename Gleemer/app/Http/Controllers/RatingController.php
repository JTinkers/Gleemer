<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Http\Facades\UserManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Validator;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
			session()->flash('alert', 'You aren\'t logged in!');
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$validator = Validator::make($request->all(),
		[
			'snippet_id' => 'required',
			'value' => 'required|in:1,-1'
		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$rating = Rating::where('snippet_id', $request->snippet_id)->where('user_id', UserManager::get()->id)->first();

		if($rating)
		{
			if($rating->value == $request->value)
			{
				$rating->delete();

				return redirect()->back();
			}

			$rating->value = $request->value;
			$rating->save();

			return redirect()->back();
		}

		$entry = new Rating();
		$entry->fill($request->all());
		$entry->user_id = UserManager::get()->id;
		$entry->date_rated = Carbon::now();
		$entry->save();

		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
