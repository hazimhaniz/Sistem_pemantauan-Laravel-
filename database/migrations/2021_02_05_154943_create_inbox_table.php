<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInboxTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inbox', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_user_id')->unsigned();
			$table->integer('receiver_user_id')->unsigned();
			$table->string('subject', 191);
			$table->text('message', 65535);
			$table->integer('inbox_status_id')->unsigned();
			$table->timestamps();
			$table->text('url', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inbox');
	}

}
