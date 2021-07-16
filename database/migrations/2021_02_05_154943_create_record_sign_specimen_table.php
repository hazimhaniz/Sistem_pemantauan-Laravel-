<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordSignSpecimenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record_sign_specimen', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('form_id', 191)->nullable();
			$table->string('name', 191)->nullable();
			$table->integer('filing_status_id')->nullable();
			$table->integer('country')->nullable();
			$table->integer('embassy')->nullable();
			$table->integer('state')->nullable();
			$table->integer('district')->nullable();
			$table->string('department', 191)->nullable();
			$table->string('tag', 191)->nullable();
			$table->string('uploaded_file', 191)->nullable();
			$table->dateTime('accept_date')->nullable();
			$table->text('remark', 65535)->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
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
		Schema::drop('record_sign_specimen');
	}

}
