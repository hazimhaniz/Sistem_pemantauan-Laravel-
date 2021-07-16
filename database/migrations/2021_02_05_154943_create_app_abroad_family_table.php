<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppAbroadFamilyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_abroad_family', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('app_abroad_id')->index('app_abroad_family_fk');
			$table->string('name', 191);
			$table->string('gender', 1);
			$table->string('marital_status', 191)->nullable();
			$table->string('nation', 191)->nullable();
			$table->string('ic_new', 12)->nullable();
			$table->string('ic_old', 12)->nullable();
			$table->string('passport_no', 191)->nullable();
			$table->date('birth_date')->nullable();
			$table->string('cert_no', 191)->nullable();
			$table->string('formw_no', 191)->nullable();
			$table->string('birth_country', 191)->nullable();
			$table->string('birth_place', 191)->nullable();
			$table->string('relation', 191)->nullable();
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
		Schema::drop('app_abroad_family');
	}

}
