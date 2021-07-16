<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordMissingPassportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record_missing_passport', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id')->nullable();
			$table->integer('notkomanwel')->nullable();
			$table->integer('komanwel')->nullable();
			$table->integer('ci_country')->nullable();
			$table->string('name', 191)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->integer('reason')->nullable();
			$table->string('child_name', 191)->nullable();
			$table->dateTime('date_flight')->nullable();
			$table->string('police_uploaded', 191)->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('record_missing_passport');
	}

}
