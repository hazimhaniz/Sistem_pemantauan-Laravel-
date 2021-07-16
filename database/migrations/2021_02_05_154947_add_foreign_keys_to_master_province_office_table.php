<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMasterProvinceOfficeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('master_province_office', function(Blueprint $table)
		{
			$table->foreign('address_id')->references('id')->on('address')->onUpdate('CASCADE')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('master_province_office', function(Blueprint $table)
		{
			$table->dropForeign('master_province_office_address_id_foreign');
		});
	}

}
