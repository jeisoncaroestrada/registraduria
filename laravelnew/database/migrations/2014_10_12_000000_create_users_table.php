<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->integer('id_num')->unique()->nullable();
			$table->string('name1');
			$table->string('name2')->nullable();
			$table->string('lastname1');
			$table->string('lastname2')->nullable();
			$table->string('user_type')->default('user');
			$table->string('email')->unique();
			$table->string('phone')->nullable();
			$table->string('user_name')->unique()->nullable();
			$table->string('password', 60);
			$table->binary('avatar')->nullable();
			$table->boolean('enabled')->default(0);
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
		Schema::drop('users');
	}

}
