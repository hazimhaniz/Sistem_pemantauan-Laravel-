<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterSungaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_sungai', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('negeri', 50)->nullable();
			$table->string('lembangan_eqmp', 100)->nullable();
			$table->string('lembangan_2020', 100)->nullable();
			$table->string('sungai_eqmp', 100)->nullable();
			$table->string('sungai_2020', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('master_sungai');
	}

}
