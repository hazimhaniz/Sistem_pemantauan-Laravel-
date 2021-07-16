<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSilitCurtainPengawasanStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('silit_curtain_pengawasan_status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('silit_curtain_id')->unsigned();
			$table->integer('pengawasan_id')->unsigned();
			$table->integer('status_id')->unsigned();
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
		Schema::drop('silit_curtain_pengawasan_status');
	}

}
