<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserInternalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_internal', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_id')->unsigned()->default(3)->index('user_internal_role_id_foreign');
			$table->integer('province_office_id')->unsigned()->index('user_internal_province_office_id_foreign');
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
		Schema::drop('user_internal');
	}

}
