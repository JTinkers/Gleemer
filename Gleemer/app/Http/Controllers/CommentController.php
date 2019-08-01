<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Timeout;
use App\Http\Facades\UserManager;
use App\Http\Facades\TimeoutManager;
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
		 $timeoutExpiry = TimeoutManager::getTimeoutExpiryDate('comment_submission');

		 if($timeoutExpiry >= Carbon::now())
		 {
			 session()->flash('alert', __('general.timedout', ['time' => $timeoutExpiry->diffForHumans()]));
			 session()->flash('alert_type', 'error');

			 return redirect()->back();
		 }

		 TimeoutManager::addTimeout('comment_submission');

		 if(!UserManager::get())
		 {
			 session()->flash('alert', __('user.not_logged'));
			 session()->flash('alert_type', 'error');

			 return redirect()->back();
		 }

		$validator = Validator::make($request->all(),
		[
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
		if(!UserManager::get())
		{
			return redirect()->back();
		}

		if(!boolval(UserManager::get()->flags & config('gleemer.power_flags')::DeleteComment))
		{
			session()->flash('alert', __('general.no_power'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$comment->delete();

		return redirect()->back();
    }
}
