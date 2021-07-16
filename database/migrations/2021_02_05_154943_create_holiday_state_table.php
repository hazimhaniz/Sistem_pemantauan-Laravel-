<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolidayStateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('holiday_state', function(Blueprint $table)
		{
			$table->integer('holiday_id')->unsigned();
			$table->integer('state_id')->unsigned()->index('holiday_state_state_id_foreign');
			$table->primary(['holiday_id','state_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('holiday_state');
	}

}
