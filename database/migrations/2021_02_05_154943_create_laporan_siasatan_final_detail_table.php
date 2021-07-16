<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanSiasatanFinalDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_siasatan_final_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('laporan_siasatan_final_id');
			$table->string('officer_1', 100)->nullable();
			$table->string('officer_2', 100)->nullable();
			$table->string('officer_3', 100)->nullable();
			$table->dateTime('masuk')->nullable();
			$table->dateTime('keluar')->nullable();
			$table->string('wakil', 100)->nullable();
			$table->text('ringkasan_pasukan_penguatkuasa', 65535)->nullable();
			$table->string('syor', 50)->nullable();
			$table->string('no_kompaun', 50)->nullable();
			$table->date('tarikh_kompaun')->nullable();
			$table->text('nyata', 65535)->nullable();
			$table->text('ulasan_penyiasat', 65535)->nullable();
			$table->string('sokongan', 50)->nullable();
			$table->text('ulasan_penyelia', 65535)->nullable();
			$table->string('setujuan', 50)->nullable();
			$table->text('ulasan_pengarah', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laporan_siasatan_final_detail');
	}

}
