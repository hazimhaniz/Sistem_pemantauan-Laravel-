<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLetterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('letter', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('letter_type_id')->unsigned()->nullable();
			$table->integer('module_id')->unsigned()->index('letter_module_id_foreign');
			$table->text('data', 65535)->nullable();
			$table->string('filing_type', 191);
			$table->bigInteger('filing_id')->unsigned();
			$table->string('entity_type', 191)->nullable();
			$table->bigInteger('entity_id')->unsigned()->nullable();
			$table->integer('created_by_user_id')->unsigned()->index('letter_created_by_user_id_foreign');
			$table->timestamps();
			$table->index(['filing_type','filing_id']);
			$table->index(['entity_type','entity_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('letter');
	}

}
