<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJasEmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jas_emp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('jas_fail_id')->unsigned();
			$table->date('tarikh_kelulusan');
			$table->string('laporan', 191);
			$table->string('jururunding', 191);
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
		Schema::drop('jas_emp');
	}

}
