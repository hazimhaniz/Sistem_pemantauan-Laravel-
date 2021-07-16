<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyDRainyMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_d_rainy_main', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthlyD_id')->unsigned();
			$table->integer('projek_id')->unsigned();
			$table->integer('pakej_id');
			$table->integer('status_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('tarikh', 191)->nullable();
			$table->float('bacaan', 10, 0)->nullable();
			$table->string('hujan', 191)->nullable();
			$table->integer('tempoh')->nullable();
			$table->timestamps();
			$table->time('masa')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monthly_d_rainy_main');
	}

}
