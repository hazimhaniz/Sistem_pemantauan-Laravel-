<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekBulananStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_bulanan_status', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('projek_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('bulanan')->nullable();
			$table->integer('year')->nullable();
			$table->integer('status')->nullable();
			$table->text('remarks', 65535)->nullable();
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
		Schema::drop('projek_bulanan_status');
	}

}
