<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekHasPpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_has_pp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('role_id')->unsigned();
			$table->integer('projek_id')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projek_has_pp');
	}

}
