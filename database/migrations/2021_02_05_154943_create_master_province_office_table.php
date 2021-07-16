<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterProvinceOfficeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_province_office', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->integer('address_id')->unsigned()->nullable()->index('master_province_office_address_id_foreign');
			$table->string('phone', 191)->nullable();
			$table->string('fax', 191)->nullable();
			$table->string('email', 191)->nullable();
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
		Schema::drop('master_province_office');
	}

}
