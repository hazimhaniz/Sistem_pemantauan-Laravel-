<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMasterLetterTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('master_letter_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191);
			$table->integer('module_id')->unsigned()->index('master_letter_type_module_id_foreign');
			$table->string('template_name', 191)->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('master_letter_type');
	}

}
