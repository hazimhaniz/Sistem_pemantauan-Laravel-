<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyBSyaratTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_b_syarat', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('monthly_b_id')->unsigned();
			$table->text('syarat', 65535)->nullable();
			$table->text('ulasan', 65535)->nullable();
			$table->string('gambar', 191)->nullable();
			$table->string('version', 191)->nullable();
			$table->string('old_data', 1000)->nullable();
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
		Schema::drop('monthly_b_syarat');
	}

}
