<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanStatistikTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_statistik', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('projek_id', 191)->nullable();
			$table->string('pengawasan', 191);
			$table->string('stesen', 191);
			$table->string('parameter', 191);
			$table->string('baseline_eia', 191)->nullable();
			$table->string('baseline_emp', 191)->nullable();
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
		Schema::drop('laporan_statistik');
	}

}
