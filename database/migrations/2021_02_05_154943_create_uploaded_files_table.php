<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUploadedFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uploaded_files', function(Blueprint $table)
		{
			$table->char('id', 36)->unique();
			$table->string('entity_type', 20);
			$table->string('doc_type', 191)->nullable();
			$table->string('path', 191);
			$table->timestamps();
			$table->integer('projek_id')->nullable();
			$table->integer('user_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('uploaded_files');
	}

}
