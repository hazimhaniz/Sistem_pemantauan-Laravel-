<?php
Route::prefix('stesen')->group(function () {
  Route::get('stesen_pengawasan', 'External\Pengawasan\EMR\EMRController@stesenpengawasan')->name('external.pengawasan.stesen');
  Route::get('stesen_pengawasan_edit/{id}', 'External\Pengawasan\EMR\EMRController@stesenpengawasanedit')->name('external.pengawasan.stesen.edit');
  Route::get('stesen_pengawasan_edit/buangStesen/{id}', 'External\Pengawasan\EMR\EMRController@stesenpengawasandelete')->name('external.pengawasan.stesen.delete');
  Route::delete('stesen_pengawasan_edit/buangStesen1/{id}', 'External\Pengawasan\EMR\EMRController@stesenpengawasandelete1')->name('external.pengawasan.stesen.delete1');
  Route::post('submitstesen/{id}/{pakej_id}', 'External\Pengawasan\EMR\EMRController@submitstesen')->name('submitstesen');
  Route::post('checkstesen/{id}/{pakej_id}', 'External\Pengawasan\EMR\EMRController@checkstesen')->name('checkstesen');
  Route::post('submitstesenpp/{id}/{pakej_id}', 'External\Pengawasan\EMR\EMRController@submitstesenpp')->name('submitstesenpp');
  Route::post('submitstesenpenyiasat/{id}/{pakej_id}', 'External\Pengawasan\EMR\EMRController@submitstesenpenyiasat')->name('submitstesenpenyiasat');
  Route::get('tambahstesen/{projek_id}/{pakej_id}', 'External\Pengawasan\EMR\EMRController@tambahstesen')->name('tambahstesen');
  Route::post('submittambahstesen', 'External\Pengawasan\EMR\EMRController@submittambahstesen')->name('submittambahstesen');
  Route::get('getTambahStesen/{id}/{pakejid}', 'External\Pengawasan\EMR\EMRController@getTambahStesen')->name('getTambahStesen');
  Route::post('submitstesenstatus/{id}/{pakej_id}', 'External\Pengawasan\EMR\EMRController@submitstesenstatus')->name('submitstesenstatus');
  Route::post('tidaklengkapProjek', 'External\Pengawasan\EMR\EMRController@tidaklengkapProjek')->name('stesen.tidaklengkapProjek');
  Route::get('catatan','External\Pengawasan\EMR\EMRController@catatan')->name('stesen.catatan');
});

