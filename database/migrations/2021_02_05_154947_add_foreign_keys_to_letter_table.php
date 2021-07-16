<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLetterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('letter', function(Blueprint $table)
		{
			$table->foreign('created_by_user_id')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('NO ACTION');
			$table->foreign('module_id')->references('id')->on('master_module')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('letter', function(Blueprint $table)
		{
			$table->dropForeign('letter_created_by_user_id_foreign');
			$table->dropForeign('letter_module_id_foreign');
		});
	}

}
