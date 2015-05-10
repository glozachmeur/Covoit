<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTjReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tj_reservation', function(Blueprint $table)
		{
			$table->foreign('idClientReservation', 'C_FK_RESERVATION_idClientReservation_MEMBRE')->references('idMembre')->on('t_membre')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trajetReservation', 'C_FK_RESERVATION_trajetReservation_TRAJET')->references('idTrajet')->on('t_trajet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tj_reservation', function(Blueprint $table)
		{
			$table->dropForeign('C_FK_RESERVATION_idClientReservation_MEMBRE');
			$table->dropForeign('C_FK_RESERVATION_trajetReservation_TRAJET');
		});
	}

}
