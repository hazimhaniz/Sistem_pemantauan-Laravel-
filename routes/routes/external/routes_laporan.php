<?php
Route::prefix('laporan')->group(function () {
    Route::get('laporan', function () {
        return view('external.laporan.laporan');
    })->name('external.laporan.laporan');
    Route::get('audit', function () {
        return view('external.laporan.audit');
    })->name('external.laporan.audit');
});
