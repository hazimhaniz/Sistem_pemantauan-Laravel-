<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyAEscpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_a_escp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthlya_id')->unsigned()->nullable();
			$table->string('nama', 191)->nullable();
			$table->string('status', 191)->nullable();
			$table->string('tarikh_kelulusan', 191)->nullable();
			$table->string('no_rujukan', 191)->nullable();
			$table->string('no_pelan', 191)->nullable();
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
		Schema::drop('monthly_a_escp');
	}

}
