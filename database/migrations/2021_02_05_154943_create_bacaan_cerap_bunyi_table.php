<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBacaanCerapBunyiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bacaan_cerap_bunyi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthly_c_id')->unsigned();
			$table->integer('parameter_id')->unsigned();
			$table->string('category', 50);
			$table->string('bacaan_cerap_day', 191)->nullable();
			$table->string('bacaan_cerap_evening', 191)->nullable();
			$table->string('bacaan_cerap_night', 191)->nullable();
			$table->string('bacaan_cerap_max', 191)->nullable();
			$table->string('exist_lvl', 191)->nullable();
			$table->string('new_lvl', 191)->nullable();
			$table->string('max_lvl', 191)->nullable();
			$table->string('bacaan_cerap_b', 191)->nullable();
			$table->string('version', 191)->nullable();
			$table->integer('old_data')->nullable();
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
		Schema::drop('bacaan_cerap_bunyi');
	}

}
