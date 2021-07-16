<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekPengawasanLaporanStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_pengawasan_laporan_status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_pengawasan_laporan_id')->unsigned();
			$table->integer('bulan');
			$table->integer('tahun');
			$table->text('laporan_siasatan')->nullable();
			$table->integer('status_id')->unsigned();
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
		Schema::drop('projek_pengawasan_laporan_status');
	}

}
