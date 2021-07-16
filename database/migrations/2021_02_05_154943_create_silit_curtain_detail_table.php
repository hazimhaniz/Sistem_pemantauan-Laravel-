<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSilitCurtainDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('silit_curtain_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('silit_curtain_id')->unsigned();
			$table->integer('pengawasan_id')->nullable();
			$table->integer('parameter_id')->unsigned();
			$table->integer('bacaan')->nullable();
			$table->string('bacaan_cerap', 191)->nullable();
			$table->string('bacaan_cerap_b', 191)->nullable();
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
		Schema::drop('silit_curtain_detail');
	}

}
