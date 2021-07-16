<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppMalaysianDetentionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_malaysian_detention', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('form_id', 191)->nullable();
			$table->string('submission_id', 191)->nullable();
			$table->integer('filing_status_id');
			$table->integer('filing_status_id_konsular')->nullable();
			$table->integer('filing_status_id_malawakil')->nullable();
			$table->string('appl_name', 191);
			$table->string('appl_ic_no', 191);
			$table->string('appl_passport_no', 191);
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
			$table->string('subj_street1', 191)->nullable();
			$table->string('subj_street2', 191)->nullable();
			$table->string('subj_street3', 191)->nullable();
			$table->string('subj_postcode', 5)->nullable();
			$table->string('subj_district', 191)->nullable();
			$table->string('subj_state', 191)->nullable();
			$table->string('subj_country', 191)->nullable();
			$table->string('subj_phone_noh', 191)->nullable();
			$table->string('subj_phone_nom', 191)->nullable();
			$table->string('subj_email', 191)->nullable();
			$table->date('de_date')->nullable();
			$table->string('de_country', 191)->nullable();
			$table->string('de_location', 191)->nullable();
			$table->string('de_punish', 191)->nullable();
			$table->string('de_remark', 191)->nullable();
			$table->string('de_offence', 191)->nullable();
			$table->string('de_offence_other', 191)->nullable();
			$table->string('de_offence_remark', 191)->nullable();
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
		Schema::drop('app_malaysian_detention');
	}

}
