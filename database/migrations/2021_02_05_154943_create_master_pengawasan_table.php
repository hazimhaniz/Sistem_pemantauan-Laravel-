<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterPengawasanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_pengawasan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('jenis_pengawasan', 191);
			$table->string('nama', 191)->nullable();
			$table->string('standard_dirujuk', 191)->nullable();
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
		Schema::drop('master_pengawasan');
	}

}
