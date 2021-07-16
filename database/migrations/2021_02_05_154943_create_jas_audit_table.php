<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasAuditTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_audit', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('jas_fail_id')->unsigned();
			$table->date('tarikh_audit')->nullable();
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
		Schema::drop('jas_audit');
	}

}
