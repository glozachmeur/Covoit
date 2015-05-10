<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('idTrajet', true);
			$table->integer('idConducteur')->index('ind_TRAJET_idConducteur');
			$table->string('villeDepartTrajet', 15);
			$table->string('villeArriveeTrajet', 15);
			$table->date('dateTrajet');
			$table->integer('appreciationTrajet')->index('ind_TRAJET_appreciationTrajet');
			$table->integer('nbPlaces');
			$table->boolean('statutTrajet');
			$table->integer('pppTrajet');
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
