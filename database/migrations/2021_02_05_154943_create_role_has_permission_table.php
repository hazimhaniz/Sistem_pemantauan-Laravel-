<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleHasPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_has_permission', function(Blueprint $table)
		{
			$table->integer('permission_id')->unsigned()->default(0);
			$table->integer('role_id')->unsigned()->default(0);
			$table->timestamps();
			$table->primary(['permission_id','role_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_has_permission');
	}

}
