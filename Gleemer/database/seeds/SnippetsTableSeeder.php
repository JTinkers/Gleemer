<?php

use Illuminate\Database\Seeder;

class SnippetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(6, 'cpp', 1, 'Hx-uterus malignancy NEC', 'Nondisplaced fracture of base of second metacarpal bone, right hand, subsequent encounter for fracture with malunion', '2016-11-21', '2017-08-18'),
			array(2, 'lua', 1, 'Fet/plac prob NOS-unspec', 'Insect bite (nonvenomous) of oral cavity, subsequent encounter', '2018-12-28', '2016-11-13'),
			array(5, 'cs', 1, 'TB of bladder-oth test', 'Unspecified motorcycle rider injured in noncollision transport accident in nontraffic accident', '2019-04-09', '2019-02-12'),
			array(2, 'html', 2, 'Delay conjugat jaund NOS', 'Tidal wave due to landslide, sequela', '2017-04-01', '2018-04-17'),
			array(5, 'css', 2, 'Central corneal ulcer', 'Primary focal hyperhidrosis, axilla', '2018-12-19', '2016-06-07'),
			array(5, 'python', 1, 'Chronic kidney dis NOS', 'Flail chest, subsequent encounter for fracture with routine healing', '2016-11-04', '2019-02-08'),
			array(2, 'ruby', 1, 'Exam-medicolegal reasons', 'Military operations involving biological weapons, military personnel, sequela', '2019-03-15', '2017-12-05'),
		);

		foreach ($entries as $entry)
		{
			DB::table('snippets')->insert(
			[
				'user_id' => $entry[0],
				'language' => $entry[1],
				'visibility_mode' => $entry[2],
				'title' => $entry[3],
				'contents' => $entry[4],
				'date_posted' => $entry[5],
				'date_updated' => $entry[6]
			]);
		}
    }
}
