<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStesenPengawasanStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stesen_pengawasan_status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned()->nullable();
			$table->integer('pakej_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('status_id')->unsigned()->nullable();
			$table->text('pindaan_catatan', 65535)->nullable();
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
		Schema::drop('stesen_pengawasan_status');
	}

}
