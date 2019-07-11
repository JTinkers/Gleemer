<?php

namespace App\Http\Helpers;

class AlphanumericGenerator
{

	public static function Generate($len)
	{
		$chars = 'ABCDEFGHIJKLMNOPRSTUVQWXYZabcdefghijklmnopqrstuvqwxyz0123456789';

		$output = '';

		for($i = 0; $i < $len; $i++)
		{
			$output .= $chars[mt_rand(0, strlen($chars) - 1)];
		}

		return $output;
	}
}
