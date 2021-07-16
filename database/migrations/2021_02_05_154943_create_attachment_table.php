<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attachment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('filing_type', 191)->nullable();
			$table->bigInteger('filing_id')->unsigned()->nullable();
			$table->string('file_type', 191)->nullable();
			$table->string('name', 191);
			$table->text('url', 65535);
			$table->integer('created_by_user_id')->unsigned();
			$table->timestamps();
			$table->index(['filing_type','filing_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attachment');
	}

}
