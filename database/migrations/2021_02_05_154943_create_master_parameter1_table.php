<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterParameter1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_parameter1', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('jenis_pengawasan')->unsigned();
			$table->string('jenis_parameter', 2500);
			$table->string('unit', 191);
			$table->enum('mode', array('mandatory','optional'))->default('optional');
			$table->string('versi', 191)->default('lama');
			$table->string('schedule', 5000)->nullable();
			$table->enum('is_hashtag', array('1','0'))->default('0');
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
		Schema::drop('master_parameter1');
	}

}
