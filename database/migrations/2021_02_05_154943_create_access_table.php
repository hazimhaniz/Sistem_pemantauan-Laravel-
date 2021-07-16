<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('access', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->index();
			$table->string('link', 191);
			$table->string('method', 191);
			$table->text('description', 65535)->nullable();
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
		Schema::drop('access');
	}

}
