<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasFailDetailAktivitiOldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_fail_detail_aktiviti_old', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ekas_id')->nullable();
			$table->string('aktiviti')->nullable();
			$table->string('jenis')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jas_fail_detail_aktiviti_old');
	}

}
