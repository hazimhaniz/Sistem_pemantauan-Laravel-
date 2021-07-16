<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePakejHasPengawasanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pakej_has_pengawasan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pakej_id', 191);
			$table->string('pengawasan_id', 191);
			$table->integer('user_eo_id')->nullable();
			$table->integer('user_emc_id')->nullable();
			$table->integer('status');
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
		Schema::drop('pakej_has_pengawasan');
	}

}
