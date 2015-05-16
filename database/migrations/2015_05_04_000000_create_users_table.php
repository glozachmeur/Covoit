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
			$table->increments('id');
			$table->string('pseudoUser', 20);
			$table->string('prenomUsers', 25);
			$table->string('email', 25);
			$table->string('name',20);
			$table->string('telFixeUsers', 13)->nullable();
			$table->string('password', 60);
			$table->string('telPortUsers', 13);
			$table->integer('vehiculeUsers')->unsigned();
			$table->date('dateInscription');
			$table->image('photoUsers', 65535)->nullable();
			$table->boolean('admin')->default(false);
			
			$table->rememberToken();
			$table->timestamps();
			$table->engine = 'InnoDB';
		});
		
		Schema::table('users', function($table) {
			$table->foreign('vehiculeUsers')->references('idVehicule')->on('T_VEHICULE');
			$table->string('email')->unique();
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
