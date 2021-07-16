<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanEsdrBulananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_esdr_bulanan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_fail_jas', 50);
			$table->date('bulan_tahun');
			$table->integer('markah');
			$table->date('created_at');
			$table->date('updated_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('laporan_esdr_bulanan');
	}

}
