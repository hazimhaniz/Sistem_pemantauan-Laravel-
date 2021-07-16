<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppAppealSkbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_appeal_skb', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('good_conduct_id')->unsigned()->nullable();
			$table->string('form_id', 191)->nullable()->default('');
			$table->string('submission_id', 191)->nullable()->default('');
			$table->integer('filing_status_id')->nullable();
			$table->date('upload_date')->nullable();
			$table->dateTime('submitted_at')->nullable();
			$table->integer('submitted_by')->nullable();
			$table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->string('upload1_filename', 191)->nullable();
			$table->string('upload1_real_filename', 191)->nullable();
			$table->string('upload2_filename', 191)->nullable();
			$table->string('upload2_real_filename', 191)->nullable();
			$table->string('upload3_filename', 191)->nullable();
			$table->string('upload3_real_filename', 191)->nullable();
			$table->string('upload4_filename', 191)->nullable();
			$table->string('upload4_real_filename', 191)->nullable();
			$table->string('konsular_decision', 191)->nullable()->default('');
			$table->text('konsular_comment', 65535)->nullable();
			$table->dateTime('konsular_at')->nullable();
			$table->integer('konsular_by')->nullable();
			$table->string('konsular_upload_filename', 191)->nullable();
			$table->string('konsular_upload_real_filename', 191)->nullable();
			$table->dateTime('konsular_date_decision')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_appeal_skb');
	}

}
