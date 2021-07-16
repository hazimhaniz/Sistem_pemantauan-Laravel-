<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMasterLetterTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('master_letter_type', function(Blueprint $table)
		{
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
		Schema::table('master_letter_type', function(Blueprint $table)
		{
			$table->dropForeign('master_letter_type_module_id_foreign');
		});
	}

}
