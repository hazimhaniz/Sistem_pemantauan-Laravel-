<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppWaiverTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_waiver', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_malawakil');
			$table->integer('filing_status_id_konsular');
			$table->integer('filing_status_id_kdn')->nullable();
			$table->string('title', 50);
			$table->string('name', 191);
			$table->string('gender', 1);
			$table->string('nation', 191)->nullable();
			$table->string('ci_street1', 191)->nullable();
			$table->string('ci_street2', 191)->nullable();
			$table->string('ci_street3', 191)->nullable();
			$table->string('ci_postcode', 5)->nullable();
			$table->string('ci_country', 191)->nullable();
			$table->string('ci_state', 191)->nullable();
			$table->string('ci_district', 191)->nullable();
			$table->string('ci_phone_noh', 191)->nullable();
			$table->string('ci_phone_nom', 191)->nullable();
			$table->string('ci_email', 191)->nullable();
			$table->integer('financing')->nullable();
			$table->string('ic_new', 12)->nullable();
			$table->string('ic_old', 12)->nullable();
			$table->string('picture_url_passport', 191)->nullable();
			$table->string('picture_url', 191)->nullable();
			$table->string('mykad_issued', 191)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->date('passport_issued_date')->nullable();
			$table->string('passport_holder', 191)->nullable();
			$table->date('passport_expired_date')->nullable();
			$table->date('birth_date')->nullable();
			$table->integer('app_purpose2')->nullable();
			$table->integer('app_purpose1')->nullable();
			$table->integer('reference_no_updated_by')->nullable();
			$table->dateTime('reference_no_updated_at')->nullable();
			$table->string('reference_no', 191)->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->integer('submitted_by')->nullable();
			$table->text('kdn_decision_comment', 65535)->nullable();
			$table->dateTime('kdn_decision_at')->nullable();
			$table->integer('kdn_decision_by')->nullable();
			$table->string('konsular_decision_comment', 191)->nullable();
			$table->integer('konsular_decision_at')->nullable();
			$table->dateTime('malawakil_decision_at')->nullable();
			$table->integer('malawakil_decision_by')->nullable();
			$table->dateTime('malawakil_inspection_date')->nullable();
			$table->text('malawakil_decision_comment', 65535)->nullable();
			$table->string('malawakil_approve_document', 191)->nullable();
			$table->dateTime('submitted_at')->nullable();
			$table->dateTime('kdn_decision_realdate')->nullable();
			$table->dateTime('first_time_submit_date')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_waiver');
	}

}
