<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanStatistikIntegrasiBacaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_statistik_integrasi_bacaan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_fail_jas', 50);
			$table->string('stesen', 25);
			$table->date('bulan_tahun');
			$table->date('tarikh_persampelan');
			$table->time('masa_persampelan');
			$table->string('parameter', 100);
			$table->string('unit', 5);
			$table->string('bacaan_bulanan', 10);
			$table->date('updated_at');
			$table->date('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laporan_statistik_integrasi_bacaan');
	}

}
