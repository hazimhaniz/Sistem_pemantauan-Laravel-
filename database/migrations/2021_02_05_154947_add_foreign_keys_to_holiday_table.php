<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHolidayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('holiday', function(Blueprint $table)
		{
			$table->foreign('created_by_user_id')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('holiday_type_id')->references('id')->on('master_holiday_type')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('holiday', function(Blueprint $table)
		{
			$table->dropForeign('holiday_created_by_user_id_foreign');
			$table->dropForeign('holiday_holiday_type_id_foreign');
		});
	}

}
