<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterBmpPematuhanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_bmp_pematuhan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('master_bmp_id');
			$table->string('name', 191)->nullable();
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
		Schema::drop('master_bmp_pematuhan');
	}

}
