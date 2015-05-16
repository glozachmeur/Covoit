<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAppreciationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_appreciation', function(Blueprint $table)
		{
			$table->increments('idAppreciation');
			$table->integer('valeurAppreciation');
			$table->string('commentaireAppreciation',100);
			
			$table->timestamps();
			$table->engine = 'InnoDB';		});
		
	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_appreciation');
	}

}
