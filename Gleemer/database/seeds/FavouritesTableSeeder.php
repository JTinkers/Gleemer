<?php

use Illuminate\Database\Seeder;

class FavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(7, 3, '2018-02-28'),
			array(2, 2, '2019-01-04'),
			array(4, 1, '2017-07-24'),
			array(1, 3, '2017-11-30'),
			array(5, 6, '2018-03-11'),
			array(3, 2, '2017-12-10'),
			array(2, 5, '2018-09-03')
		);

		foreach ($entries as $entry)
		{
			DB::table('favourites')->insert(
			[
				'snippet_id' => $entry[0],
				'user_id' => $entry[1],
				'date_favourited' => $entry[2]
			]);
		}
    }
}
