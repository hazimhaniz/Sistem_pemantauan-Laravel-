<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAppAbroadFamilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('app_abroad_family', function(Blueprint $table)
		{
			$table->foreign('app_abroad_id', 'app_abroad_family_fk')->references('id')->on('app_reg_abroad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('app_abroad_family', function(Blueprint $table)
		{
			$table->dropForeign('app_abroad_family_fk');
		});
	}

}
