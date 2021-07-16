<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanSiasatanFinalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_siasatan_final', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id');
			$table->integer('tahun')->nullable();
			$table->integer('bulan')->nullable();
			$table->integer('status')->default(1);
			$table->integer('penyiasat_id')->nullable();
			$table->text('penyiasat_comment', 65535)->nullable();
			$table->dateTime('penyiasat_approved')->nullable();
			$table->string('wakil_pemaju', 191)->nullable();
			$table->integer('penyelia_id')->nullable();
			$table->text('penyelia_comment', 65535)->nullable();
			$table->dateTime('penyelia_approved')->nullable();
			$table->integer('pengarah_id')->nullable();
			$table->text('pengarah_comment', 65535)->nullable();
			$table->dateTime('pengarah_approved')->nullable();
			$table->string('syor', 191)->nullable()->default('[]');
			$table->dateTime('in_datetime')->nullable();
			$table->dateTime('out_datetime')->nullable();
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
		Schema::drop('laporan_siasatan_final');
	}

}
