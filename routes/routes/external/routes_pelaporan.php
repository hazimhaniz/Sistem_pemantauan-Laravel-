<?php
Route::prefix('pelaporan')->group(function () {
    // Route::get('senaraipelaporan', function () {
    //     return view('external.pelaporan.senaraipelaporan');
    // })->name('external.pelaporan.senaraipelaporan');
    Route::get('pelaporaneia118', function () {
        return view('external.pelaporan.pelaporaneia118');
    })->name('external.pelaporan.pelaporaneia118');
    Route::get('pelaporaneia218', function () {
        return view('external.pelaporan.pelaporaneia218');
    })->name('external.pelaporan.pelaporaneia218');
    Route::get('pelaporaneiaemr', function () {
        return view('external.pelaporan.pelaporanemr');
    })->name('external.pelaporan.pelaporanemr');
    Route::get('laporan', function () {
        return view('external.pelaporan.laporan');
    })->name('external.pelaporan.laporan');
    Route::get('kuiri', function () {
        return view('external.pelaporan.kuiri');
    })->name('external.pelaporan.kuiri');
    Route::get('laporan_pengawasan', function () {
        return view('external.pelaporan.laporan_pengawasan');
    })->name('external.pelaporan.laporan_pengawasan');
});
