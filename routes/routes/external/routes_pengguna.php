<?php
Route::prefix('pengguna')->group(function () {

   Route::get('/','Pengguna@PenggunaEOController@dummy_index')->name('pengguna');
   Route::get('deactivate/{jenis}/{id}', 'External\Pengguna\PenggunaEOController@deactivate_pengguna')->name('external.pengguna.pengurusan.deactivate');
   Route::post('deactivate/post', 'External\Pengguna\PenggunaEOController@deactivate_penggunaPost')->name('external.pengguna.pengurusan.deactivatepost');

   Route::prefix('pengurusan_eo')->group(function () {
     
    Route::get('/', 'External\Pengguna\PenggunaEOController@pengurusan_eo')->name('external.pengguna.pengurusan_eo');
    Route::post('/', 'External\Pengguna\PenggunaEOController@insert_pengurusan_eo')->name('external.pengguna.pengurusan_eo');
    // Route::get('{id}', 'External\Pengguna\PenggunaController@edit_pengurusan_eo')->name('external.pengguna.pengurusan_eo');
    Route::get('komen/{id}', 'External\Pengguna\PenggunaEOController@komen')->name('external.pengguna.pengurusan_eo.komen');
    Route::get('delete/{id}', 'External\Pengguna\PenggunaEOController@delete_pengurusan_eo')->name('external.pengguna.pengurusan_eo.delete');
    Route::get('deactivate/{id}', 'External\Pengguna\PenggunaEOController@deactivate_pengurusan_eo')->name('external.pengguna.pengurusan_eo.deactivate');
    Route::get('activate/{id}', 'External\Pengguna\PenggunaEOController@activate_pengurusan_eo')->name('external.pengguna.pengurusan_eo.activate');
    Route::get('view_user/{id}', 'External\Pengguna\PenggunaEOController@view_user')->name('external.pengguna.pengurusan_eo.view_user');
    Route::get('hantarpengguna/{id}/{type}', 'External\Pengguna\PenggunaEOController@hantarpengguna')->name('external.pengguna.pengurusan_eo.hantarpengguna');
  });

  Route::prefix('pengurusan_emc')->group(function () {
   Route::get('/', 'External\Pengguna\PenggunaEMCController@pengurusan_emc')->name('external.pengguna.pengurusan_emc');
   Route::post('/', 'External\Pengguna\PenggunaEMCController@insert_pengurusan_emc')->name('external.pengguna.pengurusan_emc');
   Route::post('submitemc', 'External\Pengguna\PenggunaEMCController@submit_pengurusan_emc')->name('external.pengguna.submitemc');
   Route::get('tambahemc', 'External\Pengguna\PenggunaEMCController@tambah_emc')->name('external.pengguna.tambah_emc');
   Route::post('updateemc', 'External\Pengguna\PenggunaEMCController@update_emc')->name('external.pengguna.update_emc');
   Route::get('deleteemc/{id}', 'External\Pengguna\PenggunaEMCController@delete_pengurusan_emc')->name('external.pengguna.pengurusan_emc.deleteemc');
   Route::get('senaraimakmal/{id}', 'External\Pengguna\PenggunaEMCController@senaraimakmal')->name('senaraimakmal');
   Route::get('senaraimakmaldetail/{id}', 'External\Pengguna\PenggunaEMCController@senaraimakmaldetail')->name('senaraimakmaldetail');
   Route::post('makmalAkreditasisimpan', 'External\Pengguna\PenggunaEMCController@makmalAkreditasisimpan')->name('makmalAkreditasi.simpan');
   Route::get('makmalAkreditasibuang/{id}', 'External\Pengguna\PenggunaEMCController@makmalAkreditasibuang')->name('makmalAkreditasi.buang');
   Route::get('deactivate/{id}', 'External\Pengguna\PenggunaEMCController@deactivate_pengurusan_emc')->name('external.pengguna.pengurusan_emc.deactivate');
   Route::get('activate/{id}', 'External\Pengguna\PenggunaEMCController@activate_pengurusan_emc')->name('external.pengguna.pengurusan_emc.activate');
   Route::get('view_user/{id}', 'External\Pengguna\PenggunaEMCController@view_user')->name('external.pengguna.pengurusan_emc.view_user');
   Route::get('checkemc/{id}', 'External\Pengguna\PenggunaEMCController@checkemc')->name('external.pengguna.pengurusan_emc.checkemc');
   Route::get('hantarpengguna/{id}/{type}', 'External\Pengguna\PenggunaEMCController@hantarpengguna')->name('external.pengguna.pengurusan_emc.hantarpengguna');

 });
    Route::get('pengurusan_pp', function () {
        return view('external.pengguna.pengurusan_pp');
    })->name('external.pengguna.pengurusan_pp');

    Route::prefix('kompetensi')->group(function() {
    	Route::get('/', 'External\Pengguna\KompetensiController@index')->name('kompetensi.index');
    });
});
