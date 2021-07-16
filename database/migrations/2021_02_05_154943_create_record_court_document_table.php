<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordCourtDocumentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record_court_document', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id')->nullable();
			$table->string('letter_reference', 191)->nullable();
			$table->string('from', 191)->nullable();
			$table->string('summons_no', 191)->nullable();
			$table->string('kln_reference_letter', 191)->nullable();
			$table->string('document_receiver', 191)->nullable();
			$table->string('to_agency', 191)->nullable();
			$table->string('status_receive_defendant', 191)->nullable();
			$table->string('notes', 191)->nullable();
			$table->integer('created_by')->nullable();
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
		Schema::drop('record_court_document');
	}

}
