<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('queue', 191)->index();
			$table->text('payload');
			$table->boolean('attempts');
			$table->dateTime('reserved_at')->nullable();
			$table->dateTime('available_at')->default('0000-00-00 00:00:00');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job');
	}

}