Route::prefix('curtain')->group(function () {
  Route::get('silit_curtain', 'External\Pengawasan\EMR\EMRController@silit_curtain')->name('external.pengawasan.silit_curtain');
  Route::get('tarikh_Silit_Curtain', 'External\Pengawasan\EMR\EMRController@tarikh_Silit_Curtain')->name('external.pengawasan.tarikh_Silit_Curtain');
  Route::post('tambahbulan_Silit_Curtain', 'External\Pengawasan\EMR\EMRController@tambahbulan_Silit_Curtain')->name('external.pengawasan.tambahbulan_Silit_Curtain');
  Route::get('curtain_pakej/{bulan}/{tahun}/{projekid}', 'External\Pengawasan\EMR\EMRController@curtain_pakej')->name('external.pengawasan.curtain_pakej');
  Route::get('daftar_pengawasan_silit_curtain/{id?}/{bulan}/{tahun}', 'External\Pengawasan\EMR\EMRController@daftar_pengawasan_silit_curtain')->name('external.pengawasan.daftar_pengawasan_silit_curtain');
  Route::get('daftar_pengawasan_silit_curtainview/{id?}/{bulan}/{tahun}', 'External\Pengawasan\EMR\EMRController@daftar_pengawasan_silit_curtainview')->name('external.pengawasan.daftar_pengawasan_silit_curtainview');
  Route::get('daftar_pengawasan_silit_curtainmarinc/{id?}/{bulan}/{tahun}', 'External\Pengawasan\EMR\EMRController@daftar_pengawasan_silit_curtainmarinc')->name('external.pengawasan.daftar_pengawasan_silit_curtainmarinc');

  Route::get('sungai/{pengawasan_id}/{pakej_id}/{projek_id}', 'External\Pengawasan\EMR\EMRController@silit_curtain_sungai')->name('external.pengawasan.silit_curtain_sungai');
  Route::get('marin/{pengawasan_id}/{pakej_id}/{projek_id}/{bulan}/{tahun}', 'External\Pengawasan\EMR\EMRController@silit_curtain_marin')->name('external.pengawasan.silit_curtain_marin');
  Route::get('tasik/{pengawasan_id}/{pakej_id}/{projek_id}', 'External\Pengawasan\EMR\EMRController@silit_curtain_tasik')->name('external.pengawasan.silit_curtain_tasik');
  Route::get('tanah/{pengawasan_id}/{pakej_id}/{projek_id}', 'External\Pengawasan\EMR\EMRController@silit_curtain_tanah')->name('external.pengawasan.silit_curtain_tanah');
  Route::get('laut/{pengawasan_id}/{pakej_id}/{projek_id}', 'External\Pengawasan\EMR\EMRController@silit_curtain_laut')->name('external.pengawasan.silit_curtain_laut');

  Route::post('silit_curtain_sungai_simpan', 'External\Pengawasan\EMR\EMRController@silit_curtain_sungai_simpan')->name('external.pengawasan.silit_curtain_sungai.simpan');
  Route::post('silit_curtain_marin_simpan', 'External\Pengawasan\EMR\EMRController@silit_curtain_marin_simpan')->name('external.pengawasan.silit_curtain_marin.simpan');
  Route::post('silit_curtain_tasik_simpan', 'External\Pengawasan\EMR\EMRController@silit_curtain_tasik_simpan')->name('external.pengawasan.silit_curtain_tasik.simpan');
  Route::post('silit_curtain_tanah_simpan', 'External\Pengawasan\EMR\EMRController@silit_curtain_tanah_simpan')->name('external.pengawasan.silit_curtain_tanah.simpan');
  Route::post('silit_curtain_laut_simpan', 'External\Pengawasan\EMR\EMRController@silit_curtain_laut_simpan')->name('external.pengawasan.silit_curtain_laut.simpan');
  Route::post('submitcurtain/{id}', 'External\Pengawasan\EMR\EMRController@submitcurtain')->name('submitcurtain');
  Route::post('hantarcurtain/{id}', 'External\Pengawasan\EMR\EMRController@hantarcurtain')->name('hantarcurtain');
  Route::post('submitcurtainpp/{id}', 'External\Pengawasan\EMR\EMRController@submitcurtainpp')->name('submitcurtainpp');
});

