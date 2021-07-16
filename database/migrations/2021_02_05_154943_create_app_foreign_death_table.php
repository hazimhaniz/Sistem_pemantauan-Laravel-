<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppForeignDeathTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_foreign_death', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_konsular')->nullable();
			$table->integer('filing_status_id_malawakil')->nullable();
			$table->string('appl_type', 191);
			$table->string('appl_name', 191);
			$table->string('appl_nation', 191);
			$table->string('appl_ic_no', 191);
			$table->string('appl_passport_no', 191);
			$table->string('appl_embassy', 191);
			$table->string('appl_tpn_ref_no', 191);
			$table->date('appl_tpn_date')->nullable();
			$table->string('appl_fe_contact_person', 191);
			$table->string('appl_fe_phone_no', 191);
			$table->string('appl_fe_email', 191);
			$table->string('appl_enforce_agency', 191);
			$table->string('appl_ea_ref_no', 191);
			$table->string('appl_ea_date', 191);
			$table->string('appl_ea_contact_person', 191);
			$table->string('appl_ea_phone_no', 191);
			$table->string('appl_ea_email', 191);
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
			$table->string('subj_ic_no', 191);
			$table->string('subj_passport_no', 191);
			$table->string('subj_birth_cert', 191);
			$table->date('subj_birth_date')->nullable();
			$table->string('subj_relation', 191);
			$table->string('subj_photo', 191);
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
			$table->date('death_date')->nullable();
			$table->string('death_location', 191)->nullable();
			$table->string('death_cause', 191)->nullable();
			$table->string('death_deceased_status', 191)->nullable();
			$table->string('death_doc', 191)->nullable();
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
		Schema::drop('app_foreign_death');
	}

}
