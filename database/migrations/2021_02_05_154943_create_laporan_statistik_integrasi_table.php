<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanStatistikIntegrasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_statistik_integrasi', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_fail_jas', 50);
			$table->integer('status_projek');
			$table->string('stesen', 12)->default('Projek EIA');
			$table->string('nama_stesen', 25);
			$table->integer('daerah')->nullable();
			$table->string('negeri', 2)->nullable();
			$table->text('lokasi', 65535)->nullable();
			$table->decimal('latitude', 7, 6);
			$table->decimal('longitude', 9, 6);
			$table->integer('pengawasan_id');
			$table->integer('kedalaman');
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
		Schema::drop('laporan_statistik_integrasi');
	}

}
