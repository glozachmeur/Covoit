<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->insert([
			'name' => 'lozachmeur',
			'prenomUsers' => 'guillaume',
			'pseudoUsers' => 'hunteer',
			'email' => 'guillaumedu60190@gmail.com',
			'password' => bcrypt('azerty'),
			'telPortUsers' => '0631442604',
			'dateNaissanceUsers' => '1994-07-17',
			'admin' => 1
		]);
		
		DB::table('users')->insert([
			'name' => 'Heul',
			'prenomUsers' => 'Mike',
			'pseudoUsers' => 'miskin',
			'email' => 'vatefairefoutre@gmail.com',
			'password' => bcrypt('azerty'),
			'telPortUsers' => '0600102030',
			'dateNaissanceUsers' => '1994-07-17',
			'admin' => 0
		]);
	}
}