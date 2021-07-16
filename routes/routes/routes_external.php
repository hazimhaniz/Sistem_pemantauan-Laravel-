<?php

Route::prefix('external')->group(function () {

    include 'external/routes_EMR.php';
    include 'external/routes_pengawasan.php';
    include 'external/routes_audit.php';
    include 'external/routes_pelaporan.php';
    include 'external/routes_BMPs.php';
    include 'external/routes_eia.php';
    include 'external/routes_pemantauan.php';
    include 'external/routes_projek.php';
    include 'external/routes_laporan.php';
    include 'external/routes_pengguna.php';
    include 'external/penggerakprojek/routes_penggerakprojek.php';
    // Route::get('eia118', function () {
    //     return view('external.eia118');
    // })->name('external.eia118');

    // Route::get('pengurusan_pengguna', function () {
    //     return view('external.pengurusan_pengguna');
    // })->name('external.pengurusan_pengguna');

    // Route::get('pengurusan_pp', function () {
    //     return view('external.pengurusan_pp');
    // })->name('external.pengurusan_pp');


});
