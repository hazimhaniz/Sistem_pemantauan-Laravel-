<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('address1', 191)->nullable();
			$table->string('address2', 191)->nullable();
			$table->string('address3', 191)->nullable();
			$table->string('postcode', 5)->nullable();
			$table->integer('district_id')->unsigned()->nullable()->index('address_district_id_foreign');
			$table->integer('state_id')->unsigned()->nullable()->index('address_state_id_foreign');
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
		Schema::drop('address');
	}

}
