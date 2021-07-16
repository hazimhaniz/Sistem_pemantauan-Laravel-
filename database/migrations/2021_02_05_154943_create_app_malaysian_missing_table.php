<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppMalaysianMissingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_malaysian_missing', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('form_type');
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_konsular')->nullable();
			$table->integer('filing_status_id_malawakil')->nullable();
			$table->integer('filing_status_id_konsular2')->nullable();
			$table->text('reason_konsular', 65535)->nullable();
			$table->text('reason_malawakil', 65535)->nullable();
			$table->text('reason_konsular2', 65535)->nullable();
			$table->integer('konsular2_decision_by')->nullable();
			$table->integer('konsular_decision_by')->nullable();
			$table->integer('malawakil_decision_by')->nullable();
			$table->dateTime('konsular2_decision_at')->nullable();
			$table->dateTime('konsular_decision_at')->nullable();
			$table->dateTime('malawakil_decision_at')->nullable();
			$table->string('appl_name', 191);
			$table->string('appl_ic_no', 191);
			$table->string('appl_passport_no', 191);
			$table->string('appl_street1', 191)->nullable();
			$table->string('appl_street2', 191)->nullable();
			$table->string('appl_street3', 191)->nullable();
			$table->string('appl_postcode', 5)->nullable();
			$table->string('appl_state', 191)->nullable();
			$table->string('appl_district', 191)->nullable();
			$table->string('appl_phone_noh', 191)->nullable();
			$table->string('appl_phone_nom', 191)->nullable();
			$table->string('appl_email', 191)->nullable();
			$table->string('subj_name', 191);
			$table->string('subj_gender', 191);
			$table->string('subj_ic_no', 191);
			$table->string('subj_passport_no', 191);
			$table->string('subj_birth_cert', 191);
			$table->dateTime('subj_birth_date')->nullable();
			$table->string('subj_relation', 191);
			$table->string('subj_photo', 191);
			$table->string('subj_street1', 191)->nullable();
			$table->string('subj_street2', 191)->nullable();
			$table->string('subj_street3', 191)->nullable();
			$table->string('subj_postcode', 5)->nullable();
			$table->string('subj_country', 191)->nullable();
			$table->string('subj_state', 191)->nullable();
			$table->string('subj_district', 191)->nullable();
			$table->string('subj_phone_noh', 191)->nullable();
			$table->string('subj_phone_nom', 191)->nullable();
			$table->string('subj_email', 191)->nullable();
			$table->dateTime('mi_date')->nullable();
			$table->string('mi_country', 191)->nullable();
			$table->string('mi_location', 191)->nullable();
			$table->string('mi_cause', 191)->nullable();
			$table->string('mi_remark', 191)->nullable();
			$table->string('mi_doc', 191)->nullable();
			$table->string('mi_police_report_doc', 191)->nullable();
			$table->string('mi_other_doc', 191)->nullable();
			$table->dateTime('death_date')->nullable();
			$table->integer('death_country')->nullable();
			$table->string('death_location', 191)->nullable();
			$table->text('death_reason', 65535)->nullable();
			$table->integer('death_corpose_manage_type')->nullable();
			$table->text('death_remark', 65535)->nullable();
			$table->string('death_doc1', 191)->nullable();
			$table->string('death_doc2', 191)->nullable();
			$table->string('death_doc3', 191)->nullable();
			$table->string('death_doc4', 191)->nullable();
			$table->string('death_doc5', 191)->nullable();
			$table->string('death_doc6', 191)->nullable();
			$table->dateTime('detention_date')->nullable();
			$table->integer('detention_country')->nullable();
			$table->string('detention_location', 191)->nullable();
			$table->text('detention_punishment', 65535)->nullable();
			$table->integer('detention_type1')->nullable();
			$table->integer('detention_type2')->nullable();
			$table->integer('detention_type3')->nullable();
			$table->integer('detention_type4')->nullable();
			$table->integer('detention_type5')->nullable();
			$table->integer('detention_type6')->nullable();
			$table->integer('detention_type7')->nullable();
			$table->integer('detention_type8')->nullable();
			$table->integer('detention_type9')->nullable();
			$table->integer('detention_type9_remark')->nullable();
			$table->text('detention_remark', 65535)->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('created_by_user_type_id')->nullable();
			$table->integer('updated_by')->nullable();
			$table->integer('submitted_by')->nullable();
			$table->dateTime('submitted_at')->nullable();
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
		Schema::drop('app_malaysian_missing');
	}

}
