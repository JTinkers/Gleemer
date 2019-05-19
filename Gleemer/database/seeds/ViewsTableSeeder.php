<?php

use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(7, 5, '2018-08-23'),
			array(4, 7, '2018-03-22'),
			array(4, 4, '2018-05-03'),
			array(7, 3, '2018-03-04'),
			array(4, 3, '2017-09-05'),
			array(3, 6, '2017-03-31'),
			array(1, 3, '2017-02-09')
		);

		foreach ($entries as $entry)
		{
			DB::table('views')->insert(
			[
				'snippet_id' => $entry[0],
				'user_id' => $entry[1],
				'date_viewed' => $entry[2]
			]);
		}
    }
}
