<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMakmalAkreditasiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('makmal_akreditasi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('emc_id')->unsigned()->nullable();
			$table->string('kod_makmal')->nullable();
			$table->string('nama_makmal', 191)->nullable();
			$table->string('no_tel_makmal', 191)->nullable();
			$table->string('alamat_makmal', 191)->nullable();
			$table->integer('skop_pengawasan')->nullable();
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
		Schema::drop('makmal_akreditasi');
	}

}
