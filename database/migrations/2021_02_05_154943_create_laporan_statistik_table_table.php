<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanStatistikTableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_statistik_table', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('bulan');
			$table->integer('tahun');
			$table->integer('kod_negeri');
			$table->integer('kod_projek');
			$table->string('no_fail_jas', 1000);
			$table->string('status', 50);
			$table->text('nama_projek', 65535);
			$table->string('aktiviti', 1000);
			$table->integer('markah');
			$table->integer('kod_pakej');
			$table->integer('kod_stesen');
			$table->string('nama_stesen', 1000);
			$table->string('latitude', 20);
			$table->string('longitude', 20);
			$table->string('kod_pengawasan', 20);
			$table->string('class', 20);
			$table->integer('kod_parameter');
			$table->string('nama_parameter', 100);
			$table->string('standard', 10);
			$table->string('baseline', 10);
			$table->string('bacaan', 10);
			$table->string('unit', 10);
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
		Schema::drop('laporan_statistik_table');
	}

}
