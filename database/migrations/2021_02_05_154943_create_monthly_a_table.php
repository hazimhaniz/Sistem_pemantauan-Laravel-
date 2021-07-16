<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyATable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_a', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('pengarah', 191)->nullable();
			$table->date('tarikh_awal')->nullable();
			$table->date('tarikh_akhir')->nullable();
			$table->string('nama_projek', 191)->nullable();
			$table->string('alamat_projek', 191)->nullable();
			$table->string('tel_projek', 191)->nullable();
			$table->string('faks_projek', 191)->nullable();
			$table->string('nama_pemaju', 191)->nullable();
			$table->string('alamat_pemaju', 191)->nullable();
			$table->string('alamat_pemaju1', 191)->nullable();
			$table->string('alamat_pemaju2', 191)->nullable();
			$table->string('tel_pemaju', 191)->nullable();
			$table->string('faks_pemaju', 191)->nullable();
			$table->string('pertukaran_hakmilik', 191)->nullable();
			$table->string('alamat_pemaju_baru', 191)->nullable();
			$table->string('alamat_pemaju_baru1', 191)->nullable();
			$table->string('alamat_pemaju_baru2', 191)->nullable();
			$table->string('tel_pemaju_baru', 191)->nullable();
			$table->string('faks_pemaju_baru', 191)->nullable();
			$table->integer('status_emp')->unsigned()->nullable();
			$table->string('tarikh_kelulusan_emp', 191)->nullable();
			$table->string('no_rujukan_emp', 191)->nullable();
			$table->string('tarikh_kelulusan_emp_projek', 191)->nullable();
			$table->string('no_rujukan_emp_projek', 191)->nullable();
			$table->integer('status_ldp2m2')->unsigned()->nullable();
			$table->string('tarikh_kelulusan_ldp2m2', 191)->nullable();
			$table->string('no_rujukan_ldp2m2', 191)->nullable();
			$table->string('no_pelan_ldp2m2', 191)->nullable();
			$table->integer('status_escp')->unsigned()->nullable();
			$table->string('tarikh_kelulusan_escp', 191)->nullable();
			$table->string('no_rujukan_escp', 191)->nullable();
			$table->string('no_pelan_escp', 191)->nullable();
			$table->integer('status_escp_projek')->unsigned()->nullable();
			$table->string('tarikh_kelulusan_escp_projek', 191)->nullable();
			$table->string('no_rujukan_escp_projek', 191)->nullable();
			$table->string('no_pelan_escp_projek', 191)->nullable();
			$table->integer('status_susunatur')->unsigned()->nullable();
			$table->string('tarikh_kelulusan_susunatur', 191)->nullable();
			$table->string('no_rujukan_susunatur', 191)->nullable();
			$table->string('no_pelan_susunatur', 191)->nullable();
			$table->integer('status_tanah')->unsigned()->nullable();
			$table->string('tarikh_kelulusan_tanah', 191)->nullable();
			$table->string('no_rujukan_tanah', 191)->nullable();
			$table->string('no_pelan_tanah', 191)->nullable();
			$table->string('status_kemajuan_projek_kemajuanbelum', 191)->nullable();
			$table->string('status_kemajuan_projek_kemajuankerjatanah')->nullable();
			$table->string('status_kemajuan_projek_pembinaan')->nullable();
			$table->string('status_kemajuan_projek_kemajuanoperasi')->nullable();
			$table->string('status_pembinaan_siap')->nullable();
			$table->string('status_kemajuan_projek_kemajuantangguh')->nullable();
			$table->string('status_kemajuan_terbengkalai')->nullable();
			$table->string('peratus_siap_kemajuanbelum', 191)->nullable();
			$table->string('peratus_siap_kerja_tanah')->nullable();
			$table->string('peratus_siap_pembinaan')->nullable();
			$table->string('peratus_siap_operasi')->nullable();
			$table->string('peratus_siap')->nullable();
			$table->string('peratus_siap_kemajuantangguh')->nullable();
			$table->string('peratus_siap_terbengkalai')->nullable();
			$table->date('tarikh_mula_kemajuanbelum')->nullable();
			$table->date('tarikh_mula_kerja_tanah')->nullable();
			$table->date('tarikh_mula_pembinaan')->nullable();
			$table->date('tarikh_mula_operasi')->nullable();
			$table->date('tarikh_mula_siap')->nullable();
			$table->date('tarikh_mula_kemajuantangguh')->nullable();
			$table->date('tarikh_mula_terbengkalai')->nullable();
			$table->date('tarikh_dijangka_siap_kemajuanbelum')->nullable();
			$table->date('tarikh_dijangka_siap_kerja_tanah')->nullable();
			$table->date('tarikh_dijangka_siap_pembinaan')->nullable();
			$table->date('tarikh_dijangka_siap_operasi')->nullable();
			$table->date('tarikh_dijangka_siap')->nullable();
			$table->date('tarikh_dijangka_siap_kemajuantangguh')->nullable();
			$table->date('tarikh_dijangka_siap_terbengkalai')->nullable();
			$table->string('fasa_projek', 191)->nullable();
			$table->string('fasa_peratus', 191)->nullable();
			$table->string('gambar', 191)->nullable();
			$table->string('version', 191)->nullable();
			$table->string('old_data', 1000)->nullable();
			$table->timestamps();
			$table->integer('flag')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monthly_a');
	}

}
