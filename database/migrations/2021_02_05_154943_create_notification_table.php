<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notification', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('code', 191)->unique();
			$table->text('message', 65535);
			$table->boolean('is_active_emel')->default(0);
			$table->boolean('is_active_system')->default(1);
			$table->integer('created_by_user_id')->unsigned()->index('notification_created_by_user_id_foreign');
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
		Schema::drop('notification');
	}

}
