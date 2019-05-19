<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(7, 3, 1, '2017-03-08'),
			array(2, 5, -1, '2016-09-13'),
			array(5, 3, -1, '2017-06-21'),
			array(5, 1, -1, '2017-06-25'),
			array(4, 4, 1, '2018-08-07'),
			array(5, 7, -1, '2017-01-02'),
			array(7, 1, 1, '2016-12-06')
		);

		foreach ($entries as $entry)
		{
			DB::table('ratings')->insert(
			[
				'snippet_id' => $entry[0],
				'user_id' => $entry[1],
				'value' => $entry[2],
				'date_rated' => $entry[3],
			]);
		}
    }
}
