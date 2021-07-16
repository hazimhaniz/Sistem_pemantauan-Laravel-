<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogFilingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_filing', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_id')->unsigned()->index('log_filing_module_id_foreign');
			$table->integer('activity_type_id')->unsigned()->index('log_filing_activity_type_id_foreign');
			$table->string('filing_type', 191);
			$table->bigInteger('filing_id')->unsigned();
			$table->integer('filing_status_id')->unsigned()->index('log_filing_filing_status_id_foreign');
			$table->text('data', 65535);
			$table->integer('created_by_user_id')->unsigned()->index('log_filing_created_by_user_id_foreign');
			$table->integer('role_id')->unsigned()->index('log_filing_role_id_foreign');
			$table->timestamps();
			$table->index(['filing_type','filing_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('log_filing');
	}

}
