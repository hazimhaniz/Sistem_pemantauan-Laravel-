<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppGoodConductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_good_conduct', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_konsular')->nullable();
			$table->integer('filing_status_id_d4');
			$table->integer('filing_status_id_r5');
			$table->integer('filing_status_id_e6');
			$table->text('reason_konsular', 65535)->nullable();
			$table->text('reason_d4', 65535);
			$table->text('reason_r5', 65535);
			$table->text('reason_e6', 65535);
			$table->integer('appeal_status')->unsigned()->nullable();
			$table->integer('appeal_id')->unsigned()->nullable();
			$table->string('title', 50);
			$table->string('name', 191);
			$table->integer('gender');
			$table->integer('nationality')->nullable();
			$table->string('father_name', 191)->nullable();
			$table->string('mother_name', 191)->nullable();
			$table->string('ci_street1', 191)->nullable();
			$table->string('ci_street2', 191)->nullable();
			$table->string('ci_street3', 191)->nullable();
			$table->string('ci_postcode', 10)->nullable();
			$table->string('ci_country', 191)->nullable();
			$table->string('ci_state', 191)->nullable();
			$table->string('ci_district', 191)->nullable();
			$table->string('ci_phone_noh', 191)->nullable();
			$table->string('ci_phone_nom', 191)->nullable();
			$table->string('ci_email', 191)->nullable();
			$table->string('ic_new', 50)->nullable();
			$table->string('ic_old', 50)->nullable();
			$table->string('mykad_issued', 191)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->date('passport_issued_date')->nullable();
			$table->string('passport_holder', 191)->nullable();
			$table->date('passport_expired_date')->nullable();
			$table->date('birth_date')->nullable();
			$table->integer('info_type1')->nullable();
			$table->integer('info_type2')->nullable();
			$table->string('ei_occupation', 191)->nullable();
			$table->string('ei_employer', 191)->nullable();
			$table->string('ei_street1', 191)->nullable();
			$table->string('ei_street2', 191)->nullable();
			$table->string('ei_street3', 191)->nullable();
			$table->string('ei_postcode', 10)->nullable();
			$table->string('ei_country', 191)->nullable();
			$table->string('ei_state', 191)->nullable();
			$table->string('ei_district', 191)->nullable();
			$table->string('hei_institution', 191)->nullable();
			$table->string('hei_street1', 191)->nullable();
			$table->string('hei_street2', 191)->nullable();
			$table->string('hei_street3', 191)->nullable();
			$table->string('hei_postcode', 10)->nullable();
			$table->string('hei_country', 191)->nullable();
			$table->string('hei_state', 191)->nullable();
			$table->string('hei_district', 191)->nullable();
			$table->dateTime('hei_start_edu')->nullable();
			$table->dateTime('hei_end_edu')->nullable();
			$table->integer('app_purpose6')->nullable();
			$table->integer('app_purpose5')->nullable();
			$table->integer('app_purpose4')->nullable();
			$table->integer('app_purpose3')->nullable();
			$table->integer('app_purpose2')->nullable();
			$table->integer('app_purpose1')->nullable();
			$table->string('app_purpose6_other', 191)->nullable();
			$table->string('app_require_cert', 11)->nullable();
			$table->string('cert_get_type', 191)->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->integer('submitted_by')->nullable();
			$table->dateTime('submitted_at')->nullable();
			$table->string('picture_url', 191)->nullable()->default('');
			$table->string('picture_url_passport', 191)->nullable()->default('');
			$table->integer('konsular_decision_by')->nullable();
			$table->integer('pdrm_d4_decision_by')->nullable();
			$table->integer('pdrm_r5_decision_by')->nullable();
			$table->integer('pdrm_e6_decision_by')->nullable();
			$table->integer('malawakil_decision_by')->nullable();
			$table->dateTime('konsular_decision_at')->nullable();
			$table->dateTime('pdrm_d4_decision_at')->nullable();
			$table->dateTime('pdrm_r5_decision_at')->nullable();
			$table->dateTime('pdrm_e6_decision_at')->nullable();
			$table->dateTime('malawakil_decision_at')->nullable();
			$table->dateTime('konsular_accept_date')->nullable();
			$table->string('pos_tracking_no', 191)->nullable();
			$table->string('reason_malawakil', 191)->nullable();
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
		Schema::drop('app_good_conduct');
	}

}
