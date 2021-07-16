<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyDRainyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_d_rainy', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->date('tarikh');
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
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
		Schema::drop('monthly_d_rainy');
	}

}
