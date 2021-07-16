<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengawasanHasEmcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengawasan_has_emc', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pakej_has_pengawasan_id', 191);
			$table->integer('user_id');
			$table->timestamps();
			$table->integer('is_hantar')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pengawasan_has_emc');
	}

}
