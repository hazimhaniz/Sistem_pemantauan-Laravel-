<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanStatistikEmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_statistik_emp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('laporan_statistik_id', 191);
			$table->string('Januari', 191)->nullable();
			$table->string('Februari', 191)->nullable();
			$table->string('Mac', 191)->nullable();
			$table->string('April', 191)->nullable();
			$table->string('Mei', 191)->nullable();
			$table->string('Jun', 191)->nullable();
			$table->string('Julai', 191)->nullable();
			$table->string('Ogos', 191)->nullable();
			$table->string('September', 191)->nullable();
			$table->string('Oktober', 191)->nullable();
			$table->string('November', 191)->nullable();
			$table->string('Disember', 191)->nullable();
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
		Schema::drop('laporan_statistik_emp');
	}

}
