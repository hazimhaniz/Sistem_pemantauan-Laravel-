<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanEsdrParameterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_esdr_parameter', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_fail_jas', 50);
			$table->string('nama_stesen', 25);
			$table->date('tarikh_persampelan');
			$table->time('masa_persampelan');
			$table->integer('pengawasan_id');
			$table->string('parameter', 100);
			$table->string('bacaan', 10);
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
		Schema::drop('laporan_esdr_parameter');
	}

}
