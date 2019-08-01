<?php

namespace App\Http\Facades;

use App\Timeout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Facade;

class TimeoutManager extends Facade
{
	public static function getTimeoutExpiryDate($type)
	{
		$timeout = Timeout::where('session_token', session()->token())
			->where('date_issued', '>=', Carbon::now()->addSeconds(-config('gleemer.timeout_lengths.' . $type)))
			->first();

		if($timeout)
		{
			$time = new Carbon($timeout->date_issued);
			$time = $time->addSeconds(config('gleemer.timeout_lengths.' . $type));

			return $time;
		}

		return Carbon::now()->addSeconds(-1);
	}

	public static function addTimeout($type)
	{
		$timeout = new Timeout();
		$timeout->type = $type;
		$timeout->date_issued = Carbon::now();
		$timeout->session_token = session()->token();
		$timeout->save();
	}

	protected static function getFacadeAccessor() { return 'timeoutmanager'; }
}
