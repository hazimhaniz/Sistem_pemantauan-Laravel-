<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLogFilingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('log_filing', function(Blueprint $table)
		{
			$table->foreign('activity_type_id')->references('id')->on('master_activity_type')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('created_by_user_id')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('filing_status_id')->references('id')->on('master_filing_status')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('module_id')->references('id')->on('master_module')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('role_id')->references('id')->on('role')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('log_filing', function(Blueprint $table)
		{
			$table->dropForeign('log_filing_activity_type_id_foreign');
			$table->dropForeign('log_filing_created_by_user_id_foreign');
			$table->dropForeign('log_filing_filing_status_id_foreign');
			$table->dropForeign('log_filing_module_id_foreign');
			$table->dropForeign('log_filing_role_id_foreign');
		});
	}

}
