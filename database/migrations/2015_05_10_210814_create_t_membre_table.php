<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTMembreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_membre', function(Blueprint $table)
		{
			$table->integer('idMembre', true);
			$table->string('pseudoMembre', 20);
			$table->string('prenomMembre', 25);
			$table->string('nomMembre', 25);
			$table->string('mdpMembre', 20);
			$table->date('dnMembre');
			$table->string('emailMembre', 75);
			$table->string('telFixeMembre', 13)->nullable();
			$table->string('telPortMembre', 13);
			$table->string('numRueMembre', 10)->nullable();
			$table->string('nomRueMembre', 25)->nullable();
			$table->string('cpMembre', 5)->nullable();
			$table->string('villeMembre', 45)->nullable();
			$table->integer('vehiculeMembre')->nullable()->index('ind_MEMBRE_vehiculeMembre');
			$table->date('dateInscription');
			$table->binary('photoMembre', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_membre');
	}

}
