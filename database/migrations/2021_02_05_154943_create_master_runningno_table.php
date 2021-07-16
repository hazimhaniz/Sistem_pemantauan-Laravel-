<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterRunningnoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_runningno', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->nullable();
			$table->string('code', 191)->nullable()->default('');
			$table->integer('count')->nullable();
			$table->string('type', 191)->nullable()->default('');
			$table->integer('module_id')->nullable();
			$table->string('year', 191)->nullable()->default('')->comment('system will update the data at this column through schedular which will update on 00:00 on new year');
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
		Schema::drop('master_runningno');
	}

}
