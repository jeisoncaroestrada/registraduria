<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiativesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('initiatives', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->string('password');
			$table->integer('user');
			$table->string('city');
			$table->string('title');
			$table->string('shortDescription');
			$table->longText('description');
			$table->string('thumbnail');
			$table->integer('votes')->default(0);;
			$table->rememberToken();
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
		Schema::drop('initiatives');
	}

}
