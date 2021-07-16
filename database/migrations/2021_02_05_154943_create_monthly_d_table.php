<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyDTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_d', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('pakej_id');
			$table->integer('status_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('version', 191)->nullable();
			$table->integer('old_data')->nullable();
			$table->timestamps();
			$table->text('ulasan', 65535)->nullable();
			$table->integer('is_completed')->nullable();
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
		Schema::drop('monthly_d');
	}

}
