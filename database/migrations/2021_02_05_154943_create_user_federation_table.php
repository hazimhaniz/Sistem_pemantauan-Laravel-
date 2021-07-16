<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserFederationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_federation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('registration_no', 191)->nullable();
			$table->timestamp('registered_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('user_federation');
	}

}
