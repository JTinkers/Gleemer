<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Facades\UserManager;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
		$request->validate(
		[
	        'login' => 'required|max:64|min:4|unique:users,login',
	        'password' => 'required|max:64|min:8',
	        'email' => 'required|email|unique:users,email',
	        'nickname' => 'required|unique:users,nickname',
	    ]);

		$entry = new User();
		$entry->fill($request->all());
		$entry->date_registered = Carbon::now();
		$entry->bio = '';
		$entry->save();

		return 'created';
    }

	public function login(Request $request)
	{
		$request->validate(
		[
			'login' => 'required|exists:users,login',
			'password' => 'required'
		]);

		$user = User::where('login', $request->login)->first();

		if($user->password == $request->password)
		{
			UserManager::set($user);

			return redirect('/');
		}

		return 'invalid';
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
