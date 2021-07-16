<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekPengawasanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_pengawasan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('pengawasan_id')->unsigned();
			$table->timestamps();
			$table->integer('user_id')->nullable();
			$table->integer('projek_has_userid')->nullable();
			$table->string('nama_makmal')->nullable();
			$table->string('kod_makmal')->nullable();
			$table->string('no_tel_makmal')->nullable();
			$table->text('alamat_makmal', 65535)->nullable();
			$table->text('alamat_makmal1', 65535)->nullable();
			$table->text('alamat_makmal2', 65535)->nullable();
			$table->string('poskod', 5)->nullable();
			$table->string('makmal_negeri_id', 12)->nullable();
			$table->string('makmal_daerah_id', 12)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projek_pengawasan');
	}

}
