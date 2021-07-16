<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengawasanHasEoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengawasan_has_eo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pakej_has_pengawasan_id', 191);
			$table->string('pakej', 191);
			$table->integer('user_id')->unsigned();
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
		Schema::drop('pengawasan_has_eo');
	}

}
