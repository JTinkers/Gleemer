<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert([
            'snippetId' => 3,
            'userId' => 1,
            'value' => -1,
            'ratedOn' => Carbon::now()
        ]);

        DB::table('ratings')->insert([
            'snippetId' => 3,
            'userId' => 2,
            'value' => 1,
            'ratedOn' => Carbon::now()
        ]);

        DB::table('ratings')->insert([
            'snippetId' => 1,
            'userId' => 1,
            'value' => -1,
            'ratedOn' => Carbon::now()
        ]);

        DB::table('ratings')->insert([
            'snippetId' => 1,
            'userId' => 2,
            'value' => -1,
            'ratedOn' => Carbon::now()
        ]);

        DB::table('ratings')->insert([
            'snippetId' => 1,
            'userId' => 3,
            'value' => -1,
            'ratedOn' => Carbon::now()
        ]);
    }
}
