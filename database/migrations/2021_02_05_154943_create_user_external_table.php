<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserExternalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_external', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('no_ic', 191)->nullable();
			$table->date('birth_date')->nullable();
			$table->char('gender', 1)->nullable();
			$table->integer('age')->nullable();
			$table->integer('birth_state')->nullable();
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
		Schema::drop('user_external');
	}

}
