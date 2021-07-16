<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterFilingStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_filing_status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('int_text', 191)->nullable();
			$table->string('ext_text', 191)->nullable();
			$table->string('desc', 191)->nullable();
			$table->string('badge', 191)->nullable();
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
		Schema::drop('master_filing_status');
	}

}
