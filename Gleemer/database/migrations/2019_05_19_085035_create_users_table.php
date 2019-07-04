<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table)
		{
            $table->bigIncrements('id');
            $table->string('nickname');
			$table->string('login');
			$table->string('password');
			$table->string('email');
			$table->string('api_key');
			$table->longText('bio');
            $table->integer('flags')->default(0)->comment('bitmask');
			$table->string('date_registered');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
