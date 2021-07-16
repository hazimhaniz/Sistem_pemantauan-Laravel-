<?php

Route::prefix('EMT')->group(function () {

    Route::get('tarikh', 'External\Pengawasan\EMT\EMTController@tarikh')->name('external.pengawasan.EMT.tarikh');
    Route::post('tarikh', 'External\Pengawasan\EMT\EMTController@tarikhtambah')->name('external.pengawasan.EMT.tarikh.tambah');
    Route::get('emt/{id}', 'External\Pengawasan\EMT\EMTController@maklumatborang')->name('external.pengawasan.EMT.emt');
    Route::post('simpanmaklumatborang', 'External\Pengawasan\EMT\EMTController@simpanmaklumatborang')->name('external.pengawasan.EMT.emt.simpanmaklumatborang');
    Route::get('emt/hantarmaklumat/{id}', 'External\Pengawasan\EMT\EMTController@hantarmaklumat')->name('external.pengawasan.EMT.emt.hantarmaklumat');
    Route::get('status_emt', 'External\Pengawasan\EMT\EMTController@status_emt')->name('external.pengawasan.EMT.status_emt');
    Route::get('view_emt/{id}', 'External\Pengawasan\EMT\EMTController@view_emt')->name('external.pengawasan.EMT.view_emt');
    Route::get('emt/janapdf/{id}', 'External\Pengawasan\EMT\EMTController@janapdf')->name('external.pengawasan.EMT.emt.janapdf');
    Route::get('deleteemt/{id}', 'External\Pengawasan\EMT\EMTController@deleteemt')->name('external.pengawasan.EMT.deleteemt');

    //Route::get('emt/janapdf/{id}', function(){ echo 123;exit; })->name('external.pengawasan.EMT.emt.janapdf');

});
