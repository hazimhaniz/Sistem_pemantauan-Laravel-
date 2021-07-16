<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMasterPostcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('master_postcode', function(Blueprint $table)
		{
			$table->foreign('district_id')->references('id')->on('master_district_old')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('master_postcode', function(Blueprint $table)
		{
			$table->dropForeign('master_postcode_district_id_foreign');
		});
	}

}
