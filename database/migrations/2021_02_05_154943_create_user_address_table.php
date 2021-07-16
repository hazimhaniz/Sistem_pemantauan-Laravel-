<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_address', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('entity_type', 191);
			$table->bigInteger('entity_id')->unsigned();
			$table->integer('address_id')->unsigned()->index('user_address_address_id_foreign');
			$table->timestamps();
			$table->index(['entity_type','entity_id']);
			$table->unique(['entity_id','entity_type','address_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_address');
	}

}
