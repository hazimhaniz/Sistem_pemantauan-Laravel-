<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_city', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('kod_negeri', 50)->nullable();
			$table->string('kod_daerah', 50)->nullable();
			$table->string('kod_bandar', 50)->nullable();
			$table->string('name', 50)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('master_city');
	}

}
