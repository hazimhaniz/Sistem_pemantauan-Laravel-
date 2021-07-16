<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasFailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_fail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name', 65535);
			$table->string('nofail', 191);
			$table->integer('status')->unsigned();
			$table->timestamps();
			$table->integer('is_inserted')->nullable()->default(0);
			$table->dateTime('inserted_at')->default('0000-00-00 00:00:00');
			$table->integer('old_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jas_fail');
	}

}
