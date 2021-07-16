<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKompetenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kompeten', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_eo_id')->unsigned();
			$table->string('no_sijil', 191)->nullable();
			$table->string('tarikh_sijil', 191)->nullable();
			$table->string('jenis_kompetensi', 191)->nullable();
			$table->string('nama_eo', 191)->nullable();
			$table->string('ic_eo', 191)->nullable();
			$table->string('jawatan_eo', 191)->nullable();
			$table->string('phone_eo', 191)->nullable();
			$table->string('email_eo', 191)->nullable();
			$table->text('alamat', 65535)->nullable();
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
		Schema::drop('kompeten');
	}

}
