<?php
Route::prefix('EMR')->group(function () {
    Route::get('water', function () {
        return view('external.EMR.water');
    })->name('external.EMR.water');
    Route::get('buangan', function () {
        return view('external.EMR.buangan');
    })->name('external.EMR.buangan');
    Route::get('kolam', function () {
        return view('external.EMR.kolam');
    })->name('external.EMR.kolam');
    Route::get('udara', function () {
        return view('external.EMR.udara');
    })->name('external.EMR.udara');
    Route::get('bising', function () {
        return view('external.EMR.bising');
    })->name('external.EMR.bising');
    Route::get('tarikh', function () {
        return view('external.EMR.tarikh');
    })->name('external.EMR.tarikh');
});
