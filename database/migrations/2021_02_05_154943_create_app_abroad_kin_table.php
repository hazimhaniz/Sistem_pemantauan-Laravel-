<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppAbroadKinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_abroad_kin', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('app_abroad_id')->index('app_abroad_kin_fk');
			$table->string('name', 191);
			$table->string('street1', 191)->nullable();
			$table->string('street2', 191)->nullable();
			$table->string('street3', 191)->nullable();
			$table->string('postcode', 5)->nullable();
			$table->string('district', 191)->nullable();
			$table->string('state', 191)->nullable();
			$table->string('country', 191)->nullable();
			$table->string('phone_noh', 191)->nullable();
			$table->string('phone_nom', 191)->nullable();
			$table->integer('relation')->nullable();
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
		Schema::drop('app_abroad_kin');
	}

}
