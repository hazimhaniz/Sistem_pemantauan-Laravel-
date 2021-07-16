<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanEsdrStesenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_esdr_stesen', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_fail_jas', 50);
			$table->integer('status_projek');
			$table->string('nama_stesen', 25);
			$table->integer('daerah');
			$table->integer('negeri');
			$table->decimal('latitude', 7, 6);
			$table->decimal('longitude', 9, 6);
			$table->integer('pengawasan_id');
			$table->decimal('kedalaman', 3);
			$table->string('kelas', 3);
			$table->string('parameter', 100);
			$table->string('unit', 20);
			$table->string('standard', 10);
			$table->string('baseline', 10);
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
		Schema::drop('laporan_esdr_stesen');
	}

}
