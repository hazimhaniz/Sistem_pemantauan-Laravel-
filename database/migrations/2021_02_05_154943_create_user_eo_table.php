<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserEoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_eo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->string('no_kompetensi', 191)->nullable();
			$table->string('date_kompetensi', 191)->nullable();
			$table->string('gambar_url', 191)->nullable();
			$table->string('sijil_url', 191)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('username', 191)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_eo');
	}

}
