<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekPakejTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_pakej', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned()->nullable();
			$table->string('nama_pakej', 191)->nullable();
			$table->string('kontraktor', 191)->nullable();
			$table->string('pakej_negeri', 191)->nullable();
			$table->string('alamat', 191)->nullable();
			$table->string('alamat1', 191)->nullable();
			$table->string('alamat2', 191)->nullable();
			$table->date('tarikh_mula')->nullable();
			$table->date('tarikh_akhir')->nullable();
			$table->integer('kemajuan_percentage')->nullable();
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
		Schema::drop('projek_pakej');
	}

}
