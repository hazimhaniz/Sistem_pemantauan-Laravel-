<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterHolidayTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_holiday_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->date('start_date')->nullable();
			$table->integer('duration')->unsigned()->default(1);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('master_holiday_type');
	}

}
