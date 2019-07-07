<?php

namespace App\Http\Controllers;

use App\User;
use App\View;
use App\Http\Facades\UserManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
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
		$validator = Validator::make($request->all(),
		[
			'login' => 'required|max:64|min:4|unique:users,login|alpha_num',
	        'password' => 'required|max:64|min:8',
	        'email' => 'required|email|unique:users,email',
	        'nickname' => 'required|unique:users,nickname|alpha_num',
		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$entry = new User();
		$entry->fill($request->all());
		$entry->password = Hash::make($request->password);
		$entry->date_registered = Carbon::now();
		$entry->bio = 'This user hasn\'t filled the bio yet.';
		$entry->api_key = '';
		$entry->save();

		session()->flash('alert', 'User created successfully!');
		session()->flash('alert_type', 'success');

		return redirect()->back();
    }

	public function login(Request $request)
	{
		$validator = Validator::make($request->all(),
		[
			'login' => 'required|exists:users,login',
			'password' => 'required'
		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$user = User::where('login', $request->login)->first();

		if(Hash::check($request->password, $user->password))
		{
			UserManager::set($user);

			return redirect('/');
		}

		session()->flash('alert', 'Password mismatch!');
		session()->flash('alert_type', 'error');

		return redirect()->back();
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
		$snippets = $user->snippets->where('is_visible_to_user', true);
		$snippet_views = $user->snippets->pluck('views')->collapse()->count();
		$snippet_ratings = $user->snippets->pluck('ratings')->collapse()->sum('value');

        return view('user.show',
		[
			'user' => $user,
			'snippets' => $snippets,
			'snippet_views' => $snippet_views,
			'snippet_ratings' => $snippet_ratings
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
