<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyFTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_f', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('ep', 191)->nullable();
			$table->string('eb', 191)->nullable();
			$table->string('ec', 191)->nullable();
			$table->string('ef', 191)->nullable();
			$table->string('emc', 191)->nullable();
			$table->string('erc', 191)->nullable();
			$table->string('et', 191)->nullable();
			$table->string('version', 191)->nullable();
			$table->string('old_data', 191)->nullable();
			$table->timestamps();
			$table->integer('flag')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monthly_f');
	}

}
