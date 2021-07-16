<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKemajuanKerjaPercentageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kemajuan_kerja_percentage', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned()->nullable();
			$table->integer('pakej_id')->unsigned()->nullable();
			$table->integer('monthly_c_id')->unsigned()->nullable();
			$table->string('jenis_pengawasan')->nullable();
			$table->string('percentage', 191)->nullable();
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
		Schema::drop('kemajuan_kerja_percentage');
	}

}
