<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMonthlyETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('monthly_e', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projek_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->integer('audit_id')->unsigned();
			$table->integer('bulan')->nullable();
			$table->integer('tahun')->nullable();
			$table->string('tarikh_perlaksanaan_audit', 191)->nullable();
			$table->string('audit', 191)->nullable();
			$table->enum('ncr_op', array('yes','no'))->default('no');
			$table->string('ncr', 191)->nullable();
			$table->enum('ofi_op', array('yes','no'))->default('no');
			$table->string('ofi', 191)->nullable();
			$table->timestamps();
			$table->text('sebab', 65535);
			$table->integer('type_of_audit')->default(1);
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
		Schema::drop('monthly_e');
	}

}
