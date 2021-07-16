<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanPermakahanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_permakahan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_pengawasan_laporan_status_id')->unsigned();
			$table->string('monthly_a', 191)->nullable();
			$table->string('monthly_b', 191)->nullable();
			$table->string('monthly_c', 191)->nullable();
			$table->string('monthly_d', 191)->nullable();
			$table->string('monthly_e', 191)->nullable();
			$table->string('monthly_f', 191)->nullable();
			$table->string('monthly_d_rainy', 191)->nullable();
			$table->string('total', 191)->nullable();
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
		Schema::drop('laporan_permakahan');
	}

}
