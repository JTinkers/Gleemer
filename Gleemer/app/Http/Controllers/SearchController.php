<?php

namespace App\Http\Controllers;

use App\Snippet;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function find($phrase)
	{
		return view('pages.search.results',
		[
			'snippets' => Snippet::where('title', 'like', '%' . $phrase . '%')->get(),
			'users' => User::where('nickname', 'like', '%' . $phrase . '%')->get()
		]);
	}
}
