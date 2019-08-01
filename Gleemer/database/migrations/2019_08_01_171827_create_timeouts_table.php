<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timeouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', config('gleemer.timeout_types'));
			$table->string('session_token');
			$table->datetime('date_issued');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timeouts');
    }
}
