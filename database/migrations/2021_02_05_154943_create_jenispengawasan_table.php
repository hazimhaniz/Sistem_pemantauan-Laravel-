<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJenispengawasanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jenispengawasan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned()->nullable();
			$table->string('jenis_pengawasan_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jenispengawasan');
	}

}
