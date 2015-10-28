<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('polls', function(Blueprint $table)
		{
			$table->increments('index')->unique();
			$table->string('id');
			$table->string('user');
			$table->string('q1')->nullable();
			$table->string('q2')->nullable();
			$table->string('q3')->nullable();
			$table->string('q4')->nullable();
			$table->string('q5')->nullable();
			$table->string('check1')->nullable();
			$table->string('check2')->nullable();
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
		Schema::drop('polls');
	}

}
