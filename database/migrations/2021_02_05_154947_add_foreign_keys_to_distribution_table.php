<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDistributionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('distribution', function(Blueprint $table)
		{
			$table->foreign('assigned_to_user_id')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('distribution', function(Blueprint $table)
		{
			$table->dropForeign('distribution_assigned_to_user_id_foreign');
		});
	}

}
