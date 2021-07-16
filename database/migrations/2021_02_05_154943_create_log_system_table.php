<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogSystemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_system', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('module_id')->unsigned()->index('log_system_module_id_foreign');
			$table->integer('activity_type_id')->unsigned()->index('log_system_activity_type_id_foreign');
			$table->text('description', 65535);
			$table->text('data_old', 65535)->nullable();
			$table->text('data_new', 65535)->nullable();
			$table->text('url', 65535);
			$table->string('method', 191)->default('GET');
			$table->string('ip_address', 191)->nullable();
			$table->integer('created_by_user_id')->unsigned()->nullable()->index('log_system_created_by_user_id_foreign');
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
		Schema::drop('log_system');
	}

}
