<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLogSystemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('log_system', function(Blueprint $table)
		{
			$table->foreign('activity_type_id')->references('id')->on('master_activity_type')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('created_by_user_id')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('module_id')->references('id')->on('master_module')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('log_system', function(Blueprint $table)
		{
			$table->dropForeign('log_system_activity_type_id_foreign');
			$table->dropForeign('log_system_created_by_user_id_foreign');
			$table->dropForeign('log_system_module_id_foreign');
		});
	}

}
