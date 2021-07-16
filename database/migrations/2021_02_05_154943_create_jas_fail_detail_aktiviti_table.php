<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasFailDetailAktivitiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_fail_detail_aktiviti', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ekas_id')->nullable();
			$table->string('aktiviti')->nullable();
			$table->string('jenis')->nullable();
			$table->timestamps();
			$table->integer('is_inserted')->nullable()->default(0);
			$table->dateTime('inserted_at')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jas_fail_detail_aktiviti');
	}

}
