<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\Http\Facades\UserManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Validator;

class FavouriteController extends Controller
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
			session()->flash('alert', __('user.not_logged'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$validator = Validator::make($request->all(),
		[
			'snippet_id' => 'required',
		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$favourite = Favourite::where('snippet_id', $request->snippet_id)->where('user_id', UserManager::get()->id)->first();

		if($favourite)
		{
			$favourite->delete();

			return redirect()->back();
		}

		$entry = new Favourite();
		$entry->fill($request->all());
		$entry->user_id = UserManager::get()->id;
		$entry->date_favourited = Carbon::now();
		$entry->save();

		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(Favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourite $favourite)
    {
        //
    }
}
