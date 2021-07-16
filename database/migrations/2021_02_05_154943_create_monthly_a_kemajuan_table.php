<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyAKemajuanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_a_kemajuan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('projek_id');
			$table->integer('monthly_a_id');
			$table->integer('pakej_id');
			$table->integer('peratus_kemajuan')->nullable();
			$table->string('status_kemajuan', 191)->nullable();
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
		Schema::drop('monthly_a_kemajuan');
	}

}
