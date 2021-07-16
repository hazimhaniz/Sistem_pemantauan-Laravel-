<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserInternalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_internal', function(Blueprint $table)
		{
			$table->foreign('province_office_id')->references('id')->on('master_province_office')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
		Schema::table('user_internal', function(Blueprint $table)
		{
			$table->dropForeign('user_internal_province_office_id_foreign');
			$table->dropForeign('user_internal_role_id_foreign');
		});
	}

}
