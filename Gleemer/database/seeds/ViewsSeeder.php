<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('views')->insert([
            'snippetId' => 1,
            'userId' => 2,
            'viewedOn' => Carbon::now()
        ]);

        DB::table('views')->insert([
            'snippetId' => 2,
            'userId' => 2,
            'viewedOn' => Carbon::now()
        ]);

        DB::table('views')->insert([
            'snippetId' => 3,
            'userId' => 1,
            'viewedOn' => Carbon::now()
        ]);

        DB::table('views')->insert([
            'snippetId' => 1,
            'userId' => 1,
            'viewedOn' => Carbon::now()
        ]);
    }
}
