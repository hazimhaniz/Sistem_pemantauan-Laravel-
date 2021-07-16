<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParameterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parameter', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('stesen_id')->unsigned();
			$table->integer('parameter')->unsigned()->nullable()->index('parameter');
			$table->integer('standard')->unsigned()->nullable()->index('standard');
			$table->string('baselineeia', 191)->nullable();
			$table->string('baselineemp', 191)->nullable();
			$table->enum('mode', array('mandatory','optional'))->default('optional');
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
		Schema::drop('parameter');
	}

}
