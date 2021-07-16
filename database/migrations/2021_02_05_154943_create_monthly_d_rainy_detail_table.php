<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyDRainyDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_d_rainy_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthlyd_rainy_main_id')->unsigned();
			$table->text('ulasan', 65535)->nullable();
			$table->string('tarikh_pemeriksaan', 191)->nullable();
			$table->string('elemen_pemeriksaan', 191)->nullable();
			$table->string('jenis_komponen', 191)->nullable();
			$table->string('kod_bmp', 191)->nullable();
			$table->string('kod_bmp_status', 191)->nullable();
			$table->string('kod_bmp_date', 191)->nullable();
			$table->string('gambar', 191)->nullable();
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
		Schema::drop('monthly_d_rainy_detail');
	}

}
