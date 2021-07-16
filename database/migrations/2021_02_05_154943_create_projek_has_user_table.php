<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekHasUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_has_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('status');
			$table->integer('user_flag')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('projek_fasa_id')->nullable();
			$table->integer('projek_has_pp_id')->nullable();
			$table->integer('role_id')->nullable();
			$table->integer('eo_has_emc')->nullable();
			$table->integer('replace_user_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projek_has_user');
	}

}
