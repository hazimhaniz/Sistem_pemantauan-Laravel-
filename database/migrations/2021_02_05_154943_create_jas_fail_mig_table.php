<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasFailMigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_fail_mig', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->default(0);
			$table->text('name', 65535);
			$table->string('nofail', 191);
			$table->integer('status')->unsigned();
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
		Schema::drop('jas_fail_mig');
	}

}
