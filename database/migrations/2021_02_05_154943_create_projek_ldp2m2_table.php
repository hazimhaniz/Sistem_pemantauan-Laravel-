<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjekLdp2m2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projek_ldp2m2', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->date('tarikh_kelulusan')->nullable();
			$table->string('dokumen', 191)->nullable();
			$table->string('nama', 191);
			$table->string('no_plan_diluluskan', 191)->nullable();
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
		Schema::drop('projek_ldp2m2');
	}

}
