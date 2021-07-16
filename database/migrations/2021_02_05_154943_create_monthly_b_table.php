<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyBTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_b', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('pakej_id');
			$table->integer('status_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('nama_projek', 191)->nullable();
			$table->string('nama_pemaju', 191)->nullable();
			$table->string('no_fail_jas', 191)->nullable();
			$table->string('tarikh_kelulusan_eia', 191)->nullable();
			$table->string('jururunding_eia', 191)->nullable();
			$table->string('tarikh_kelulusan_emp', 191)->nullable();
			$table->string('jururunding_post_eia', 191)->nullable();
			$table->string('syarat', 191)->nullable();
			$table->string('version', 191)->nullable();
			$table->string('old_data', 1000)->nullable();
			$table->integer('is_ready')->unsigned()->nullable();
			$table->timestamps();
			$table->integer('flag')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('monthly_b');
	}

}
