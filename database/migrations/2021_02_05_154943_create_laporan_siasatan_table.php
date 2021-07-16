<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanSiasatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_siasatan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pengawasan_laporan_status_id')->unsigned();
			$table->integer('status_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->text('ulasan', 65535)->nullable();
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
		Schema::drop('laporan_siasatan');
	}

}
