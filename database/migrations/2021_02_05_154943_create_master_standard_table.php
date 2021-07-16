<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterStandardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_standard', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('jenis_parameter', 191);
			$table->string('class', 5000)->nullable();
			$table->string('parameter', 5000)->nullable();
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
		Schema::drop('master_standard');
	}

}
