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
			$table->integer('idConducteurTrajet')->unsigned();
			$table->string('villeDepartTrajet', 25);
			$table->string('villeArriveeTrajet', 25);
			$table->date('dateDebutTrajet');
			$table->time('dureeTrajet');
			//$table->integer('appreciationTrajet')->unsigned();
			$table->integer('nbPlacesTrajet');
			$table->boolean('statutTrajet')->default(false);
			$table->integer('pppTrajet');
			
			$table->foreign('idConducteurTrajet')
				  ->references('id')
				  ->on('users')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
				  
			$table->timestamps();
			$table->engine = 'InnoDB';
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
