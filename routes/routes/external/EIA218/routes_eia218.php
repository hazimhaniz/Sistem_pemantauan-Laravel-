<?php
Route::prefix('EIA218')->group(function () {

  Route::get('tarikh218', 'External\EIA\EIA218\EIA218Controller@tarikheia218')->name('external.EIA.EIA218.tarikh218');
  Route::post('tarikh218', 'External\EIA\EIA218\EIA218Controller@tarikheia218tambah')->name('external.EIA.EIA218.tarikh218.tambah');
  Route::get('218/{id}', 'External\EIA\EIA218\EIA218Controller@maklumatborang')->name('external.EIA.EIA218.218');
  Route::get('hantar/{id}', 'External\EIA\EIA218\EIA218Controller@hantar')->name('external.EIA.EIA218.hantar');
  Route::post('simpanmaklumatborang', 'External\EIA\EIA218\EIA218Controller@simpanmaklumatborang')->name('external.EIA.EIA218.218.simpanmaklumatborang');
  Route::post('simpanmaklumatborangsyarat', 'External\EIA\EIA218\EIA218Controller@simpanmaklumatborangsyarat')->name('external.EIA.EIA218.218.simpanmaklumatborangsyarat');
  Route::post('duplicate', 'External\EIA\EIA218\EIA218Controller@duplicate')->name('external.EIA.EIA218.218.duplicate');
  Route::post('add', 'External\EIA\EIA218\EIA218Controller@add')->name('external.EIA.EIA218.218.add');
  Route::get('janapdf/218/{id}', 'External\EIA\EIA218\EIA218Controller@janapdf')->name('external.EIA.EIA218.218.janapdf');
  Route::get('janapdfview/218/{id}', 'External\EIA\EIA218\EIA218Controller@janapdfview218')->name('external.EIA.EIA218.218.janapdfview');
  Route::post('simpanmaklumatsyarat', 'External\EIA\EIA218\EIA218Controller@simpanmaklumatsyarat')->name('external.EIA.EIA218.218.simpanmaklumatsyarat');
  Route::post('tambahsyarat', 'External\EIA\EIA218\EIA218Controller@tambahsyarat')->name('external.EIA.EIA218.218.tambahsyarat');
  Route::get('buangmaklumatsyarat/{id}', 'External\EIA\EIA218\EIA218Controller@buangmaklumatsyarat')->name('external.eia.eia218.buangmaklumatsyarat');
  Route::get('kemaskinimaklumatsyarat/{id}', 'External\EIA\EIA218\EIA218Controller@kemaskinimaklumatsyarat')->name('external.eia.eia218.kemaskinimaklumatsyarat');
  Route::get('viewmaklumatsyarat/{id}', 'External\EIA\EIA218\EIA218Controller@viewmaklumatsyarat')->name('external.eia.eia218.viewmaklumatsyarat');
  Route::post('updatemaklumatsyarat', 'External\EIA\EIA218\EIA218Controller@updatemaklumatsyarat')->name('external.EIA.EIA218.218.updatemaklumatsyarat');
  Route::get('218/hantarmaklumat/{id}', 'External\EIA\EIA218\EIA218Controller@hantarmaklumat')->name('external.EIA.EIA218.218.hantarmaklumat');
  Route::get('cetakanlaporan', 'External\EIA\EIA218\EIA218Controller@cetakanlaporan')->name('external.EIA.EIA218.cetakan');
  Route::get('senarai_eia218', 'External\EIA\EIA218\EIA218Controller@senarai_eia218')->name('external.EIA.EIA218.senarai_eia218');
  Route::get('view_218/{id}', 'External\EIA\EIA218\EIA218Controller@view_218')->name('external.EIA.EIA218.view_218');
  Route::get('view/{id}', 'External\EIA\EIA218\EIA218Controller@view')->name('external.EIA.EIA218.view');
  Route::get('eia218_pakej/{bulan}/{tahun}/{projekid}', 'External\EIA\EIA218\EIA218Controller@eia218_pakej')->name('external.EIA.EIA218.eia218_pakej');
  Route::post('kuiri/simpan', 'External\EIA\EIA218\EIA218Controller@simpan')->name('eia218.kuiri.simpan');
  Route::get('view_218/kuiri/{type}/{id}/{projek_id}', 'External\EIA\EIA218\EIA218Controller@indexkuiri')->name('eia218.kuiri.index');
  Route::get('view/kuiri/{type}/{id}/{projek_id}', 'External\EIA\EIA218\EIA218Controller@indexkuiri')->name('eia218.kuiri.index');
  Route::get('hantarborang', 'External\EIA\EIA218\EIA218Controller@hantarborang')->name('external.EIA.EIA218.218.hantarborang');
  Route::get('remove218/{id}', 'External\EIA\EIA218\EIA218Controller@remove218')->name('external.EIA.EIA218.remove218');

  Route::get('/{id}', 'External\EIA\EIA218\EIA218Controller@attachment_index')->name('external.EIA.EIA218.jadual');
  Route::post('/{id}', 'External\EIA\EIA218\EIA218Controller@attachment_insert')->name('external.EIA.EIA218.jadual');
  // Route::delete('/', 'External\EIA\EIA218\EIA218Controller@attachment_delete1')->name('external.EIA.EIA218.jadual');
  Route::get('/delete/{id}', 'External\EIA\EIA218\EIA218Controller@attachment_delete')->name('external.EIA.EIA218.delete');
  Route::get('/simpanBilSyarat/{projekId}/{jumlah}', 'External\EIA\EIA218\EIA218Controller@simpanTetapkanSyarat')->name('simpanBilSyarat');
});
