<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterKomponenPemeriksaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_komponen_pemeriksaan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('master_bmp_pemeriksaan_id')->nullable();
			$table->string('komponen')->nullable();
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
		Schema::drop('master_komponen_pemeriksaan');
	}

}
