<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTTrajetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_trajet', function(Blueprint $table)
		{
			$table->foreign('appreciationTrajet', 'C_FK_TRAJET_appreciationTrajet_APPRECIATION')->references('idAppreciation')->on('t_appreciation')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('idConducteur', 'C_FK_TRAJET_idConducteur_MEMBRE')->references('idMembre')->on('t_membre')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_trajet', function(Blueprint $table)
		{
			$table->dropForeign('C_FK_TRAJET_appreciationTrajet_APPRECIATION');
			$table->dropForeign('C_FK_TRAJET_idConducteur_MEMBRE');
		});
	}

}
