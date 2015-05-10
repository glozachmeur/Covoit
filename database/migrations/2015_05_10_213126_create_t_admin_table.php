<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_admin', function(Blueprint $table)
		{
			$table->integer('idAdmin', true);
			$table->string('pseudoAdmin', 20);
			$table->string('prenomAdmin', 25);
			$table->string('nomAdmin', 25);
			$table->string('mdpAdmin', 20);
			$table->string('emailAdmin', 75);
			$table->string('telFixeAdmin', 13)->nullable();
			$table->string('telPortAdmin', 13);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_admin');
	}

}
