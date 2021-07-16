<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('address', function(Blueprint $table)
		{
			$table->foreign('district_id')->references('id')->on('master_district')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('state_id')->references('id')->on('master_state')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('address', function(Blueprint $table)
		{
			$table->dropForeign('address_district_id_foreign');
			$table->dropForeign('address_state_id_foreign');
		});
	}

}