Route::prefix('EMR')->group(function () {
    
    Route::get('eosemak/{projekid}', 'External\Pengawasan\EMR\EMRController@eosemak')->name('external.pengawasan.EMR.eosemak');
    Route::get('checkstatusemc/{id}', 'External\Pengawasan\EMR\EMRController@checkstatusemc')->name('checkstatusemc');

    Route::get('emr_pakej/{bulan}/{tahun}/{projekid}', 'External\Pengawasan\EMR\EMRController@emr_pakej')->name('external.pengawasan.EMR.emr_pakej');
    Route::get('emr_hantar/{id}/{pakej}', 'External\Pengawasan\EMR\EMRController@emr_hantar')->name('external.pengawasan.EMR.emr_hantar');
    Route::get('removec/{id}/{bulan}/{tahun}', 'External\Pengawasan\EMR\EMRController@removec')->name('external.pengawasan.EMR.removec');
    Route::post('tambahbulan', 'External\Pengawasan\EMR\EMRController@tambahbulan')->name('external.pengawasan.EMR.tambahbulan');
    Route::get('tarikhpengawasan', 'External\Pengawasan\EMR\EMRController@tarikhpengawasan')->name('external.pengawasan.EMR.tarikhpengawasan');
    Route::get('status_pengawasan', 'External\Pengawasan\EMR\EMRController@statuspengawasan')->name('external.pengawasan.EMR.status_pengawasan');
    Route::get('daftar_pengawasan/{id?}', 'External\Pengawasan\EMR\EMRController@daftarpengawasan')->name('external.pengawasan.EMR.daftar_pengawasan');
    Route::get('daftar_pengawasan_view/{id?}', 'External\Pengawasan\EMR\EMRController@daftarpengawasanview')->name('external.pengawasan.EMR.daftar_pengawasan_view');
    Route::post('hantarlaporan', 'External\Pengawasan\EMR\EMRController@hantarlaporanpengawasan')->name('external.pengawasan.EMR.hantarlaporanpengawasan');
    Route::post('pengesahanlaporan', 'External\Pengawasan\EMR\EMRController@pengesahanlaporanpengawasan')->name('external.pengawasan.EMR.pengesahanlaporanpengawasan');
    Route::post('showulasan/{id?}', 'External\Pengawasan\EMR\EMRController@showulasan')->name('external.pengawasan.EMR.showulasan');
    Route::get('cetakanlaporan', 'External\Pengawasan\EMR\EMRController@cetakanlaporan')->name('external.pengawasan.EMR.cetakanlaporan');

    Route::post('kemajuan_kerja_percentage', 'External\Pengawasan\EMR\EMRController@kemajuan_kerja_percentage')->name('kemajuan_kerja_percentage');

    Route::get('sungai/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanairsungai')->name('external.pengawasan.EMR.air.sungai.sungai');
    Route::get('sungaiview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanairsungaiview')->name('external.pengawasan.EMR.air.sungai.sungaiview');
    Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');
    Route::post('ppKemaskini', 'External\Pengawasan\EMR\EMRController@ppKemaskini')->name('external.pengawasan.EMR.ppKemaskini');
    Route::get('sungai/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumat')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('sungaiview/view/{id?}', 'External\Pengawasan\EMR\EMRController@viewsungai')->name('external.pengawasan.EMR.air.sungai.viewsungai');
	Route::get('sungai/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@sungai_janapdf')->name('external.pengawasan.EMR.pdf');

    Route::get('marin/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanmarin')->name('external.pengawasan.EMR.air.laut.laut');
    Route::get('marinview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanmarinview')->name('external.pengawasan.EMR.air.laut.lautview');
    Route::get('marin/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatmarin')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('marinview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatmarinview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
    Route::get('marinview/marin/{pengawasan_id}/{pakej_id}/{projek_id}/{bulan}/{tahun}', 'External\Pengawasan\EMR\EMRController@silit_curtain_marin')->name('external.pengawasan.silit_curtain_marin');
    //Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');
	Route::get('marin/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@marin_janapdf')->name('external.pengawasan.EMR.marin_janapdf');

    Route::get('airtanah/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanairtanah')->name('external.pengawasan.EMR.air.tanah.tanah');
    Route::get('airtanahview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanairtanahview')->name('external.pengawasan.EMR.air.tanah.tanahview');
    Route::get('/airtanah/airtanah/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatairtanah')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('airtanahview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatairtanahview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
	Route::get('airtanah/view/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@airtanah_janapdf')->name('external.pengawasan.EMR.airtanah_janapdf');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/

    Route::get('tasik/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasantasik')->name('external.pengawasan.EMR.air.tasik.tasik');
    Route::get('tasikview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasantasikview')->name('external.pengawasan.EMR.air.tasik.tasikview');
    Route::get('tasik/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumattasik')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('tasikview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumattasikview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/
	Route::get('tasik/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@tasik_janapdf')->name('external.pengawasan.EMR.tasik_janapdf');

    Route::get('airkolam/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanairkolam')->name('external.pengawasan.EMR.air.kolam.kolam_mendap');
    Route::get('airkolamview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanairkolamview')->name('external.pengawasan.EMR.air.kolam.kolam_mendapview');
    Route::get('airkolam/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatairkolam')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('airkolamview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatairkolamview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/
	Route::get('airkolam/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@airkolam_janapdf')->name('external.pengawasan.EMR.airkolam_janapdf');

    Route::get('udara/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanudara')->name('external.pengawasan.EMR.udara.udara');
    Route::get('udaraview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanudaraview')->name('external.pengawasan.EMR.udara.udaraview');
    Route::get('udara/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatudara')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('udaraview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatudaraview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
	Route::get('udara/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@udara_janapdf')->name('external.pengawasan.EMR.udara_janapdf');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/

    Route::get('bunyi/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanbunyi')->name('external.pengawasan.EMR.bunyi.bunyi');
    Route::get('bunyiview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasanbunyiview')->name('external.pengawasan.EMR.bunyi.bunyiview');
    Route::get('bunyi/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatbunyi')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('bunyiview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatbunyiview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
	Route::get('bunyi/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@bunyi_janapdf')->name('external.pengawasan.EMR.bunyi_janapdf');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/

    Route::get('getaran/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasangetaran')->name('external.pengawasan.EMR.getaran.getaran');
    Route::get('getaranview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasangetaranview')->name('external.pengawasan.EMR.getaran.getaranview');
    Route::get('getaran/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatgetaran')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('getaranview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatgetaranview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
	Route::get('getaran/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@getaran_janapdf')->name('external.pengawasan.EMR.getaran_janapdf');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/

    Route::get('dron/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasandron')->name('external.pengawasan.EMR.dron.dron');
    Route::get('dronview/{id?}', 'External\Pengawasan\EMR\EMRController@programpengawasandronview')->name('external.pengawasan.EMR.dron.dronview');
    Route::get('dron/kemaskini/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatdron')->name('external.pengawasan.EMR.kemaskinimaklumat');
    Route::get('dronview/view/{id?}', 'External\Pengawasan\EMR\EMRController@kemaskinimaklumatdronview')->name('external.pengawasan.EMR.kemaskinimaklumatview');
    Route::get('dron/kemaskini/janapdf/{id?}', 'External\Pengawasan\EMR\EMRController@dron_janapdf')->name('external.pengawasan.EMR.dron_janapdf');
    /*Route::post('tambahmaklumat', 'External\Pengawasan\EMR\EMRController@tambahmaklumat')->name('external.pengawasan.EMR.tambahmaklumat');*/

    Route::post('uploaddatapengawasandron', 'External\Pengawasan\EMR\EMRController@uploaddatapengawasandron')->name('external.pengawasan.EMR.uploaddatapengawasandron');





    //indeks air tanah

    Route::get('airtanah/view/indeks/{id}', 'External\Pengawasan\EMR\EMRController@airtanah_indeks')->name('external.pengawasan.EMR.airtanah_indeks');

    //indeks marine

    //indeks udara
    
    //indeks air kolam
    
    //indeks tasik

    //indeks sungai
    



    Route::prefix('attachment')->group(function () {
            Route::get('/{id}', 'External\Pengawasan\EMR\EMRController@attachment_index')->name('external.pengawasan.EMR.attachment');
            Route::post('/{id}', 'External\Pengawasan\EMR\EMRController@attachment_insert')->name('external.pengawasan.EMR.attachment');
            Route::delete('/', 'External\Pengawasan\EMR\EMRController@attachment_delete1')->name('external.pengawasan.EMR.attachment');
            Route::get('jadual/delete/{id}', 'External\Pengawasan\EMR\EMRController@gambarfoto_delete')->name('external.pengawasan.EMR.delete');

            Route::get('gambarfoto/{id}', 'External\Pengawasan\EMR\EMRController@gambarfoto_index')->name('external.pengawasan.EMR.gambarfoto');
            Route::post('gambarfoto/{id}', 'External\Pengawasan\EMR\EMRController@gambarfoto_insert')->name('external.pengawasan.EMR.gambarfoto');
            Route::delete('gambarfoto/', 'External\Pengawasan\EMR\EMRController@gambarfoto_delete1')->name('external.pengawasan.EMR.gambarfoto');
            Route::get('gambarfoto/delete/{id}', 'External\Pengawasan\EMR\EMRController@gambarfoto_delete')->name('external.pengawasan.EMR.delete');

            Route::get('gambarpengawasan/{id}', 'External\Pengawasan\EMR\EMRController@gambarpengawasan_index')->name('external.pengawasan.EMR.gambarpengawasan');
            Route::post('gambarpengawasan/{id}', 'External\Pengawasan\EMR\EMRController@gambarpengawasan_insert')->name('external.pengawasan.EMR.gambarpengawasan');
            Route::delete('gambarpengawasan/', 'External\Pengawasan\EMR\EMRController@gambarpengawasan_delete1')->name('external.pengawasan.EMR.gambarpengawasan');
            Route::get('gambarpengawasan/delete/{id}', 'External\Pengawasan\EMR\EMRController@gambarpengawasan_delete')->name('external.pengawasan.EMR.delete');

            Route::get('videopengawasan/{id}', 'External\Pengawasan\EMR\EMRController@videopengawasan_index')->name('external.pengawasan.EMR.videopengawasan');
            Route::post('videopengawasan/{id}', 'External\Pengawasan\EMR\EMRController@videopengawasan_insert')->name('external.pengawasan.EMR.videopengawasan');
            Route::delete('videopengawasan/', 'External\Pengawasan\EMR\EMRController@videopengawasan_delete1')->name('external.pengawasan.EMR.videopengawasan');
            Route::get('videopengawasan/delete/{id}', 'External\Pengawasan\EMR\EMRController@videopengawasan_delete')->name('external.pengawasan.EMR.delete');
    });

    Route::get('map/{id}', 'External\Pengawasan\EMR\EMRController@map')->name('external.pengawasan.map');


    /*Route::get('sungai', function () {
                return view('external.pengawasan.EMR.air.sungai.sungai');
            })->name('external.pengawasan.EMR.air.sungai.sungai');*/

    /*Route::get('tarikhpengawasan', function () {
        return view('external.pengawasan.EMR.tarikhpengawasan');
    })->name('external.pengawasan.EMR.tarikhpengawasan');*/
    /*Route::get('daftar_pengawasan', function () {
        return view('external.pengawasan.EMR.daftar_pengawasan');
    })->name('external.pengawasan.EMR.daftar_pengawasan');*/
    /*Route::get('status_pengawasan', function () {
        return view('external.pengawasan.EMR.status_pengawasan');
    })->name('external.pengawasan.EMR.status_pengawasan');*/
    Route::get('air', function () {
        return view('external.pengawasan.EMR.air');
    })->name('external.pengawasan.EMR.air');
    Route::get('sungai', function () {
        return view('external.pengawasan.EMR.sungai');
    })->name('external.pengawasan.EMR.sungai');
    Route::get('status_air', function () {
        return view('external.pengawasan.EMR.status_air');
    })->name('external.pengawasan.EMR.status_air');
    Route::prefix('air')->group(function () {
        Route::prefix('sungai')->group(function () {
            Route::get('status_sungai', function () {
                return view('external.pengawasan.EMR.air.sungai.status_sungai');
            })->name('external.pengawasan.EMR.air.sungai.status_sungai');
            /*Route::get('sungai', function () {
                return view('external.pengawasan.EMR.air.sungai.sungai');
            })->name('external.pengawasan.EMR.air.sungai.sungai');*/
            Route::get('view_sungai', function () {
                return view('external.pengawasan.EMR.air.sungai.view_sungai');
            })->name('external.pengawasan.EMR.air.sungai.view_sungai');
        });
        Route::prefix('laut')->group(function () {
            Route::get('status_laut', function () {
                return view('external.pengawasan.EMR.air.laut.status_laut');
            })->name('external.pengawasan.EMR.air.laut.status_laut');
            /*Route::get('laut', function () {
                return view('external.pengawasan.EMR.air.laut.laut');
            })->name('external.pengawasan.EMR.air.laut.laut');*/
            Route::get('view_laut', function () {
                return view('external.pengawasan.EMR.air.laut.view_laut');
            })->name('external.pengawasan.EMR.air.laut.view_laut');
        });
        Route::prefix('tanah')->group(function () {
            Route::get('status_tanah', function () {
                return view('external.pengawasan.EMR.air.tanah.status_tanah');
            })->name('external.pengawasan.EMR.air.tanah.status_tanah');
            /*Route::get('tanah', function () {
                return view('external.pengawasan.EMR.air.tanah.tanah');
            })->name('external.pengawasan.EMR.air.tanah.tanah');*/
            Route::get('view_tanah', function () {
                return view('external.pengawasan.EMR.air.tanah.view_tanah');
            })->name('external.pengawasan.EMR.air.tanah.view_tanah');
        });
        Route::prefix('tasik')->group(function () {
            Route::get('status_tasik', function () {
                return view('external.pengawasan.EMR.air.tasik.status_tasik');
            })->name('external.pengawasan.EMR.air.tasik.status_tasik');
            /*Route::get('tasik', function () {
                return view('external.pengawasan.EMR.air.tasik.tasik');
            })->name('external.pengawasan.EMR.air.tasik.tasik');*/
            Route::get('view_tasik', function () {
                return view('external.pengawasan.EMR.air.tasik.view_tasik');
            })->name('external.pengawasan.EMR.air.tasik.view_tasik');
        });
        Route::prefix('kolam')->group(function () {
            Route::get('status_kolam_mendap', function () {
                return view('external.pengawasan.EMR.air.kolam.status_kolam_mendap');
            })->name('external.pengawasan.EMR.air.kolam.status_kolam_mendap');
            /*Route::get('kolam_mendap', function () {
                return view('external.pengawasan.EMR.air.kolam.kolam_mendap');
            })->name('external.pengawasan.EMR.air.kolam.kolam_mendap');*/
             Route::get('view_kolam_mendap', function () {
                return view('external.pengawasan.EMR.air.kolam.view_kolam_mendap');
            })->name('external.pengawasan.EMR.air.kolam.view_kolam_mendap');
        });

    });
    Route::prefix('udara')->group(function () {
        Route::get('status_udara', function () {
        return view('external.pengawasan.EMR.udara.status_udara');
        })->name('external.pengawasan.EMR.udara.status_udara');
        /*Route::get('udara', function () {
            return view('external.pengawasan.EMR.udara.udara');
        })->name('external.pengawasan.EMR.udara.udara');*/
        Route::get('view_udara', function () {
            return view('external.pengawasan.EMR.udara.view_udara');
        })->name('external.pengawasan.EMR.udara.view_udara');
    });
    Route::prefix('bunyi')->group(function () {
        Route::get('status_bunyi', function () {
            return view('external.pengawasan.EMR.bunyi.status_bunyi');
        })->name('external.pengawasan.EMR.bunyi.status_bunyi');
        /*Route::get('bunyi', function () {
            return view('external.pengawasan.EMR.bunyi.bunyi');
        })->name('external.pengawasan.EMR.bunyi.bunyi');*/
        Route::get('view_bunyi', function () {
            return view('external.pengawasan.EMR.bunyi.view_bunyi');
        })->name('external.pengawasan.EMR.bunyi.view_bunyi');
    });
    Route::prefix('getaran')->group(function () {
        Route::get('status_getaran', function () {
            return view('external.pengawasan.EMR.getaran.status_getaran');
        })->name('external.pengawasan.EMR.getaran.status_getaran');
        /*Route::get('getaran', function () {
            return view('external.pengawasan.EMR.getaran.getaran');
        })->name('external.pengawasan.EMR.getaran.getaran');*/
        Route::get('view_getaran', function () {
            return view('external.pengawasan.EMR.getaran.view_getaran');
        })->name('external.pengawasan.EMR.getaran.view_getaran');
    });
    Route::prefix('dron')->group(function () {
        Route::get('status_dron', function () {
            return view('external.pengawasan.EMR.dron.status_dron');
        })->name('external.pengawasan.EMR.dron.status_dron');
        /*Route::get('dron', function () {
            return view('external.pengawasan.EMR.dron.dron');
        })->name('external.pengawasan.EMR.dron.dron');*/
        Route::get('view_dron', function () {
            return view('external.pengawasan.EMR.dron.view_dron');
        })->name('external.pengawasan.EMR.dron.view_dron');
    });
    Route::get('parameter', function () {
        return view('external.pengawasan.EMR.parameter');
    })->name('external.pengawasan.EMR.parameter');
});
