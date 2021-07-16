<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelHasRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('model_has_role', function(Blueprint $table)
		{
			$table->integer('role_id')->unsigned()->default(0);
			$table->string('model_type', 191);
			$table->bigInteger('model_id')->unsigned();
			$table->timestamps();
			$table->primary(['role_id','model_id','model_type']);
			$table->index(['model_type','model_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('model_has_role');
	}

}
