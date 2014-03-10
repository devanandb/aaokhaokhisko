<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->date('eventdate');
			$table->string('type');
			$table->string('venue');
			$table->int('user_id');
			$table->timestamps();
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	    Schema::drop('events');
	}

}
