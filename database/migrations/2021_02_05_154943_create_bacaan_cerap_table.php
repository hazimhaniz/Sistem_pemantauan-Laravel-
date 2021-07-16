<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBacaanCerapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bacaan_cerap', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthly_c_id')->unsigned();
			$table->integer('parameter_id')->unsigned();
			$table->text('bacaan_cerap', 65535)->nullable();
			$table->text('bacaan_cerap_b', 65535)->nullable();
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
		Schema::drop('bacaan_cerap');
	}

}
