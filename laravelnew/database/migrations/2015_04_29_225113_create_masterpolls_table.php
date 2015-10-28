<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterpollsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('masterpolls', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->string('name');
			$table->string('user');
			$table->string('requested')->nullable();
			$table->string('q1')->nullable();
			$table->string('q2')->nullable();
			$table->string('q3')->nullable();
			$table->string('q4')->nullable();
			$table->string('q5')->nullable();
			$table->string('check1')->nullable();
			$table->string('c1a')->nullable();
			$table->string('c1b')->nullable();
			$table->string('c1c')->nullable();
			$table->string('c1d')->nullable();
			$table->string('c1e')->nullable();
			$table->string('c1f')->nullable();
			$table->string('c1g')->nullable();
			$table->string('c1h')->nullable();
			$table->string('c1i')->nullable();
			$table->string('c1j')->nullable();
			$table->string('check2')->nullable();
			$table->string('c2a')->nullable();
			$table->string('c2b')->nullable();
			$table->string('c2c')->nullable();
			$table->string('c2d')->nullable();
			$table->string('c2e')->nullable();
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
		Schema::drop('masterpolls');
	}

}
