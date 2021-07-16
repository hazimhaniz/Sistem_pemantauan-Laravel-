<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementTargetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcement_target', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('announcement_id')->unsigned()->unique();
			$table->integer('role_id')->unsigned()->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('announcement_target');
	}

}
