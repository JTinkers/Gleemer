<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Facades\UserManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Validator;

class CommentController extends Controller
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
			'title' => 'required|unique:snippets|max:255|min:16',
	        'contents' => 'required|max:4096|min:16',
			'content' => 'required|max:1024|min:1'
   		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

            return redirect()->back();
       	}

 		$entry = new Comment();
 		$entry->fill($request->all());
 		$entry->date_posted = Carbon::now();
 		$entry->user_id = UserManager::get()->id;
 		$entry->save();

 		return redirect()->back();
     }
    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
