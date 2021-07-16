<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComplaintExternalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('complaint_external', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('email', 191);
			$table->string('complaint', 191);
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
		Schema::drop('complaint_external');
	}

}
