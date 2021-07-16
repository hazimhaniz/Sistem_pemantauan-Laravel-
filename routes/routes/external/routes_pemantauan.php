<?php
Route::prefix('pemantauan')->group(function () {
    Route::get('daftar_pemantauan', function () {
        return view('external.pemantauan.daftar_pemantauan');
    })->name('external.pemantauan.daftar_pemantauan');
    Route::get('tarikh_pantau', function () {
        return view('external.pemantauan.tarikh_pantau');
    })->name('external.pemantauan.tarikh_pantau');
    Route::get('senarai_pemantauan', function () {
        return view('external.pemantauan.senarai_pemantauan');
    })->name('external.pemantauan.senarai_pemantauan');
    Route::get('pemantauan_alam_sekitar', function () {
        return view('external.pemantauan.pemantauan_alam_sekitar');
    })->name('external.pemantauan.pemantauan_alam_sekitar');
    Route::get('pemantauan_alam_sekitar_backup', function () {
        return view('external.pemantauan.pemantauan_alam_sekitar_backup');
    })->name('external.pemantauan.pemantauan_alam_sekitar_backup');
    Route::get('pemantauan_bpm', function () {
        return view('external.pemantauan.pemantauan_bpm');
    })->name('external.pemantauan.pemantauan_bpm');
    Route::get('pemantauan_audit', function () {
        return view('external.pemantauan.pemantauan_audit');
    })->name('external.pemantauan.pemantauan_audit');
    Route::get('pemantauan_emt', function () {
        return view('external.pemantauan.pemantauan_emt');
    })->name('external.pemantauan.pemantauan_emt');
    Route::get('kuiri', function () {
        return view('external.pemantauan.kuiri');
    })->name('external.pemantauan.kuiri');
    Route::get('sungai', function () {
        return view('external.pemantauan.sungai');
    })->name('external.pemantauan.sungai');
    Route::get('air2', function () {
        return view('external.pemantauan.air2');
    })->name('external.pemantauan.air2');
    Route::get('laut', function () {
        return view('external.pemantauan.laut');
    })->name('external.pemantauan.laut');
    Route::get('kolam', function () {
        return view('external.pemantauan.kolam');
    })->name('external.pemantauan.kolam');
    Route::get('tasik', function () {
        return view('external.pemantauan.tasik');
    })->name('external.pemantauan.tasik');
    Route::get('tanah', function () {
        return view('external.pemantauan.tanah');
    })->name('external.pemantauan.tanah');
    Route::get('udara', function () {
        return view('external.pemantauan.udara');
    })->name('external.pemantauan.udara');
    Route::get('daftar_udara', function () {
        return view('external.pemantauan.daftar_udara');
    })->name('external.pemantauan.daftar_udara');
    Route::get('118', function () {
        return view('external.EIA.118');
    })->name('external.EIA.118');
});
