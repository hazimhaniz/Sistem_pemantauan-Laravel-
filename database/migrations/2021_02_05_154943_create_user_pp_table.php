<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_pp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('register_at', 191);
			$table->timestamps();
			$table->softDeletes();
			$table->string('username', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_pp');
	}

}
