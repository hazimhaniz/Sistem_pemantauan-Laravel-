<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyCTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_c', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('pakej_id');
			$table->integer('status_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->timestamps();
			$table->integer('flag')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monthly_c');
	}

}
