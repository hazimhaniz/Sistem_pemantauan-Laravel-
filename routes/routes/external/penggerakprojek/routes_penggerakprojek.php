<?php

Route::prefix('penggerakprojek')->group(function () {

  Route::prefix('pengesahan')->group(function () {
    Route::get('eia118/{id}', 'PengerakProjek\PenggerakProjekController@pengesahaneia118')->name('penggerakprojek.pengesahan.eia118');
    Route::get('eia218/{id}', 'PengerakProjek\PenggerakProjekController@pengesahaneia218')->name('penggerakprojek.pengesahan.eia218');
    Route::get('bmpsmonthly/{id}', 'PengerakProjek\PenggerakProjekController@pengesahanbmpsmonthly')->name('penggerakprojek.pengesahan.bmps.monthly');
    Route::get('bmpsrainy/{id}', 'PengerakProjek\PenggerakProjekController@pengesahanbmpsrainy')->name('penggerakprojek.pengesahan.bmps.rainy');
    Route::get('emt/{id}', 'PengerakProjek\PenggerakProjekController@pengesahanemt')->name('penggerakprojek.pengesahan.emt');
    Route::get('senaraipelaporan', 'PengerakProjek\PenggerakProjekController@pengesahanemt')->name('penggerakprojek.senaraipelaporan');
    // Route::post('/', 'Admin\SettingsController@update')->name('admin.settings');
  });

  Route::prefix('pelaporan')->group(function () {
    Route::get('senaraipelaporan', 'PengerakProjek\PenggerakProjekController@senaraipelaporan')->name('penggerakprojek.pelaporan.senaraipelaporan');
    Route::get('pengesahanlaporan', 'PengerakProjek\PenggerakProjekController@pengesahanlaporan')->name('penggerakprojek.pengesahan.laporan');
    // Route::post('/', 'Admin\SettingsController@update')->name('admin.settings');
  });

});
