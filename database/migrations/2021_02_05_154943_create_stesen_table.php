<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStesenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stesen', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tahun')->nullable();
			$table->integer('bulan')->nullable();
			$table->integer('projek_id')->unsigned();
			$table->integer('jenis_pengawasan_id')->unsigned();
			$table->integer('projek_fasa_id')->comment('Kalau ada fasa masuk sini');
			$table->integer('projek_pengawasan_id')->nullable()->comment('kalau tidak ada fasa');
			$table->string('nama', 191)->nullable();
			$table->string('stesen', 191)->nullable();
			$table->integer('status')->nullable()->comment('Station status');
			$table->string('lembangan', 191)->nullable();
			$table->string('gambar_stesen', 191)->nullable();
			$table->string('longitud')->nullable();
			$table->string('latitud')->nullable();
			$table->string('versi', 191)->nullable();
			$table->string('class', 191)->nullable();
			$table->integer('kategori_tanah')->unsigned()->nullable();
			$table->enum('is_tanah', array('1','0'))->default('0');
			$table->enum('is_pembinaan', array('1','0'))->default('0');
			$table->enum('is_operasi', array('1','0'))->default('0');
			$table->enum('is_eia', array('1','0'))->default('1');
			$table->enum('is_emp', array('1','0'))->default('0');
			$table->date('date_eia')->nullable();
			$table->date('date_emp')->nullable();
			$table->enum('is_prima', array('1','0'))->default('0');
			$table->enum('is_sekunder', array('1','0'))->default('0');
			$table->string('penambahan_status')->nullable();
			$table->timestamps();
			$table->text('url_geolocator', 65535)->nullable();
			$table->integer('main_stesen_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stesen');
	}

}
