<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTMembreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_membre', function(Blueprint $table)
		{
			$table->foreign('vehiculeMembre', 'C_FK_MEMBRE_vehiculeMembre_VEHICULE')->references('idVehicule')->on('t_vehicule')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_membre', function(Blueprint $table)
		{
			$table->dropForeign('C_FK_MEMBRE_vehiculeMembre_VEHICULE');
		});
	}

}
