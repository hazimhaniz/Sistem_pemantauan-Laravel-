<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelHasPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('model_has_permission', function(Blueprint $table)
		{
			$table->integer('permission_id')->unsigned()->default(0);
			$table->string('model_type', 191);
			$table->bigInteger('model_id')->unsigned();
			$table->timestamps();
			$table->primary(['permission_id','model_id','model_type']);
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
		Schema::drop('model_has_permission');
	}

}
