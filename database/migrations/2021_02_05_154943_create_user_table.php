<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('entity_type', 191)->nullable();
			$table->bigInteger('entity_id')->unsigned()->nullable();
			$table->string('no_fail_jas', 191)->nullable();
			$table->string('name', 191);
			$table->string('username', 191)->nullable();
			$table->string('password', 191);
			$table->string('email', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->string('alamat', 191)->nullable();
			$table->string('fax', 191)->nullable();
			$table->string('kompetensi_no', 191)->nullable();
			$table->string('kompetensi_date', 191)->nullable();
			$table->string('kompetensi_picture', 191)->nullable();
			$table->integer('user_type_id')->unsigned()->default(3);
			$table->integer('user_status_id')->unsigned()->default(9);
			$table->integer('user_pp_id')->unsigned()->nullable();
			$table->string('picture_url', 191)->nullable();
			$table->string('sijil_url', 191)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->string('sebab_tidak_aktif', 50)->nullable();
			$table->string('komen', 191)->nullable();
			$table->dateTime('last_login_date')->nullable();
			$table->string('last_login_ip', 191)->nullable();
			$table->integer('is_login')->nullable()->default(0);
			$table->integer('email_sent')->nullable()->default(0);
			$table->index(['entity_type','entity_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
