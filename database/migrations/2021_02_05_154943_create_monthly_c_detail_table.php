<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyCDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_c_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stesen_id')->unsigned();
			$table->integer('monthly_c_id')->unsigned();
			$table->text('ulasan', 65535)->nullable();
			$table->integer('sampel')->nullable();
			$table->string('tarikh_pengsampelan', 191)->nullable();
			$table->string('masa_pengsampelan', 191)->nullable();
			$table->string('longitud_pengsampelan', 191)->nullable();
			$table->string('latitud_pengsampelan', 191)->nullable();
			$table->string('nama_fail', 191)->nullable();
			$table->string('gambar_pengsampelan', 191)->nullable();
			$table->string('cuaca', 191)->nullable();
			$table->string('bacaan_slit_curtain', 191)->nullable();
			$table->string('laporan_kimia', 191)->nullable();
			$table->string('gambar_pengawasan', 191)->nullable();
			$table->string('video_pengawasan', 191)->nullable();
			$table->string('catatan')->nullable();
			$table->string('version', 191)->nullable();
			$table->integer('old_data')->nullable();
			$table->integer('status_flag')->nullable();
			$table->integer('created_by')->nullable();
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
		Schema::drop('monthly_c_detail');
	}

}
