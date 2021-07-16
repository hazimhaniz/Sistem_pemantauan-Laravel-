<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterBmpPemeriksaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_bmp_pemeriksaan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('elemen_id')->nullable();
			$table->string('jenis_pemeriksaan')->nullable();
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
		Schema::drop('master_bmp_pemeriksaan');
	}

}
