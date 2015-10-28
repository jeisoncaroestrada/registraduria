<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Yodecido\User;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name1' => 'be',
            'lastname1'  => 'steven',
            'user_name'   => 'admin',
            'email'      => 'djstevenbe@hotmail.com',
            'password'   =>  Hash::make('123456')
        ]);
    }

}
