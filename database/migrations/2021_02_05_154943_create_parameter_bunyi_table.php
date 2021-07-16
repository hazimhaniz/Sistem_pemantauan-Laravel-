<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParameterBunyiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parameter_bunyi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stesen_id')->unsigned()->default(0);
			$table->string('schedule', 50)->nullable()->default('0');
			$table->string('category', 50)->nullable()->default('0');
			$table->string('noise_parameter', 50)->nullable()->default('0');
			$table->string('standardday', 50)->nullable();
			$table->string('standardevening', 50)->nullable();
			$table->string('standardnight', 50)->nullable();
			$table->string('standardmax', 50)->nullable();
			$table->string('baselineday', 50)->nullable();
			$table->string('baselineevening', 50)->nullable();
			$table->string('baselinenight', 50)->nullable();
			$table->string('baselinemax', 50)->nullable();
			$table->string('baseline_exist_lvl', 50)->nullable();
			$table->string('baseline_new_lvl', 50)->nullable();
			$table->string('baseline_max_lvl', 50)->nullable();
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
		Schema::drop('parameter_bunyi');
	}

}
