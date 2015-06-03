<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
	{
		DB::table('users')->insert([
			'name' => 'lozachmeur',
			'prenomUsers' => 'guillaume',
			'pseudoUsers' => 'hunteer',
			'email' => 'guillaume.lozachmeur@utt.fr',
			'password' => bcrypt('azerty'),
			'telPortUsers' => '0631442604',
			'dateNaissanceUsers' => '1994-07-17',
			'admin' => 1
		]);
		
		DB::table('users')->insert([
			'name' => 'Heul',
			'prenomUsers' => 'Mike',
			'pseudoUsers' => 'miskin',
			'email' => 'example@gmail.com',
			'password' => bcrypt('azerty'),
			'telPortUsers' => '0600102030',
			'dateNaissanceUsers' => '1994-07-17',
			'admin' => 0
		]);
		
		
		DB::table('users')->insert([
			'name' => 'Jean',
			'prenomUsers' => 'Marc',
			'pseudoUsers' => 'Chauffard',
			'email' => 'example565@gmail.com',
			'password' => bcrypt('azerty'),
			'telPortUsers' => '0600502030',
			'dateNaissanceUsers' => '1990-01-17',
			'admin' => 0
		]);
		
		DB::table('users')->insert([
			'name' => 'Kevin',
			'prenomUsers' => 'Deailt',
			'pseudoUsers' => 'Brav',
			'email' => 'example45@gmail.com',
			'password' => bcrypt('azerty'),
			'telPortUsers' => '0600102030',
			'dateNaissanceUsers' => '1994-07-17',
			'admin' => 0
		]);
	}
}