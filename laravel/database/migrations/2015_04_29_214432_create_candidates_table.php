<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('candidates', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->integer('id_number');
			$table->string('names');
			$table->string('lastnames');
			$table->string('birthdate');
			$table->string('place_of_birth');
			$table->string('height');
			$table->string('gender');
			$table->string('rh');
			$table->string('date_place_expedition');
			$table->string('email');
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
		Schema::drop('candidates');
	}

}
