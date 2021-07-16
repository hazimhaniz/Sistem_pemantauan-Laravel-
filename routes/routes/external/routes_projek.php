<?php
Route::prefix('projek')->group(function () {

    Route::post('registerexist', 'ProjekController@registerexist');
    Route::get('checkExist2/{id}', 'ProjekController@checkExist2');
    Route::get('jas/{id}', 'ProjekController@jas');

    Route::post('/login-process', 'AuthController@loginRegister')->name('log-pro');
    Route::post('/check-projek-external', 'AuthController@CheckProjekExternal')->name('check-projek-external');
    Route::get('/login-projek-external', 'AuthController@LoginProjekExternal')->name('login-projek-external');
    Route::get('/login-other-projek-external', 'AuthController@LoginOtherProjekExternal')->name('login-other-projek-external');
    Route::get('/listProjek/{username}/{password}', 'AuthController@ModalProjek')->name('listProjek');


    Route::get('getFasa/{id}', 'ProjekController@getFasa')->name('getFasa');
    Route::get('kemaskinifasa/{id}', 'ProjekController@kemaskinifasa')->name('external.projek.kemaskinifasa');
    Route::post('updatefasa', 'ProjekController@updatefasa')->name('external.projek.updatefasa');
    Route::get('buangFasa/{id}', 'ProjekController@buangFasa')->name('buangFasa');

    Route::post('LDP2M2', 'ProjekController@LDP2M2')->name('LDP2M2');
    Route::get('getLDP2M2/{id}', 'ProjekController@getLDP2M2')->name('getLDP2M2');
    Route::get('buangLDP2M2/{id}', 'ProjekController@buangLDP2M2')->name('buangpakej');

    Route::post('EMP', 'ProjekController@EMP')->name('EMP');
    Route::get('buangemp/{id}', 'ProjekController@buangemp')->name('buangpakej');
    Route::get('getEMP/{id}', 'ProjekController@getEMP')->name('getEMP');

    Route::get('pakej_pengawasan/{id}', 'ProjekController@pakej_pengawasan')->name('pakej.pengawasan');
    Route::get('checkupeoemc/{id}', 'ProjekController@checkupeoemc')->name('pakej.checkupeoemc');
    Route::post('pakej', 'ProjekController@pakej')->name('pakej');
    Route::post('pakejupdate', 'ProjekController@pakejupdate')->name('pakejupdate');
    Route::post('pakejeoemc', 'ProjekController@pakejeoemc')->name('pakejeoemc');
    Route::post('jenis_pakej', 'ProjekController@jenis_pakej')->name('jenis_pakej');
    Route::post('jenis_pakej_eo', 'ProjekController@jenis_pakej_eo')->name('jenis_pakej_eo');
    Route::post('jenis_pakej_emc', 'ProjekController@jenis_pakej_emc')->name('jenis_pakej_emc');

    Route::get('getTidakPakej/{id}', 'ProjekController@getTidakPakej')->name('getTidakPakej');

    $pengawasan = \App\MasterModel\MasterPengawasan::all();
    foreach($pengawasan as $pengawasans){
      Route::get('eotable', 'ProjekController@eotable')->name('eotable');
      Route::get('emctable'.$pengawasans->id, 'ProjekController@emctable'.$pengawasans->id)->name('emctable'.$pengawasans->id);
    }

    Route::get('usereo/delete/{id}', 'ProjekController@usereodelete')->name('usereodelete');
    Route::get('useremc/delete/{id}', 'ProjekController@useremcdelete')->name('useremcdelete');

    Route::get('getTarikhAudit/{id}', 'ProjekController@getTarikhAudit')->name('getTarikhAudit');

    Route::get('getModalAudit/{id}', 'ProjekController@getModalAudit')->name('getModalAudit');
    Route::get('kemaskiniaudit/{id}', 'ProjekController@kemaskiniaudit')->name('external.projek.kemaskiniaudit');
    Route::get('kemaskiniaudit1/{id}', 'ProjekController@kemaskiniaudit1')->name('external.projek.kemaskiniaudit1');
    Route::post('updatemaklumataudit1', 'ProjekController@updatemaklumataudit1')->name('external.projek.updatemaklumataudit1');
    Route::post('updatemaklumataudit', 'ProjekController@updatemaklumataudit')->name('external.projek.updatemaklumataudit');
    Route::get('buangpakej/{id}', 'ProjekController@buangpakej')->name('buangpakej');

    Route::post('addsungai', 'ProjekController@jenispengawasan')->name('addsungai');
    Route::post('addmarin', 'ProjekController@jenispengawasan')->name('addmarin');
    Route::post('addtasik', 'ProjekController@jenispengawasan')->name('addtasik');
    Route::post('addtanah', 'ProjekController@jenispengawasan')->name('addtanah');
    Route::post('addair', 'ProjekController@jenispengawasan')->name('addair');
    Route::post('addUdara', 'ProjekController@jenispengawasan')->name('addUdara');
    Route::post('addBunyi', 'ProjekController@jenispengawasan')->name('addBunyi');
    Route::post('addGetaran', 'ProjekController@jenispengawasan')->name('addGetaran');
    Route::post('addDron', 'ProjekController@jenispengawasan')->name('addDron');

    Route::get('getSungai/{id}/{pakejid}', 'ProjekController@getSungai')->name('getSungai');
    Route::get('getMarin/{id}/{pakejid}', 'ProjekController@getMarin')->name('getMarin');
    Route::get('getTasik/{id}/{pakejid}', 'ProjekController@getTasik')->name('getTasik');
    Route::get('getTanah/{id}/{pakejid}', 'ProjekController@getTanah')->name('getTanah');
    Route::get('getAir/{id}/{pakejid}', 'ProjekController@getAir')->name('getAir');
    Route::get('getUdara/{id}/{pakejid}', 'ProjekController@getUdara')->name('getUdara');
    Route::get('getBunyi/{id}/{pakejid}', 'ProjekController@getBunyi')->name('getBunyi');
    Route::get('getGetaran/{id}/{pakejid}', 'ProjekController@getGetaran')->name('getGetaran');
    Route::get('getDron/{id}/{pakejid}', 'ProjekController@getDron')->name('getDron');

    Route::prefix('kemaskinistesen')->group(function () {
    Route::get('{id}', 'ProjekController@kemaskinistesen')->name('external.projek.kemaskinistesen');
    });

    Route::prefix('kemaskinistesen1')->group(function () {
    Route::get('{pakejid}/{projekid}', 'ProjekController@kemaskinistesen1')->name('external.projek.kemaskinistesen1');
    });
    Route::prefix('kemaskinistesen2')->group(function () {
    Route::get('{pakejid}/{projekid}', 'ProjekController@kemaskinistesen2')->name('external.projek.kemaskinistesen2');
    });
    Route::post('updatestesen', 'ProjekController@updatestesen')->name('external.projek.updatestesen');
    Route::post('updatestesen1', 'ProjekController@updatestesen1')->name('external.projek.updatestesen1');
    Route::delete('buangStesen/{id}', 'ProjekController@buangStesen')->name('buangStesen');
    Route::delete('buangStesen1/{id}', 'ProjekController@buangStesen1')->name('buangStesen1');

    Route::get('addparametersg/{pakejid}/{projekid}', 'ProjekController@addparametersg')->name('external.projek.addparametersg');
    Route::get('addparametersg1/{pakejid}/{projekid}', 'ProjekController@addparametersg1')->name('external.projek.addparametersg1');
    Route::get('addparametersg2/{pakejid}/{projekid}', 'ProjekController@addparametersg2')->name('external.projek.addparametersg2');

    Route::get('getParameterSungai/{id}', 'ProjekController@getParameterSungai')->name('getParameterSungai');
    Route::post('updateparametersg', 'ProjekController@updateparametersg')->name('external.projek.updateparametersg');
    Route::post('updateparametersg1', 'ProjekController@updateparametersg1')->name('external.projek.updateparametersg1');
    Route::post('updateparametersg2', 'ProjekController@updateparametersg2')->name('external.projek.updateparametersg2');
    Route::delete('buangParameter/{id}', 'ProjekController@buangParameter')->name('buangParameter');
    Route::post('standardlisted', 'ProjekController@standardlisted')->name('standardlisted');
    Route::post('showbaseline', 'ProjekController@showbaseline')->name('showbaseline');
    Route::get('schedulelisted/{id}', 'ProjekController@schedulelisted');
    Route::post('standardlisted2', 'ProjekController@standardlisted2')->name('standardlisted2');

    Route::get('daftar_projek', 'ProjekController@projek')->name('external.projek.daftar_projek');
    Route::get('editpakej/{id}', 'ProjekController@editpakej')->name('external.projek.editpakej');
    Route::get('daftar_projek1/{id}', 'ProjekController@projek')->name('external.projek.daftar_projek1');

    Route::post('addProjek', 'ProjekController@addProjek')->name('addProjek');
    Route::post('addProjekTab5', 'ProjekController@addProjekTab5')->name('addProjekTab5');
    Route::post('addProjektab1', 'ProjekController@addProjektab1')->name('addProjektab1');
    Route::post('addProjektab2', 'ProjekController@addProjektab2')->name('addProjektab2');

    Route::post('submitProjek/{id}', 'ProjekController@submitProjek')->name('submitProjek');
    Route::post('submitProjekIO', 'ProjekController@submitProjekIO')->name('submitProjekIO');

    Route::get('map/{id}', 'ProjekController@map')->name('external.projek.map');



    Route::get('pendaftaran_projek', function () {
        return view('external.projek.pendaftaran_projek');
    })->name('external.projek.pendaftaran_projek');

    Route::prefix('daftar_projek')->group(function () {
        Route::get('/', 'ProjekController@daftar_projek')->name('external.projek.daftar_projek');
        Route::post('/', 'ProjekController@daftar_projek_process')->name('external.projek.daftar_projek');
    });

    Route::get('senarai','ProjekController@senarai_projek')->name('external.projek.senarai');
    Route::get('catatan','ProjekController@catatan')->name('external.projek.catatan');
    Route::get('kuiriview','ProjekController@kuiriview')->name('external.projek.kuiriview');
    // Route::get('sungai', function () {
    //     return view('external.projek.sungai');
    // })->name('external.projek.sungai');
    // Route::get('laut', function () {
    //     return view('external.projek.laut');
    // })->name('external.projek.laut');
    // Route::get('tasik', function () {
    //     return view('external.projek.tasik');
    // })->name('external.projek.tasik');
    // Route::get('tanah', function () {
    //     return view('external.projek.tanah');
    // })->name('external.projek.tanah');
    // Route::get('udara', function () {
    //     return view('external.projek.udara');
    // })->name('external.projek.udara');
    // Route::get('bunyi', function () {
    //     return view('external.projek.bunyi');
    // })->name('external.projek.bunyi');
    // Route::get('vibration', function () {
    //     return view('external.projek.vibration');
    // })->name('external.projek.vibration');
    Route::get('kuiri', function () {
        return view('external.projek.kuiri');
    })->name('external.projek.kuiri');
});
