<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordDocumentVerificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('record_document_verification', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('form_id')->nullable();
			$table->integer('submission_id')->nullable();
			$table->integer('filing_status_id')->nullable();
			$table->integer('witness_signiture_pegawai')->nullable();
			$table->integer('witness_signiture_public')->nullable();
			$table->integer('lld')->nullable();
			$table->integer('llde')->nullable();
			$table->integer('mcci')->nullable();
			$table->integer('kelulusan_warga_asing')->nullable();
			$table->integer('sijil')->nullable();
			$table->integer('terjemahan')->nullable();
			$table->integer('akaun_bujang_jpn')->nullable();
			$table->integer('akuan_bujang_perwakilan')->nullable();
			$table->integer('ctc')->nullable();
			$table->integer('sijil_pengajian_tinggi')->nullable();
			$table->integer('persekolahan')->nullable();
			$table->integer('total')->nullable();
			$table->integer('created_by')->nullable();
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
		Schema::drop('record_document_verification');
	}

}
