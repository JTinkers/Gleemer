<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(3, 2, 0, 'Partial ventriculectomy', '2016-07-10'),
			array(1, 2, 0, 'Otoscopy', '2017-02-15'),
			array(6, 1, 0, 'Vaginal vault obliterat', '2017-05-26'),
			array(1, 2, 0, 'Plethysmogram', '2017-08-17'),
			array(6, 1, 1, 'Lower limb amputat NOS', '2017-11-02'),
			array(6, 1, 1, 'Arterial pressure monit', '2017-09-15'),
			array(2, 2, 1, 'Perc hepat Cholangiogram', '2017-04-27'),
		);

		foreach ($entries as $entry)
		{
			DB::table('comments')->insert(
			[
				'snippet_id' => $entry[0],
				'user_id' => $entry[1],
				'is_deleted' => $entry[2],
				'content' => $entry[3],
				'date_posted' => $entry[4],
			]);
		}
    }
}
