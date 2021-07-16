<?php
Route::prefix('EIA118')->group(function () {

    Route::get('tarikh118', 'External\EIA\EIA118\EIA118Controller@tarikheia118')->name('external.EIA.EIA118.tarikh118');
    Route::post('tarikh118', 'External\EIA\EIA118\EIA118Controller@tarikheia118tambah')->name('external.EIA.EIA118.tarikh118.tambah');
    Route::get('118/{id}', 'External\EIA\EIA118\EIA118Controller@maklumatborang')->name('external.EIA.EIA118.118');
    Route::get('view/{id}', 'External\EIA\EIA118\EIA118Controller@view')->name('external.EIA.EIA118.view');
    Route::get('janapdf/118/{id}', 'External\EIA\EIA118\EIA118Controller@janapdf')->name('external.EIA.EIA118.118.janapdf');
    Route::get('janapdfview/118/{id}', 'External\EIA\EIA118\EIA118Controller@janapdfview')->name('external.EIA.EIA118.118.janapdfview');
    Route::post('simpanmaklumatborang', 'External\EIA\EIA118\EIA118Controller@simpanmaklumatborang')->name('external.EIA.EIA118.118.simpanmaklumatborang');
    Route::get('118/hantarmaklumat/{id}', 'External\EIA\EIA118\EIA118Controller@hantarmaklumat')->name('external.EIA.EIA118.118.hantarmaklumat');
    Route::get('senarai_eia118', 'External\EIA\EIA118\EIA118Controller@senarai_eia118')->name('external.EIA.EIA118.senarai_eia118');
    Route::get('view_118/{id}', 'External\EIA\EIA118\EIA118Controller@view_118')->name('external.EIA.EIA118.view_118');
    Route::get('cetakanlaporan', 'External\EIA\EIA118\EIA118Controller@cetakanlaporan')->name('external.EIA.EIA118.cetakan');
    Route::get('BorangESCP/{id}', 'External\EIA\EIA118\EIA118Controller@BorangESCP')->name('external.EIA.EIA118.BorangESCP');
    Route::post('hantarBorangESCP', 'External\EIA\EIA118\EIA118Controller@hantarBorangESCP')->name('external.EIA.EIA118.hantarBorangESCP');
    Route::get('buangmaklumatESCPs/{id}', 'External\EIA\EIA118\EIA118Controller@buangmaklumatESCPs')->name('external.EIA.EIA118.118.buangmaklumatESCPs');
    Route::get('deleteeia/{id}', 'External\EIA\EIA118\EIA118Controller@deleteeia')->name('external.EIA.EIA118.deleteeia');

    Route::prefix('attachment')->group(function () {
			Route::get('/{id}', 'External\EIA\EIA118\EIA118Controller@attachment_index')->name('external.EIA.EIA118.jadual');
			Route::post('/{id}', 'External\EIA\EIA118\EIA118Controller@attachment_insert')->name('external.EIA.EIA118.jadual');
			Route::get('jadual/delete/{id}', 'External\EIA\EIA118\EIA118Controller@attachment_delete1')->name('external.EIA.EIA118.jadual');
            Route::delete('/', 'External\EIA\EIA118\EIA118Controller@attachment_delete1')->name('external.EIA.EIA118.jadual');
      Route::get('delete/{id}', 'External\EIA\EIA118\EIA118Controller@gambarfoto_delete')->name('external.EIA.EIA118.delete');

      Route::get('gambarfoto/{id}', 'External\EIA\EIA118\EIA118Controller@gambarfoto_index')->name('external.EIA.EIA118.gambarfoto');
	   Route::post('gambarfoto/{id}', 'External\EIA\EIA118\EIA118Controller@gambarfoto_insert')->name('external.EIA.EIA118.gambarfoto');
		Route::delete('gambarfoto/', 'External\EIA\EIA118\EIA118Controller@gambarfoto_delete1')->name('external.EIA.EIA118.gambarfoto');
      Route::get('gambarfoto/delete/{id}', 'External\EIA\EIA118\EIA118Controller@gambarfoto_delete')->name('external.EIA.EIA118.delete');
		});
});
