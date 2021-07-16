<?php
Route::prefix('BMPs')->group(function () {
    Route::get('pemeriksaan_bpm', function () {
        return view('external.BMPs.pemeriksaan_bpm');
    })->name('external.BMPs.pemeriksaan_bpm');
    Route::get('pemeriksaan_bpm2', function () {
        return view('external.BMPs.pemeriksaan_bpm2');
    })->name('external.BMPs.pemeriksaan_bpm2');
    Route::get('analisa', function () {
        return view('external.BMPs.analisa');
    })->name('external.BMPs.analisa');
});
