<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyAStatusKemajuanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_a_status_kemajuan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthlya_id')->unsigned();
			$table->integer('peratus')->nullable();
			$table->string('status_kemajuan', 191)->nullable();
			$table->string('tarikh_awal', 10)->nullable();
			$table->string('tarikh_akhir', 10)->nullable();
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
		Schema::drop('monthly_a_status_kemajuan');
	}

}
