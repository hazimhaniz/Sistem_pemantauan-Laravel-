<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->string('aktiviti', 191)->nullable();
			$table->string('lokasi', 191)->nullable();
			$table->string('lokasi1', 191)->nullable();
			$table->string('lokasi2', 191)->nullable();
			$table->integer('negeri')->nullable();
			$table->integer('daerah')->nullable();
			$table->string('bandar', 191)->nullable();
			$table->string('poskod', 191)->nullable();
			$table->string('alamat_surat', 191)->nullable();
			$table->string('alamat_surat1', 191)->nullable();
			$table->string('alamat_surat2', 191)->nullable();
			$table->integer('surat_negeri')->nullable();
			$table->integer('surat_daerah')->nullable();
			$table->string('surat_bandar', 191)->nullable();
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
		Schema::drop('projek_detail');
	}

}
