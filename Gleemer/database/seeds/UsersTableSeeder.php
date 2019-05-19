<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(
				"Urbain",
				"ularrie0",
				"GN9DdjoN",
				"utaveriner0@utexas.edu",
				"Poisoning by other drugs acting on muscles, assault, subsequent encounter",
				"25338",
				"2017-02-01"
			),
			array(
				"Beryl",
				"bpirie1",
				"Xkqli1t9",
				"btunsley1@twitter.com",
				"Other injury of intrinsic muscle, fascia and tendon of unspecified finger at wrist and hand level, subsequent encounter",
				"36531",
				"2015-10-16"
			),
			array(
				"Corliss",
				"csolleme2",
				"Txqqpxiv",
				"cfrancesc2@amazon.co.jp",
				"Displaced spiral fracture of shaft of right tibia, subsequent encounter for closed fracture with delayed healing",
				"9574",
				"2019-03-26"
			),
			array(
				"Hiram",
				"hsprade3",
				"v2O13LCHUydd",
				"hbennet3@w3.org",
				"Burn of unspecified degree of male genital region",
				"40880",
				"2016-11-09"
			),
			array(
				"Dominga",
				"dcarss4",
				"MwsyN82B",
				"dover4@gravatar.com",
				"Displaced fracture of epiphysis (separation) (upper) of left femur, subsequent encounter for closed fracture with nonunion",
				"2795",
				"2015-10-14"
			),
			array(
				"Horacio",
				"hpavek5",
				"SYjKZ0lS4k0",
				"hgoathrop5@oakley.com",
				"Unspecified fracture of shaft of left fibula, subsequent encounter for open fracture type I or II with routine healing",
				"37641",
				"2016-11-22"
			),
			array(
				"Melessa",
				"mjoburn7",
				"7dB5dIl",
				"mspitell7@wikimedia.org",
				"Corrosion of third degree of left upper arm",
				"36106",
				"2018-04-27"
			)
		);

		foreach ($entries as $entry)
		{
			DB::table('users')->insert(
			[
				'nickname' => $entry[0],
				'login' => $entry[1],
				'password' => Hash::make($entry[2]),
				'email' => $entry[3],
				'bio' => $entry[4],
				'flags' => $entry[5],
				'date_registered' => $entry[6]
			]);
		}
    }
}
