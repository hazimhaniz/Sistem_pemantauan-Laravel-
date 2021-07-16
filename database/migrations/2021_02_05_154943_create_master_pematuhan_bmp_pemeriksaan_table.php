<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterPematuhanBmpPemeriksaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_pematuhan_bmp_pemeriksaan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('master_komponen_pemeriksaan_id')->nullable();
			$table->string('pematuhan_bmp')->nullable();
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
		Schema::drop('master_pematuhan_bmp_pemeriksaan');
	}

}
