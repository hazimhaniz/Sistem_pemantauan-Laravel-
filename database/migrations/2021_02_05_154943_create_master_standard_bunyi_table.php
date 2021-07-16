<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterStandardBunyiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_standard_bunyi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('jenis_parameter', 191);
			$table->string('schedule', 191);
			$table->string('categori', 191)->nullable();
			$table->string('time', 10)->nullable();
			$table->string('day', 10)->nullable();
			$table->string('evening', 10)->nullable();
			$table->string('night', 10)->nullable();
			$table->string('max', 10)->nullable();
			$table->string('noise_parameter', 10)->nullable();
			$table->string('parameter', 10)->nullable();
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
		Schema::drop('master_standard_bunyi');
	}

}
