<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFaqTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('faq', function(Blueprint $table)
		{
			$table->foreign('faq_type_id')->references('id')->on('master_faq_type')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('faq', function(Blueprint $table)
		{
			$table->dropForeign('faq_faq_type_id_foreign');
		});
	}

}
