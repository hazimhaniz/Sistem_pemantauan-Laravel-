<?php
Route::prefix('pengawasan')->group(function () {

    include 'pengawasan/routes_emr.php';
    include 'pengawasan/routes_emt.php';
    include 'pengawasan/routes_bmps.php';

});
