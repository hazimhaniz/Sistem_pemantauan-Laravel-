<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyDBulananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_d_bulanan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthlyD_id')->unsigned();
			$table->string('elemen_pemeriksaan', 191)->nullable();
			$table->string('jenis_komponen', 191)->nullable();
			$table->text('ulasan', 65535)->nullable();
			$table->string('kod_bmp', 191)->nullable();
			$table->string('kod_bmp_status', 191)->nullable();
			$table->date('kod_bmp_date')->nullable();
			$table->string('gambar', 191)->nullable();
			$table->string('version', 191)->nullable();
			$table->string('old_data', 191)->nullable();
			$table->timestamps();
			$table->integer('flag_update')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monthly_d_bulanan');
	}

}
