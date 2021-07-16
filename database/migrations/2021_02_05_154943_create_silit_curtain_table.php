<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSilitCurtainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('silit_curtain', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('pakej_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->integer('melibatkan_silit_curtain')->nullable();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
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
		Schema::drop('silit_curtain');
	}

}
