<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppForeignMissingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_foreign_missing', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('is_excel')->nullable();
			$table->integer('form_type')->nullable();
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_konsular')->nullable();
			$table->integer('filing_status_id_malawakil')->nullable();
			$table->string('appl_type', 191);
			$table->string('nationality', 191)->nullable();
			$table->string('name', 191)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->string('notification_nv', 191)->nullable();
			$table->string('nv_no', 191)->nullable();
			$table->dateTime('nv_date')->nullable();
			$table->string('police_report_no', 191)->nullable();
			$table->string('offences', 191)->nullable();
			$table->string('case_classification', 191)->nullable();
			$table->string('other', 191)->nullable();
			$table->string('details', 191)->nullable();
			$table->string('appl_name', 191);
			$table->string('appl_nation', 191);
			$table->string('appl_ic_no', 191);
			$table->string('appl_passport_no', 191);
			$table->string('appl_embassy', 191);
			$table->integer('tpn_created')->nullable();
			$table->string('appl_tpn_ref_no', 191);
			$table->date('appl_tpn_date')->nullable();
			$table->string('appl_fe_mobile_no', 191);
			$table->string('appl_fe_phone_no', 191);
			$table->string('appl_fe_email', 191);
			$table->string('appl_enforce_agency', 191);
			$table->string('appl_ea_ref_no', 191);
			$table->string('appl_ea_date', 191);
			$table->string('appl_ea_contact_name', 191)->nullable();
			$table->string('appl_ea_mobile_no', 191);
			$table->string('appl_ea_phone_no', 191);
			$table->string('appl_ea_email', 191);
			$table->string('appl_embassy_name', 191)->nullable();
			$table->string('appl_embassy_tpn', 191)->nullable();
			$table->dateTime('appl_embassy_tpn_date')->nullable();
			$table->string('appl_embasy_contact_name', 191)->nullable();
			$table->string('appl_embassy_mobile_no', 11)->nullable();
			$table->string('appl_embassy_email', 191)->nullable();
			$table->string('appl_street1', 191)->nullable();
			$table->string('appl_street2', 191)->nullable();
			$table->string('appl_street3', 191)->nullable();
			$table->string('appl_postcode', 5)->nullable();
			$table->string('appl_district', 191)->nullable();
			$table->string('appl_state', 191)->nullable();
			$table->string('appl_country', 191)->nullable();
			$table->string('appl_phone_noh', 191)->nullable();
			$table->string('appl_phone_nom', 191)->nullable();
			$table->string('appl_email', 191)->nullable();
			$table->string('subj_name', 191);
			$table->string('subj_gender', 191);
			$table->integer('subj_nationality')->nullable();
			$table->string('subj_ic_no', 191);
			$table->string('subj_passport_no', 191);
			$table->string('subj_birth_cert', 191);
			$table->string('subj_mobile_phone', 191)->nullable();
			$table->string('subj_home_phone', 191)->nullable();
			$table->date('subj_birth_date')->nullable();
			$table->string('subj_relation', 191);
			$table->string('subj_photo', 191);
			$table->string('subj_street1', 191)->nullable();
			$table->string('subj_street2', 191)->nullable();
			$table->string('subj_street3', 191)->nullable();
			$table->integer('subj_district')->nullable();
			$table->integer('subj_state')->nullable();
			$table->integer('subj_postcode')->nullable();
			$table->string('appl_lkc_street1', 191)->nullable();
			$table->string('appl_lkc_street2', 191)->nullable();
			$table->string('appl_lkc_street3', 191)->nullable();
			$table->string('appl_lkc_postcode', 5)->nullable();
			$table->string('appl_lkc_district', 191)->nullable();
			$table->string('appl_lkc_state', 191)->nullable();
			$table->string('appl_lkc_country', 191)->nullable();
			$table->string('appl_lkc_phone_noh', 191)->nullable();
			$table->string('appl_lkc_phone_nom', 191)->nullable();
			$table->string('appl_lkc_email', 191)->nullable();
			$table->string('appl_lkc_doc', 191)->nullable();
			$table->date('mi_date')->nullable();
			$table->string('mi_location', 191)->nullable();
			$table->string('mi_cause', 191)->nullable();
			$table->string('mi_trans_enter', 191)->nullable();
			$table->string('mi_police_report', 191)->nullable();
			$table->string('mi_doc', 191)->nullable();
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
		Schema::drop('app_foreign_missing');
	}

}
