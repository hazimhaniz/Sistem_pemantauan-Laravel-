<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notification', function(Blueprint $table)
		{
			$table->foreign('created_by_user_id')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notification', function(Blueprint $table)
		{
			$table->dropForeign('notification_created_by_user_id_foreign');
		});
	}

}
