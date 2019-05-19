<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function (Blueprint $table)
		{
            $table->bigIncrements('id');
			$table->integer('user_id');
			$table->string('language');
			$table->enum('visibility_mode', config('gleemer.visibility_modes'));
			$table->text('title');
			$table->longText('contents');
			$table->datetime('date_posted');
			$table->datetime('date_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snippets');
    }
}
