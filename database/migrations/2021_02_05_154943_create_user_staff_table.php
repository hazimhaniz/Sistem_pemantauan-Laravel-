<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_staff', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned()->default(3);
			$table->integer('user_id')->unsigned()->default(3);
			$table->integer('state_id')->unsigned()->default(3);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_staff');
	}

}
