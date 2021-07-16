<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faq', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code', 191)->nullable();
			$table->text('question', 65535);
			$table->text('answer', 65535);
			$table->integer('status')->unsigned()->default(1);
			$table->integer('faq_type_id')->unsigned()->default(1)->index('faq_faq_type_id_foreign');
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
		Schema::drop('faq');
	}

}
