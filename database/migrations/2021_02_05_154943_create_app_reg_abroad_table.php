<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppRegAbroadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_reg_abroad', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_konsular')->nullable();
			$table->dateTime('konsular_inspection_at')->nullable();
			$table->integer('konsular_inspection_by')->nullable();
			$table->text('konsular_inspection_record', 65535)->nullable();
			$table->integer('konsular_report_generated')->nullable();
			$table->integer('konsular_report_generated_by')->nullable();
			$table->dateTime('konsular_report_generated_at')->nullable();
			$table->string('title', 11)->nullable();
			$table->string('name', 191)->nullable();
			$table->string('other_name', 191)->nullable();
			$table->string('gender', 1)->nullable();
			$table->integer('marital_status')->nullable();
			$table->integer('race')->nullable();
			$table->integer('religion')->nullable();
			$table->integer('nation')->nullable();
			$table->integer('visa_status')->nullable();
			$table->string('other_citizen_doc', 191)->nullable();
			$table->date('birth_date')->nullable();
			$table->integer('birth_place')->nullable();
			$table->string('ic_new', 12)->nullable();
			$table->string('ic_old', 12)->nullable();
			$table->integer('mykad_issued_state')->nullable();
			$table->string('mykad_color', 191)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->date('passport_issued_date')->nullable();
			$table->integer('passport_country')->nullable();
			$table->integer('passport_place_issued')->nullable();
			$table->date('passport_expired_date')->nullable();
			$table->string('birth_cert_no', 191)->nullable();
			$table->integer('birth_place_issued')->nullable();
			$table->date('birth_issued_date')->nullable();
			$table->string('vc_visit_country', 191)->nullable();
			$table->string('vc_nearest', 191)->nullable();
			$table->string('vc_street1', 191)->nullable();
			$table->string('vc_street2', 191)->nullable();
			$table->string('vc_street3', 191)->nullable();
			$table->string('vc_postcode', 10)->nullable();
			$table->string('vc_district', 191)->nullable();
			$table->string('vc_phone_noh', 191)->nullable();
			$table->string('vc_phone_nom', 191)->nullable();
			$table->string('vc_email', 191)->nullable();
			$table->date('vc_arival_date')->nullable();
			$table->date('vc_depart_date')->nullable();
			$table->string('vc_m_street1', 191)->nullable();
			$table->string('vc_m_street2', 191)->nullable();
			$table->string('vc_m_street3', 191)->nullable();
			$table->string('vc_m_postcode', 5)->nullable();
			$table->string('vc_m_district', 191)->nullable();
			$table->string('vc_m_phone_noh', 191)->nullable();
			$table->string('vc_m_phone_nom', 191)->nullable();
			$table->string('vc_m_email', 191)->nullable();
			$table->integer('purpose1')->nullable();
			$table->integer('purpose2')->nullable();
			$table->integer('purpose3')->nullable();
			$table->integer('purpose4')->nullable();
			$table->integer('purpose5')->nullable();
			$table->integer('purpose6')->nullable();
			$table->integer('purpose7')->nullable();
			$table->string('si_sponsor', 191)->nullable();
			$table->string('si_institute', 191)->nullable();
			$table->string('si_s_street1', 191)->nullable();
			$table->string('si_s_street2', 191)->nullable();
			$table->string('si_s_street3', 191)->nullable();
			$table->string('si_postcode', 5)->nullable();
			$table->integer('si_country')->nullable();
			$table->integer('si_state')->nullable();
			$table->integer('si_district')->nullable();
			$table->string('si_course', 50)->nullable();
			$table->string('si_levelofstudy', 50)->nullable();
			$table->string('si_duration', 50)->nullable();
			$table->date('si_expected_date')->nullable();
			$table->string('si_previousinstitution', 50)->nullable();
			$table->string('ei_occupation', 191)->nullable();
			$table->string('ei_employer', 191)->nullable();
			$table->string('ei_street1', 191)->nullable();
			$table->string('ei_street2', 191)->nullable();
			$table->string('ei_street3', 191)->nullable();
			$table->string('ei_postcode', 5)->nullable();
			$table->string('ei_state', 191)->nullable();
			$table->string('ei_district', 191)->nullable();
			$table->string('ei_valid_year', 191)->nullable();
			$table->string('pa_accompany', 191)->nullable();
			$table->date('pa_pr_date')->nullable();
			$table->string('pa_pr_cert', 191)->nullable();
			$table->string('pa_other_state', 191)->nullable();
			$table->string('picture_url', 191)->nullable();
			$table->string('picture_url_passport', 191)->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->integer('submitted_by')->nullable();
			$table->dateTime('submitted_at')->nullable();
			$table->timestamps();
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
		Schema::drop('app_reg_abroad');
	}

}
