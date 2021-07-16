<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('no_fail_jas', 191)->nullable();
			$table->text('nama_projek', 65535);
			$table->integer('penggerak_projek');
			$table->integer('status')->unsigned()->nullable();
			$table->integer('state')->nullable();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('pindaan_catatan')->nullable();
			$table->timestamp('tarikh_hantar')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('tarikh_sah')->nullable();
			$table->timestamps();
			$table->integer('email_sah')->default(0);
			$table->date('tarikh_awal')->nullable();
			$table->date('tarikh_akhir')->nullable();
			$table->integer('tempoh')->nullable();
			$table->integer('pematuhan_eia')->nullable();
			$table->string('jenis_pakej', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projek');
	}

}
