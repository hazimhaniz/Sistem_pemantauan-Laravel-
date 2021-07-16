<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_module', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->text('data', 65535)->nullable();
			$table->string('code', 191)->nullable();
			$table->integer('type')->default(2);
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
		Schema::drop('master_module');
	}

}
