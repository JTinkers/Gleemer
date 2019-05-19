<?php

use Illuminate\Database\Seeder;

class BansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$entries = array(
			array(4, 2, 'Infective myositis, unspecified right leg', 43080, '2018-09-10'),
			array(6, 2, 'Drowning and submersion due to sailboat sinking', 40011, '2019-04-09'),
			array(4, 3, 'Nondisp fx of prox phalanx of r rng fngr, 7thP', 34714, '2019-03-30'),
			array(2, 6, 'Burn of third degree of neck, sequela', 32252, '2016-11-05'),
			array(1, 6, 'Burn of first degree of upper arm', 33007, '2018-06-08'),
			array(6, 2, 'Disp fx of distal phalanx of right thumb, init for opn fx', 54277, '2018-02-01'),
			array(6, 6, 'Nondisp seg fx shaft of unsp fibula, 7thJ', 30942, '2016-07-12')
		);

		foreach ($entries as $entry)
		{
			DB::table('bans')->insert(
			[
				'user_id' => $entry[0],
				'admin_id' => $entry[1],
				'reason' => $entry[2],
				'length' => $entry[3],
				'date_banned' => $entry[4]
			]);
		}
    }
}
