<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLaporanPermakahanFinalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('laporan_permakahan_final', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->integer('status_id')->nullable()->default(507);
			$table->integer('monthly_a')->nullable()->default(0);
			$table->integer('monthly_a_kuiri')->nullable()->default(0);
			$table->integer('monthly_b')->nullable()->default(0);
			$table->integer('monthly_b_kuiri')->nullable()->default(0);
			$table->integer('monthly_c')->nullable()->default(0);
			$table->integer('monthly_c_kuiri')->nullable()->default(0);
			$table->integer('monthly_d')->nullable()->default(0);
			$table->integer('monthly_d_kuiri')->nullable()->default(0);
			$table->integer('monthly_e')->nullable()->default(0);
			$table->integer('monthly_e_kuiri')->nullable()->default(0);
			$table->integer('monthly_f')->nullable()->default(0);
			$table->integer('monthly_f_kuiri')->nullable()->default(0);
			$table->integer('total')->nullable()->default(0);
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
		Schema::drop('laporan_permakahan_final');
	}

}
