<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagSignSpecimenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_sign_specimen', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->nullable();
			$table->string('tag', 191)->nullable();
			$table->integer('country')->nullable();
			$table->integer('embassy')->nullable();
			$table->integer('state')->nullable();
			$table->integer('district')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->integer('department')->unsigned()->nullable();
			$table->integer('record_sign_specimen_id')->nullable();
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
		Schema::drop('tag_sign_specimen');
	}

}
