<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHolidayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('holiday', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->integer('holiday_type_id')->unsigned()->nullable()->index('holiday_holiday_type_id_foreign');
			$table->date('start_date');
			$table->integer('duration')->unsigned()->default(1);
			$table->integer('created_by_user_id')->unsigned()->index('holiday_created_by_user_id_foreign');
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
		Schema::drop('holiday');
	}

}
