<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistributionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distribution', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('no_fail_jas', 191);
			$table->integer('assigned_to_user_id')->unsigned()->index('distribution_assigned_to_user_id_foreign');
			$table->integer('assigned_to_user_id_old')->unsigned()->nullable();
			$table->integer('assigned_by')->unsigned()->nullable();
			$table->integer('assigned_pelulus')->unsigned()->nullable();
			$table->integer('assigned_penyelia')->unsigned()->nullable();
			$table->integer('active')->unsigned()->nullable();
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
		Schema::drop('distribution');
	}

}
