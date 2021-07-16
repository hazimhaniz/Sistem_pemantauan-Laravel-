<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNofileAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nofile_attachment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('url', 191);
			$table->string('type', 191);
			$table->integer('created_by_user_id')->unsigned();
			$table->timestamps();
			$table->integer('is_submit')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nofile_attachment');
	}

}
