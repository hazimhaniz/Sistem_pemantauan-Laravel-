<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengurusanKuiriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengurusan_kuiri', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('year');
			$table->integer('month');
			$table->integer('pakej_id')->nullable();
			$table->string('form_class', 191)->nullable();
			$table->integer('form_id')->nullable();
			$table->text('kuiri', 65535)->nullable();
			$table->text('balas', 65535)->nullable();
			$table->integer('kuiri_user_id')->nullable();
			$table->dateTime('tarikh_kuiri')->nullable();
			$table->integer('balas_user_id')->nullable();
			$table->dateTime('tarikh_balas')->nullable();
			$table->integer('status')->nullable();
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
		Schema::drop('pengurusan_kuiri');
	}

}
