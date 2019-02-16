<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'user1',
            'password' => bcrypt('user1'),
            'name' => 'User 1',
            'dateCreated' => Carbon::now(),
            'lastVisit' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'login' => 'user2',
            'password' => bcrypt('user2'),
            'name' => 'User 2',
            'dateCreated' => Carbon::now(),
            'lastVisit' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'login' => 'user3',
            'password' => bcrypt('user3'),
            'name' => 'User 3',
            'dateCreated' => Carbon::now(),
            'lastVisit' => Carbon::now()
        ]);
    }
}
