<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcement', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->text('description', 65535);
			$table->integer('announcement_type_id')->unsigned();
			$table->date('date_start');
			$table->date('date_end');
			$table->integer('created_by_user_id')->unsigned();
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
		Schema::drop('announcement');
	}

}
