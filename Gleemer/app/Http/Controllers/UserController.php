<?php

namespace App\Http\Controllers;

use App\User;
use App\View;
use App\Ban;
use App\Http\Facades\UserManager;
use App\Http\Helpers\AlphanumericGenerator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use \Validator;

class UserController extends Controller
{
	public function ban(Request $request, User $user)
	{
		if(!UserManager::get())
		{
			return redirect()->back();
		}

		if(!boolval(UserManager::get()->flags & config('gleemer.power_flags')::BanUser))
		{
			session()->flash('alert', __('general.no_power'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		if($user->isBanned)
		{
			session()->flash('alert', __('user.already_banned'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$ban = new Ban();
		$ban->fill($request->all());
		$ban->user_id = $user->id;
		$ban->admin_id = UserManager::get()->id;
		$ban->date_banned = Carbon::now();
		$ban->save();

		return redirect()->back();
	}

	public function unban(User $user)
	{
		if(!UserManager::get())
		{
			return redirect()->back();
		}

		if(!boolval(UserManager::get()->flags & config('gleemer.power_flags')::UnbanUser))
		{
			session()->flash('alert', __('general.no_power'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$ban = $user->bans->last();
		$ban->delete();

		return redirect()->back();
	}

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
		$entry->default_avatar = true;
		$entry->api_key = AlphanumericGenerator::Generate(64);
		$entry->save();

		session()->flash('alert', __('user.creation_success'));
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

		session()->flash('alert', __('user.password_mismatch'));
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
		$favourites = $user->favourites->pluck('snippet');
		$snippet_views = $user->snippets->pluck('views')->collapse()->count();
		$snippet_ratings = $user->snippets->pluck('ratings')->collapse()->sum('value');

        return view('user.show',
		[
			'user' => $user,
			'snippets' => $snippets,
			'favourites' => $favourites,
			'snippet_views' => $snippet_views,
			'snippet_ratings' => $snippet_ratings,
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
		if(UserManager::get()->id != $user->id)
		{
			session()->flash('alert', __('user.edit_page_locked'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

        return view('user.edit', ['user' => $user]);
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
		if(UserManager::get()->id != $user->id)
		{
			session()->flash('alert', __('user.cant_update_not_self'));
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		$validator = Validator::make($request->all(),
		[
			'bio' => 'max:1024',
			'avatar' => 'image|max:512',
		]);

		if ($validator->fails())
		{
			session()->flash('alert', $validator->messages()->first());
			session()->flash('alert_type', 'error');

			return redirect()->back();
		}

		if($request->generateKey)
		{
			$user->api_key = AlphanumericGenerator::Generate(64);
			$user->save();

			session()->flash('alert', __('user.api_key_generated'));
			session()->flash('alert_type', 'success');

			UserManager::set($user);

			return redirect()->back();
		}

		if($request->avatar)
		{
			Storage::disk('public')->put('/users/avatars/' . $user->id . '.png', file_get_contents($request->avatar));

			session()->flash('alert', __('user.changes_saved'));
			session()->flash('alert_type', 'success');

			$user->default_avatar = false;
			$user->save();

			UserManager::set($user);

			return redirect()->back();
		}

        $user->bio = $request->bio or $user->bio;
		$user->save();
		
		UserManager::set($user);

		session()->flash('alert', __('user.changes_saved'));
		session()->flash('alert_type', 'success');

		return redirect()->back();
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
