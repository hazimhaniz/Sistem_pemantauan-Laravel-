<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekFasa1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_fasa_1', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama_fasa')->nullable();
			$table->integer('projek_id')->unsigned()->nullable();
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
		Schema::drop('projek_fasa_1');
	}

}
