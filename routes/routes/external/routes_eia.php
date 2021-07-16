<?php
Route::prefix('EIA')->group(function () {
    Route::get('senarai_eia', function () {
        return view('external.EIA.senarai_eia');
    })->name('external.EIA.senarai_eia');
    Route::get('eia118218', function () {
        return view('external.EIA.eia118218');
    })->name('external.EIA.eia118218');

    include 'EIA118/routes_eia118.php';
    include 'EIA218/routes_eia218.php';
});
