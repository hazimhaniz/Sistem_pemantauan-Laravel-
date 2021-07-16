<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanSiasatanNewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_siasatan_new', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('projek_id')->nullable();
			$table->string('juru_eia', 191)->nullable();
			$table->string('juru_posteia', 191)->nullable();
			$table->string('juru_audit', 191)->nullable();
			$table->string('alamat', 1000)->nullable();
			$table->string('officer1', 191)->nullable();
			$table->string('officer2', 191)->nullable();
			$table->string('officer3', 191)->nullable();
			$table->dateTime('masuk')->nullable();
			$table->dateTime('keluar')->nullable();
			$table->string('wakil', 191)->nullable();
			$table->text('ringkasan_pasukan_penguatkuasa', 65535)->nullable();
			$table->string('syor', 50)->nullable();
			$table->string('no_kompaun', 50)->nullable();
			$table->date('tarikh_kompaun')->nullable();
			$table->string('nyata', 1000)->nullable();
			$table->text('ulasan_ketua', 65535)->nullable();
			$table->string('nama_ketua', 80)->nullable();
			$table->date('tarikh_ketua')->nullable();
			$table->string('jawatan_ketua', 80)->nullable();
			$table->string('sokongan', 50)->nullable();
			$table->text('ulasan_penyemak', 65535)->nullable();
			$table->string('nama_penyemak', 80)->nullable();
			$table->date('tarikh_penyemak')->nullable();
			$table->string('jawatan_penyemak', 80)->nullable();
			$table->string('setujuan', 50)->nullable();
			$table->text('ulasan_pengarah', 65535)->nullable();
			$table->string('nama_pengarah', 80)->nullable();
			$table->date('tarikh_pengarah')->nullable();
			$table->string('jawatan_pengarah', 80)->nullable();
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
		Schema::drop('laporan_siasatan_new');
	}

}
