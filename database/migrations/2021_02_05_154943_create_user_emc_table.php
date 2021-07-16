<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserEmcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_emc', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('syarikat', 191)->nullable();
			$table->string('alamatsyarikat', 200)->nullable();
			$table->string('alamatsyarikat1', 200)->nullable();
			$table->string('alamatsyarikat2', 200)->nullable();
			$table->string('nama_pegawai', 191)->nullable();
			$table->string('nama_makmal', 191)->nullable();
			$table->string('no_tel_makmal', 191)->nullable();
			$table->string('alamat_makmal', 191)->nullable();
			$table->string('alamat_makmal1', 191)->nullable();
			$table->string('alamat_makmal2', 191)->nullable();
			$table->integer('negeri_id')->nullable();
			$table->integer('daerah_id')->nullable();
			$table->string('poskod', 191)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->text('remarks', 65535)->nullable();
			$table->string('username', 191)->nullable();
			$table->string('kod_makmal')->nullable();
			$table->string('makmal_daerah_id', 12)->nullable();
			$table->string('makmal_negeri_id', 12)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_emc');
	}

}
