<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasFailDetail2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_fail_detail2', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('jas_fail_id')->nullable();
			$table->integer('jas_ekas_id')->nullable();
			$table->string('aktiviti', 191)->nullable();
			$table->string('lokasi')->nullable();
			$table->integer('negeri')->nullable();
			$table->string('pegawai_penggerak', 191)->nullable();
			$table->string('daerah', 50)->nullable();
			$table->integer('bandar')->nullable();
			$table->string('poskod', 191)->nullable();
			$table->string('alamat_surat', 191)->nullable();
			$table->integer('surat_negeri')->nullable();
			$table->integer('surat_daerah')->nullable();
			$table->integer('surat_bandar')->nullable();
			$table->string('surat_poskod', 191)->nullable();
			$table->string('eo', 191)->nullable();
			$table->string('emc', 191)->nullable();
			$table->string('jenis_projek', 191)->nullable();
			$table->string('laporaneia', 191)->nullable();
			$table->string('peringkat_audit', 191)->nullable();
			$table->string('jenis', 191)->nullable();
			$table->string('other_aktiviti', 191)->nullable();
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
		Schema::drop('jas_fail_detail2');
	}

}
