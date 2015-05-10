<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTjReservationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tj_reservation', function(Blueprint $table)
		{
			$table->integer('idReservation', true);
			$table->integer('idClientReservation')->index('ind_RESERVATION_idClientReservation');
			$table->integer('trajetReservation')->index('ind_RESERVATION_trajetReservation');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tj_reservation');
	}

}
