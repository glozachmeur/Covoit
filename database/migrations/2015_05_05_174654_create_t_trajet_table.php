<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_trajet', function(Blueprint $table)
		{
			$table->increments('idTrajet');
			$table->integer('Conducteur')->unsigned();
			$table->string('villeDepartTrajet', 25);
			$table->string('villeArriveeTrajet', 25);
			$table->date('dateDebutTrajet');
			$table->time('dureeTrajet');
			$table->integer('appreciationTrajet')->unsigned();
			$table->integer('nbPlaces');
			$table->boolean('statutTrajet')->default(false);
			$table->integer('pppTrajet');
			
			$table->engine = 'InnoDB';
		});
		
		Schema::table('t_trajet', function($table) {
			$table->foreign('Conducteur')->references('id')->on('users');
			$table->foreign('appreciationTrajet')->references('idAppreciation')->on('T_APPRECIATION');
			//$table->primary('idTrajet');
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_trajet');
	}

}
