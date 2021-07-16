<?php
Route::prefix('BMPs')->group(function () {


    Route::prefix('monthly')->group(function () {

      Route::get('tarikh', 'External\Pengawasan\BMP\BMPController@tarikh')->name('external.pengawasan.BMPs.monthly.tarikh');
      Route::post('tarikh', 'External\Pengawasan\BMP\BMPController@tarikhtambah')->name('external.pengawasan.BMPs.monthly.tarikh.tambah');
      Route::get('pemantauan_bmps/{id}', 'External\Pengawasan\BMP\BMPController@maklumatborang')->name('external.pengawasan.BMPs.pemantauan_bmps');
      Route::get('pemantauan_bmps_delete/{id}', 'External\Pengawasan\BMP\BMPController@pemantauan_bmps_delete')->name('external.pengawasan.BMPs.pemantauan_bmps_delete');
      Route::get('hantar/{id}', 'External\Pengawasan\BMP\BMPController@hantar')->name('external.pengawasan.BMPs.hantar');
      Route::post('simpanmaklumatborang', 'External\Pengawasan\BMP\BMPController@simpanmaklumatborang')->name('external.pengawasan.BMPs.pemantauan_bmps.simpanmaklumatborang');
      Route::post('completemaklumatborang', 'External\Pengawasan\BMP\BMPController@completemaklumatborang')->name('external.pengawasan.BMPs.pemantauan_bmps.completemaklumatborang');
      Route::post('simpanmaklumatborang1', 'External\Pengawasan\BMP\BMPController@simpanmaklumatborang1')->name('external.pengawasan.BMPs.pemantauan_bmps.simpanmaklumatborang1');
      Route::post('simpanulasan', 'External\Pengawasan\BMP\BMPController@simpanulasan')->name('external.pengawasan.BMPs.pemantauan_bmps.simpanulasan');
      Route::get('pemantauan_bmps/hantarmaklumat/{id}', 'External\Pengawasan\BMP\BMPController@hantarmaklumat')->name('external.pengawasan.BMPs.pemantauan_bmps.hantarmaklumat');
      Route::get('status_bmps', 'External\Pengawasan\BMP\BMPController@status_bmps')->name('external.pengawasan.BMPs.monthly.status_bmps');
      Route::get('view_bmps/{id}', 'External\Pengawasan\BMP\BMPController@view_bmps')->name('external.pengawasan.BMPs.view_bmps');
      Route::get('view_bmpss/{id}', 'External\Pengawasan\BMP\BMPController@view_bmpss')->name('external.pengawasan.BMPs.view_bmpss');
      Route::get('BMPS_monthly_pakej/{bulan}/{tahun}/{projekid}', 'External\Pengawasan\BMP\BMPController@BMPS_monthly_pakej')->name('external.pengawasan.BMPs.BMPS_monthly_pakej');

      //cetak all pdf bahagian D
      Route::get('cetakallpdf/{id}', 'External\Pengawasan\BMP\BMPController@cetakallpdf')->name('external.pengawasan.BMPs.cetakallpdf');

      Route::prefix('tab1')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab1_index')->name('external.pengawasan.BMPs.monthly.tab1');
		  Route::get('/janapdf/{id}', 'External\Pengawasan\BMP\BMPController@janapdf')->name('external.pengawasan.BMPs.monthly.tab1.janapdf');
          });

      Route::prefix('tab2')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab2_index')->name('external.pengawasan.BMPs.monthly.tab2');
		  Route::get('/janapdf_tab2/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab2')->name('external.pengawasan.BMPs.monthly.tab2.janapdf_tab2');
          });

      Route::prefix('tab3')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab3_index')->name('external.pengawasan.BMPs.monthly.tab3');
		  Route::get('/janapdf_tab3/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab3')->name('external.pengawasan.BMPs.monthly.tab3.janapdf_tab3');
          });

      Route::prefix('tab4')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab4_index')->name('external.pengawasan.BMPs.monthly.tab4');
		  Route::get('/janapdf_tab4/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab4')->name('external.pengawasan.BMPs.monthly.tab4.janapdf_tab4');
          });

      Route::prefix('tab5')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab5_index')->name('external.pengawasan.BMPs.monthly.tab5');
		  Route::get('/janapdf_tab5/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab5')->name('external.pengawasan.BMPs.monthly.tab5.janapdf_tab5');
          });


      Route::prefix('tab1view')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab1_indexview')->name('external.pengawasan.BMPs.monthly.tab1view');
      Route::get('/janapdf/{id}', 'External\Pengawasan\BMP\BMPController@janapdf')->name('external.pengawasan.BMPs.monthly.tab1.janapdf');
          });

      Route::prefix('tab2view')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab2_indexview')->name('external.pengawasan.BMPs.monthly.tab2view');
      Route::get('/janapdf_tab2/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab2')->name('external.pengawasan.BMPs.monthly.tab2.janapdf_tab2');
          });

      Route::prefix('tab3view')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab3_indexview')->name('external.pengawasan.BMPs.monthly.tab3view');
      Route::get('/janapdf_tab3/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab3')->name('external.pengawasan.BMPs.monthly.tab3.janapdf_tab3');
          });

      Route::prefix('tab4view')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab4_indexview')->name('external.pengawasan.BMPs.monthly.tab4view');
      Route::get('/janapdf_tab4/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab4')->name('external.pengawasan.BMPs.monthly.tab4.janapdf_tab4');
          });

      Route::prefix('tab5view')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPController@tab5_indexview')->name('external.pengawasan.BMPs.monthly.tab5view');
      Route::get('/janapdf_tab5/{id}', 'External\Pengawasan\BMP\BMPController@janapdf_tab5')->name('external.pengawasan.BMPs.monthly.tab5.janapdf_tab5');
          });


      Route::prefix('attachment')->group(function () {
        Route::prefix('bmp1')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp1_index')->name('external.pengawasan.BMPs.monthly.bmp1');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp1_insert')->name('external.pengawasan.BMPs.monthly.bmp1');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp1_delete1')->name('external.pengawasan.BMPs.monthly.bmp1');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp1_delete')->name('external.pengawasan.BMPs.monthly.bmp1.delete');
          });

        Route::prefix('bmp2')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp2_index')->name('external.pengawasan.BMPs.monthly.bmp2');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp2_insert')->name('external.pengawasan.BMPs.monthly.bmp2');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp2_delete1')->name('external.pengawasan.BMPs.monthly.bmp2');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp2_delete')->name('external.pengawasan.BMPs.monthly.bmp2.delete');
          });

        Route::prefix('bmp3')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp3_index')->name('external.pengawasan.BMPs.monthly.bmp3');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp3_insert')->name('external.pengawasan.BMPs.monthly.bmp3');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp3_delete1')->name('external.pengawasan.BMPs.monthly.bmp3');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp3_delete')->name('external.pengawasan.BMPs.monthly.bmp3.delete');
          });

        Route::prefix('bmp4')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp4_index')->name('external.pengawasan.BMPs.monthly.bmp4');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp4_insert')->name('external.pengawasan.BMPs.monthly.bmp4');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp4_delete1')->name('external.pengawasan.BMPs.monthly.bmp4');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp4_delete')->name('external.pengawasan.BMPs.monthly.bmp4.delete');
          });

        Route::prefix('bmp5')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp5_index')->name('external.pengawasan.BMPs.monthly.bmp5');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp5_insert')->name('external.pengawasan.BMPs.monthly.bmp5');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp5_delete1')->name('external.pengawasan.BMPs.monthly.bmp5');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp5_delete')->name('external.pengawasan.BMPs.monthly.bmp5.delete');
          });

        Route::prefix('bmp6')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp6_index')->name('external.pengawasan.BMPs.monthly.bmp6');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp6_insert')->name('external.pengawasan.BMPs.monthly.bmp6');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp6_delete1')->name('external.pengawasan.BMPs.monthly.bmp6');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp6_delete')->name('external.pengawasan.BMPs.monthly.bmp6.delete');
          });

        Route::prefix('bmp7')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp7_index')->name('external.pengawasan.BMPs.monthly.bmp7');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp7_insert')->name('external.pengawasan.BMPs.monthly.bmp7');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp7_delete1')->name('external.pengawasan.BMPs.monthly.bmp7');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp7_delete')->name('external.pengawasan.BMPs.monthly.bmp7.delete');
          });

        Route::prefix('bmp8')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp8_index')->name('external.pengawasan.BMPs.monthly.bmp8');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp8_insert')->name('external.pengawasan.BMPs.monthly.bmp8');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp8_delete1')->name('external.pengawasan.BMPs.monthly.bmp8');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp8_delete')->name('external.pengawasan.BMPs.monthly.bmp8.delete');
          });

        Route::prefix('bmp9')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp9_index')->name('external.pengawasan.BMPs.monthly.bmp9');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp9_insert')->name('external.pengawasan.BMPs.monthly.bmp9');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp9_delete1')->name('external.pengawasan.BMPs.monthly.bmp9');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp9_delete')->name('external.pengawasan.BMPs.monthly.bmp9.delete');
          });

        Route::prefix('bmp10')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp10_index')->name('external.pengawasan.BMPs.monthly.bmp10');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp10_insert')->name('external.pengawasan.BMPs.monthly.bmp10');
    			Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp10_delete1')->name('external.pengawasan.BMPs.monthly.bmp10');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp10_delete')->name('external.pengawasan.BMPs.monthly.bmp10.delete');
          });

        Route::prefix('bmp11')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp11_index')->name('external.pengawasan.BMPs.monthly.bmp11');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp11_insert')->name('external.pengawasan.BMPs.monthly.bmp11');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp11_delete1')->name('external.pengawasan.BMPs.monthly.bmp11');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp11_delete')->name('external.pengawasan.BMPs.monthly.bmp11.delete');
          });

        Route::prefix('bmp12')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp12_index')->name('external.pengawasan.BMPs.monthly.bmp12');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp12_insert')->name('external.pengawasan.BMPs.monthly.bmp12');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp12_delete1')->name('external.pengawasan.BMPs.monthly.bmp12');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp12_delete')->name('external.pengawasan.BMPs.monthly.bmp12.delete');
          });

        Route::prefix('bmp13')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp13_index')->name('external.pengawasan.BMPs.monthly.bmp13');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp13_insert')->name('external.pengawasan.BMPs.monthly.bmp13');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp13_delete1')->name('external.pengawasan.BMPs.monthly.bmp13');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp13_delete')->name('external.pengawasan.BMPs.monthly.bmp13.delete');
          });

        Route::prefix('bmp14')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp14_index')->name('external.pengawasan.BMPs.monthly.bmp14');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp14_insert')->name('external.pengawasan.BMPs.monthly.bmp14');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp14_delete1')->name('external.pengawasan.BMPs.monthly.bmp14');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp14_delete')->name('external.pengawasan.BMPs.monthly.bmp14.delete');
          });

        Route::prefix('bmp15')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp15_index')->name('external.pengawasan.BMPs.monthly.bmp15');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp15_insert')->name('external.pengawasan.BMPs.monthly.bmp15');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp15_delete1')->name('external.pengawasan.BMPs.monthly.bmp15');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp15_delete')->name('external.pengawasan.BMPs.monthly.bmp15.delete');
          });

        Route::prefix('bmp16')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp16_index')->name('external.pengawasan.BMPs.monthly.bmp16');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp16_insert')->name('external.pengawasan.BMPs.monthly.bmp16');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp16_delete1')->name('external.pengawasan.BMPs.monthly.bmp16');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp16_delete')->name('external.pengawasan.BMPs.monthly.bmp16.delete');
          });

        Route::prefix('bmp17')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp17_index')->name('external.pengawasan.BMPs.monthly.bmp17');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp17_insert')->name('external.pengawasan.BMPs.monthly.bmp17');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp17_delete1')->name('external.pengawasan.BMPs.monthly.bmp17');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp17_delete')->name('external.pengawasan.BMPs.monthly.bmp17.delete');
          });

        Route::prefix('bmp18')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp18_index')->name('external.pengawasan.BMPs.monthly.bmp18');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp18_insert')->name('external.pengawasan.BMPs.monthly.bmp18');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp18_delete1')->name('external.pengawasan.BMPs.monthly.bmp18');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp18_delete')->name('external.pengawasan.BMPs.monthly.bmp18.delete');
          });

        Route::prefix('bmp19')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp19_index')->name('external.pengawasan.BMPs.monthly.bmp19');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp19_insert')->name('external.pengawasan.BMPs.monthly.bmp19');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp19_delete1')->name('external.pengawasan.BMPs.monthly.bmp19');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp19_delete')->name('external.pengawasan.BMPs.monthly.bmp19.delete');
          });

        Route::prefix('bmp20')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp20_index')->name('external.pengawasan.BMPs.monthly.bmp20');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp20_insert')->name('external.pengawasan.BMPs.monthly.bmp20');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp20_delete1')->name('external.pengawasan.BMPs.monthly.bmp20');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp20_delete')->name('external.pengawasan.BMPs.monthly.bmp20.delete');
          });

        Route::prefix('bmp21')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp21_index')->name('external.pengawasan.BMPs.monthly.bmp21');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp21_insert')->name('external.pengawasan.BMPs.monthly.bmp21');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp21_delete1')->name('external.pengawasan.BMPs.monthly.bmp21');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp21_delete')->name('external.pengawasan.BMPs.monthly.bmp21.delete');
          });

        Route::prefix('bmp22')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp22_index')->name('external.pengawasan.BMPs.monthly.bmp22');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp22_insert')->name('external.pengawasan.BMPs.monthly.bmp22');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp21_delete1')->name('external.pengawasan.BMPs.monthly.bmp22');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp22_delete')->name('external.pengawasan.BMPs.monthly.bmp22.delete');
          });

        Route::prefix('bmp23')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp23_index')->name('external.pengawasan.BMPs.monthly.bmp23');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp23_insert')->name('external.pengawasan.BMPs.monthly.bmp23');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp23_delete1')->name('external.pengawasan.BMPs.monthly.bmp23');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp23_delete')->name('external.pengawasan.BMPs.monthly.bmp23.delete');
          });

        Route::prefix('bmp24')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp24_index')->name('external.pengawasan.BMPs.monthly.bmp24');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp24_insert')->name('external.pengawasan.BMPs.monthly.bmp24');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp24_delete1')->name('external.pengawasan.BMPs.monthly.bmp24');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp24_delete')->name('external.pengawasan.BMPs.monthly.bmp24.delete');
          });

        Route::prefix('bmp25')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp25_index')->name('external.pengawasan.BMPs.monthly.bmp25');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp25_insert')->name('external.pengawasan.BMPs.monthly.bmp25');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp25_delete1')->name('external.pengawasan.BMPs.monthly.bmp25');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp25_delete')->name('external.pengawasan.BMPs.monthly.bmp25.delete');
          });

        Route::prefix('bmp26')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp26_index')->name('external.pengawasan.BMPs.monthly.bmp26');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp26_insert')->name('external.pengawasan.BMPs.monthly.bmp26');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp26_delete1')->name('external.pengawasan.BMPs.monthly.bmp26');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp26_delete')->name('external.pengawasan.BMPs.monthly.bmp26.delete');
          });

        Route::prefix('bmp27')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp27_index')->name('external.pengawasan.BMPs.monthly.bmp27');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp27_insert')->name('external.pengawasan.BMPs.monthly.bmp27');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp25_delete1')->name('external.pengawasan.BMPs.monthly.bmp27');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp25_delete')->name('external.pengawasan.BMPs.monthly.bmp27.delete');
          });

        Route::prefix('bmp28')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp28_index')->name('external.pengawasan.BMPs.monthly.bmp28');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp28_insert')->name('external.pengawasan.BMPs.monthly.bmp28');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp28_delete1')->name('external.pengawasan.BMPs.monthly.bmp28');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp28_delete')->name('external.pengawasan.BMPs.monthly.bmp28.delete');
          });

        Route::prefix('bmp29')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp29_index')->name('external.pengawasan.BMPs.monthly.bmp29');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp29_insert')->name('external.pengawasan.BMPs.monthly.bmp29');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp29_delete1')->name('external.pengawasan.BMPs.monthly.bmp29');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp29_delete')->name('external.pengawasan.BMPs.monthly.bmp29.delete');
          });

        Route::prefix('bmp30')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp30_index')->name('external.pengawasan.BMPs.monthly.bmp30');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp30_insert')->name('external.pengawasan.BMPs.monthly.bmp30');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp30_delete1')->name('external.pengawasan.BMPs.monthly.bmp30');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp30_delete')->name('external.pengawasan.BMPs.monthly.bmp30.delete');
          });

        Route::prefix('bmp31')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp31_index')->name('external.pengawasan.BMPs.monthly.bmp31');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp31_insert')->name('external.pengawasan.BMPs.monthly.bmp31');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp31_delete1')->name('external.pengawasan.BMPs.monthly.bmp31');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp31_delete')->name('external.pengawasan.BMPs.monthly.bmp31.delete');
          });

        Route::prefix('bmp32')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp32_index')->name('external.pengawasan.BMPs.monthly.bmp32');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp32_insert')->name('external.pengawasan.BMPs.monthly.bmp32');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp32_delete1')->name('external.pengawasan.BMPs.monthly.bmp32');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp32_delete')->name('external.pengawasan.BMPs.monthly.bmp32.delete');
          });

        Route::prefix('bmp33')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp33_index')->name('external.pengawasan.BMPs.monthly.bmp33');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp33_insert')->name('external.pengawasan.BMPs.monthly.bmp33');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp33_delete1')->name('external.pengawasan.BMPs.monthly.bmp33');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp33_delete')->name('external.pengawasan.BMPs.monthly.bmp33.delete');
          });

        Route::prefix('bmp34')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp34_index')->name('external.pengawasan.BMPs.monthly.bmp34');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp34_insert')->name('external.pengawasan.BMPs.monthly.bmp34');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp34_delete1')->name('external.pengawasan.BMPs.monthly.bmp34');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp34_delete')->name('external.pengawasan.BMPs.monthly.bmp34.delete');
          });

        Route::prefix('bmp35')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp35_index')->name('external.pengawasan.BMPs.monthly.bmp35');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp35_insert')->name('external.pengawasan.BMPs.monthly.bmp35');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp35_delete1')->name('external.pengawasan.BMPs.monthly.bmp35');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp35_delete')->name('external.pengawasan.BMPs.monthly.bmp35.delete');
          });

        Route::prefix('bmp36')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp36_index')->name('external.pengawasan.BMPs.monthly.bmp36');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp36_insert')->name('external.pengawasan.BMPs.monthly.bmp36');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp36_delete1')->name('external.pengawasan.BMPs.monthly.bmp36');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp36_delete')->name('external.pengawasan.BMPs.monthly.bmp36.delete');
          });

        Route::prefix('bmp37')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp37_index')->name('external.pengawasan.BMPs.monthly.bmp37');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp37_insert')->name('external.pengawasan.BMPs.monthly.bmp37');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp37_delete1')->name('external.pengawasan.BMPs.monthly.bmp37');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp37_delete')->name('external.pengawasan.BMPs.monthly.bmp37.delete');
          });

        Route::prefix('bmp38')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp38_index')->name('external.pengawasan.BMPs.monthly.bmp38');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp38_insert')->name('external.pengawasan.BMPs.monthly.bmp38');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp38_delete1')->name('external.pengawasan.BMPs.monthly.bmp38');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp38_delete')->name('external.pengawasan.BMPs.monthly.bmp38.delete');
          });

        Route::prefix('bmp39')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp39_index')->name('external.pengawasan.BMPs.monthly.bmp39');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp39_insert')->name('external.pengawasan.BMPs.monthly.bmp39');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp39_delete1')->name('external.pengawasan.BMPs.monthly.bmp39');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp39_delete')->name('external.pengawasan.BMPs.monthly.bmp39.delete');
          });

        Route::prefix('bmp40')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp40_index')->name('external.pengawasan.BMPs.monthly.bmp40');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp40_insert')->name('external.pengawasan.BMPs.monthly.bmp40');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp40_delete1')->name('external.pengawasan.BMPs.monthly.bmp40');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp40_delete')->name('external.pengawasan.BMPs.monthly.bmp40.delete');
          });

        Route::prefix('bmp41')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp41_index')->name('external.pengawasan.BMPs.monthly.bmp41');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp41_insert')->name('external.pengawasan.BMPs.monthly.bmp41');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp41_delete1')->name('external.pengawasan.BMPs.monthly.bmp41');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp41_delete')->name('external.pengawasan.BMPs.monthly.bmp41.delete');
          });

        Route::prefix('bmp42')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp42_index')->name('external.pengawasan.BMPs.monthly.bmp42');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp42_insert')->name('external.pengawasan.BMPs.monthly.bmp42');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp42_delete1')->name('external.pengawasan.BMPs.monthly.bmp42');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp42_delete')->name('external.pengawasan.BMPs.monthly.bmp42.delete');
          });

        Route::prefix('bmp43')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp43_index')->name('external.pengawasan.BMPs.monthly.bmp43');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp43_insert')->name('external.pengawasan.BMPs.monthly.bmp43');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp43_delete1')->name('external.pengawasan.BMPs.monthly.bmp43');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp43_delete')->name('external.pengawasan.BMPs.monthly.bmp43.delete');
          });

        Route::prefix('bmp44')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp44_index')->name('external.pengawasan.BMPs.monthly.bmp44');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp44_insert')->name('external.pengawasan.BMPs.monthly.bmp44');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp44_delete1')->name('external.pengawasan.BMPs.monthly.bmp44');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp44_delete')->name('external.pengawasan.BMPs.monthly.bmp44.delete');
          });

        Route::prefix('bmp45')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp45_index')->name('external.pengawasan.BMPs.monthly.bmp45');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp45_insert')->name('external.pengawasan.BMPs.monthly.bmp45');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp45_delete1')->name('external.pengawasan.BMPs.monthly.bmp45');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp45_delete')->name('external.pengawasan.BMPs.monthly.bmp45.delete');
          });

        Route::prefix('bmp46')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp46_index')->name('external.pengawasan.BMPs.monthly.bmp46');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp46_insert')->name('external.pengawasan.BMPs.monthly.bmp46');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp46_delete1')->name('external.pengawasan.BMPs.monthly.bmp46');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp46_delete')->name('external.pengawasan.BMPs.monthly.bmp46.delete');
          });

        Route::prefix('bmp47')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp47_index')->name('external.pengawasan.BMPs.monthly.bmp47');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp47_insert')->name('external.pengawasan.BMPs.monthly.bmp47');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp47_delete1')->name('external.pengawasan.BMPs.monthly.bmp47');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp47_delete')->name('external.pengawasan.BMPs.monthly.bmp47.delete');
          });

        Route::prefix('bmp48')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp48_index')->name('external.pengawasan.BMPs.monthly.bmp48');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp48_insert')->name('external.pengawasan.BMPs.monthly.bmp48');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp48_delete1')->name('external.pengawasan.BMPs.monthly.bmp48');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp48_delete')->name('external.pengawasan.BMPs.monthly.bmp48.delete');
          });

        Route::prefix('bmp49')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp49_index')->name('external.pengawasan.BMPs.monthly.bmp49');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp49_insert')->name('external.pengawasan.BMPs.monthly.bmp49');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp49_delete1')->name('external.pengawasan.BMPs.monthly.bmp49');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp49_delete')->name('external.pengawasan.BMPs.monthly.bmp49.delete');
          });

        Route::prefix('bmp50')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp50_index')->name('external.pengawasan.BMPs.monthly.bmp50');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp50_insert')->name('external.pengawasan.BMPs.monthly.bmp50');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp50_delete1')->name('external.pengawasan.BMPs.monthly.bmp50');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp50_delete')->name('external.pengawasan.BMPs.monthly.bmp50.delete');
          });

        Route::prefix('bmp51')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp51_index')->name('external.pengawasan.BMPs.monthly.bmp51');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp51_insert')->name('external.pengawasan.BMPs.monthly.bmp51');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp51_delete1')->name('external.pengawasan.BMPs.monthly.bmp51');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp51_delete')->name('external.pengawasan.BMPs.monthly.bmp51.delete');
          });

        Route::prefix('bmp52')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp52_index')->name('external.pengawasan.BMPs.monthly.bmp52');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp52_insert')->name('external.pengawasan.BMPs.monthly.bmp52');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp52_delete1')->name('external.pengawasan.BMPs.monthly.bmp52');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp52_delete')->name('external.pengawasan.BMPs.monthly.bmp52.delete');
          });

        Route::prefix('bmp53')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp53_index')->name('external.pengawasan.BMPs.monthly.bmp53');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp53_insert')->name('external.pengawasan.BMPs.monthly.bmp53');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp53_delete1')->name('external.pengawasan.BMPs.monthly.bmp53');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp53_delete')->name('external.pengawasan.BMPs.monthly.bmp53.delete');
          });

        Route::prefix('bmp54')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp54_index')->name('external.pengawasan.BMPs.monthly.bmp54');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp54_insert')->name('external.pengawasan.BMPs.monthly.bmp54');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp54_delete1')->name('external.pengawasan.BMPs.monthly.bmp54');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp54_delete')->name('external.pengawasan.BMPs.monthly.bmp54.delete');
          });

        Route::prefix('bmp55')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp55_index')->name('external.pengawasan.BMPs.monthly.bmp55');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp55_insert')->name('external.pengawasan.BMPs.monthly.bmp55');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp55_delete1')->name('external.pengawasan.BMPs.monthly.bmp55');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp55_delete')->name('external.pengawasan.BMPs.monthly.bmp55.delete');
          });

        Route::prefix('bmp56')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp56_index')->name('external.pengawasan.BMPs.monthly.bmp56');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp56_insert')->name('external.pengawasan.BMPs.monthly.bmp56');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp56_delete1')->name('external.pengawasan.BMPs.monthly.bmp56');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp56_delete')->name('external.pengawasan.BMPs.monthly.bmp56.delete');
          });

        Route::prefix('bmp57')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp57_index')->name('external.pengawasan.BMPs.monthly.bmp57');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp57_insert')->name('external.pengawasan.BMPs.monthly.bmp57');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp57_delete1')->name('external.pengawasan.BMPs.monthly.bmp57');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp57_delete')->name('external.pengawasan.BMPs.monthly.bmp57.delete');
          });

        Route::prefix('bmp58')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp58_index')->name('external.pengawasan.BMPs.monthly.bmp58');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp58_insert')->name('external.pengawasan.BMPs.monthly.bmp58');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp58_delete1')->name('external.pengawasan.BMPs.monthly.bmp58');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp58_delete')->name('external.pengawasan.BMPs.monthly.bmp58.delete');
          });

        Route::prefix('bmp59')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp59_index')->name('external.pengawasan.BMPs.monthly.bmp59');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp59_insert')->name('external.pengawasan.BMPs.monthly.bmp59');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp59_delete1')->name('external.pengawasan.BMPs.monthly.bmp59');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp59_delete')->name('external.pengawasan.BMPs.monthly.bmp59.delete');
          });

        Route::prefix('bmp60')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp60_index')->name('external.pengawasan.BMPs.monthly.bmp60');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp60_insert')->name('external.pengawasan.BMPs.monthly.bmp60');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp60_delete1')->name('external.pengawasan.BMPs.monthly.bmp60');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp60_delete')->name('external.pengawasan.BMPs.monthly.bmp60.delete');
          });

        Route::prefix('bmp61')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp61_index')->name('external.pengawasan.BMPs.monthly.bmp61');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp61_insert')->name('external.pengawasan.BMPs.monthly.bmp61');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp61_delete1')->name('external.pengawasan.BMPs.monthly.bmp61');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp61_delete')->name('external.pengawasan.BMPs.monthly.bmp61.delete');
          });

        Route::prefix('bmp62')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp62_index')->name('external.pengawasan.BMPs.monthly.bmp62');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp62_insert')->name('external.pengawasan.BMPs.monthly.bmp62');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp62_delete1')->name('external.pengawasan.BMPs.monthly.bmp62');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp62_delete')->name('external.pengawasan.BMPs.monthly.bmp62.delete');
          });

        Route::prefix('bmp63')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp63_index')->name('external.pengawasan.BMPs.monthly.bmp63');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp63_insert')->name('external.pengawasan.BMPs.monthly.bmp63');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp63_delete1')->name('external.pengawasan.BMPs.monthly.bmp63');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp63_delete')->name('external.pengawasan.BMPs.monthly.bmp63.delete');
          });

        Route::prefix('bmp64')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp64_index')->name('external.pengawasan.BMPs.monthly.bmp64');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp64_insert')->name('external.pengawasan.BMPs.monthly.bmp64');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp64_delete1')->name('external.pengawasan.BMPs.monthly.bmp64');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp64_delete')->name('external.pengawasan.BMPs.monthly.bmp64.delete');
          });

        Route::prefix('bmp65')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp65_index')->name('external.pengawasan.BMPs.monthly.bmp65');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp65_insert')->name('external.pengawasan.BMPs.monthly.bmp65');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp65_delete1')->name('external.pengawasan.BMPs.monthly.bmp65');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp65_delete')->name('external.pengawasan.BMPs.monthly.bmp65.delete');
          });

        Route::prefix('bmp66')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp66_index')->name('external.pengawasan.BMPs.monthly.bmp66');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp66_insert')->name('external.pengawasan.BMPs.monthly.bmp66');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp66_delete1')->name('external.pengawasan.BMPs.monthly.bmp66');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp66_delete')->name('external.pengawasan.BMPs.monthly.bmp66.delete');
          });

        Route::prefix('bmp67')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp67_index')->name('external.pengawasan.BMPs.monthly.bmp67');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp67_insert')->name('external.pengawasan.BMPs.monthly.bmp67');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp67_delete1')->name('external.pengawasan.BMPs.monthly.bmp67');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp67_delete')->name('external.pengawasan.BMPs.monthly.bmp67.delete');
          });

        Route::prefix('bmp68')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp68_index')->name('external.pengawasan.BMPs.monthly.bmp68');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp68_insert')->name('external.pengawasan.BMPs.monthly.bmp68');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp68_delete1')->name('external.pengawasan.BMPs.monthly.bmp68');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp68_delete')->name('external.pengawasan.BMPs.monthly.bmp68.delete');
          });

        Route::prefix('bmp69')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp69_index')->name('external.pengawasan.BMPs.monthly.bmp69');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp69_insert')->name('external.pengawasan.BMPs.monthly.bmp69');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp69_delete1')->name('external.pengawasan.BMPs.monthly.bmp69');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp69_delete')->name('external.pengawasan.BMPs.monthly.bmp69.delete');
          });

        Route::prefix('bmp70')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp70_index')->name('external.pengawasan.BMPs.monthly.bmp70');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp70_insert')->name('external.pengawasan.BMPs.monthly.bmp70');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp70_delete1')->name('external.pengawasan.BMPs.monthly.bmp70');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp70_delete')->name('external.pengawasan.BMPs.monthly.bmp70.delete');
          });

        Route::prefix('bmp71')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp71_index')->name('external.pengawasan.BMPs.monthly.bmp71');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp71_insert')->name('external.pengawasan.BMPs.monthly.bmp71');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp71_delete1')->name('external.pengawasan.BMPs.monthly.bmp71');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp71_delete')->name('external.pengawasan.BMPs.monthly.bmp71.delete');
          });

        Route::prefix('bmp72')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp72_index')->name('external.pengawasan.BMPs.monthly.bmp72');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp72_insert')->name('external.pengawasan.BMPs.monthly.bmp72');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp72_delete1')->name('external.pengawasan.BMPs.monthly.bmp72');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp72_delete')->name('external.pengawasan.BMPs.monthly.bmp72.delete');
          });

        Route::prefix('bmp73')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp73_index')->name('external.pengawasan.BMPs.monthly.bmp73');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp73_insert')->name('external.pengawasan.BMPs.monthly.bmp73');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp73_3elete1')->name('external.pengawasan.BMPs.monthly.bmp73');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp73_delete')->name('external.pengawasan.BMPs.monthly.bmp73.delete');
          });

        Route::prefix('bmp74')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp74_index')->name('external.pengawasan.BMPs.monthly.bmp74');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp74_insert')->name('external.pengawasan.BMPs.monthly.bmp74');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp74_delete1')->name('external.pengawasan.BMPs.monthly.bmp74');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp74_delete')->name('external.pengawasan.BMPs.monthly.bmp74.delete');
          });

        Route::prefix('bmp75')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp75_index')->name('external.pengawasan.BMPs.monthly.bmp75');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp75_insert')->name('external.pengawasan.BMPs.monthly.bmp75');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp75_delete1')->name('external.pengawasan.BMPs.monthly.bmp75');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp75_delete')->name('external.pengawasan.BMPs.monthly.bmp75.delete');
          });

        Route::prefix('bmp76')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp76_index')->name('external.pengawasan.BMPs.monthly.bmp76');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp76_insert')->name('external.pengawasan.BMPs.monthly.bmp76');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp76_delete1')->name('external.pengawasan.BMPs.monthly.bmp76');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp76_delete')->name('external.pengawasan.BMPs.monthly.bmp76.delete');
          });

        Route::prefix('bmp77')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp77_index')->name('external.pengawasan.BMPs.monthly.bmp77');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp77_insert')->name('external.pengawasan.BMPs.monthly.bmp77');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp77_delete1')->name('external.pengawasan.BMPs.monthly.bmp77');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp77_delete')->name('external.pengawasan.BMPs.monthly.bmp77.delete');
          });

        Route::prefix('bmp78')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp78_index')->name('external.pengawasan.BMPs.monthly.bmp78');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp78_insert')->name('external.pengawasan.BMPs.monthly.bmp78');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp78_delete1')->name('external.pengawasan.BMPs.monthly.bmp78');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp78_delete')->name('external.pengawasan.BMPs.monthly.bmp78.delete');
          });

        Route::prefix('bmp79')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp79_index')->name('external.pengawasan.BMPs.monthly.bmp79');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp79_insert')->name('external.pengawasan.BMPs.monthly.bmp79');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp79_delete1')->name('external.pengawasan.BMPs.monthly.bmp79');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp79_delete')->name('external.pengawasan.BMPs.monthly.bmp79.delete');
          });

        Route::prefix('bmp80')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp80_index')->name('external.pengawasan.BMPs.monthly.bmp80');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp80_insert')->name('external.pengawasan.BMPs.monthly.bmp80');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp80_delete1')->name('external.pengawasan.BMPs.monthly.bmp80');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp80_delete')->name('external.pengawasan.BMPs.monthly.bmp80.delete');
          });

        Route::prefix('bmp81')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp81_index')->name('external.pengawasan.BMPs.monthly.bmp81');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp81_insert')->name('external.pengawasan.BMPs.monthly.bmp81');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp81_delete1')->name('external.pengawasan.BMPs.monthly.bmp81');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp81_delete')->name('external.pengawasan.BMPs.monthly.bmp81.delete');
          });

        Route::prefix('bmp82')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp82_index')->name('external.pengawasan.BMPs.monthly.bmp82');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp82_insert')->name('external.pengawasan.BMPs.monthly.bmp82');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp82_delete1')->name('external.pengawasan.BMPs.monthly.bmp82');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp82_delete')->name('external.pengawasan.BMPs.monthly.bmp82.delete');
          });

        Route::prefix('bmp83')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp83_index')->name('external.pengawasan.BMPs.monthly.bmp83');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp83_insert')->name('external.pengawasan.BMPs.monthly.bmp83');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp83_delete1')->name('external.pengawasan.BMPs.monthly.bmp83');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp83_delete')->name('external.pengawasan.BMPs.monthly.bmp83.delete');
          });

        Route::prefix('bmp84')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp84_index')->name('external.pengawasan.BMPs.monthly.bmp84');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp84_insert')->name('external.pengawasan.BMPs.monthly.bmp84');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp84_delete1')->name('external.pengawasan.BMPs.monthly.bmp84');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp84_delete')->name('external.pengawasan.BMPs.monthly.bmp84.delete');
          });

        Route::prefix('bmp85')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp85_index')->name('external.pengawasan.BMPs.monthly.bmp85');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp85_insert')->name('external.pengawasan.BMPs.monthly.bmp85');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp85_delete1')->name('external.pengawasan.BMPs.monthly.bmp85');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp85_delete')->name('external.pengawasan.BMPs.monthly.bmp85.delete');
          });

        Route::prefix('bmp86')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp86_index')->name('external.pengawasan.BMPs.monthly.bmp86');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp86_insert')->name('external.pengawasan.BMPs.monthly.bmp86');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp86_delete1')->name('external.pengawasan.BMPs.monthly.bmp86');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp86_delete')->name('external.pengawasan.BMPs.monthly.bmp86.delete');
          });

        Route::prefix('bmp87')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp87_index')->name('external.pengawasan.BMPs.monthly.bmp87');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp87_insert')->name('external.pengawasan.BMPs.monthly.bmp87');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp87_delete1')->name('external.pengawasan.BMPs.monthly.bmp87');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp87_delete')->name('external.pengawasan.BMPs.monthly.bmp87.delete');
          });

        Route::prefix('bmp88')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp88_index')->name('external.pengawasan.BMPs.monthly.bmp88');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp88_insert')->name('external.pengawasan.BMPs.monthly.bmp88');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp88_delete1')->name('external.pengawasan.BMPs.monthly.bmp88');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp88_delete')->name('external.pengawasan.BMPs.monthly.bmp88.delete');
          });

        Route::prefix('bmp89')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp89_index')->name('external.pengawasan.BMPs.monthly.bmp89');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp89_insert')->name('external.pengawasan.BMPs.monthly.bmp89');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp89_delete1')->name('external.pengawasan.BMPs.monthly.bmp89');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp89_delete')->name('external.pengawasan.BMPs.monthly.bmp89.delete');
          });

        Route::prefix('bmp90')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp90_index')->name('external.pengawasan.BMPs.monthly.bmp90');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp90_insert')->name('external.pengawasan.BMPs.monthly.bmp90');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp90_delete1')->name('external.pengawasan.BMPs.monthly.bmp90');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp90_delete')->name('external.pengawasan.BMPs.monthly.bmp90.delete');
          });

        Route::prefix('bmp91')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp91_index')->name('external.pengawasan.BMPs.monthly.bmp91');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp91_insert')->name('external.pengawasan.BMPs.monthly.bmp91');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp91_delete1')->name('external.pengawasan.BMPs.monthly.bmp91');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp91_delete')->name('external.pengawasan.BMPs.monthly.bmp91.delete');
          });

        Route::prefix('bmp92')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp92_index')->name('external.pengawasan.BMPs.monthly.bmp92');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp92_insert')->name('external.pengawasan.BMPs.monthly.bmp92');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp92_delete1')->name('external.pengawasan.BMPs.monthly.bmp92');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp92_delete')->name('external.pengawasan.BMPs.monthly.bmp92.delete');
          });

        Route::prefix('bmp93')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp93_index')->name('external.pengawasan.BMPs.monthly.bmp93');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp93_insert')->name('external.pengawasan.BMPs.monthly.bmp93');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp93_delete1')->name('external.pengawasan.BMPs.monthly.bmp93');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp93_delete')->name('external.pengawasan.BMPs.monthly.bmp93.delete');
          });

        Route::prefix('bmp94')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp94_index')->name('external.pengawasan.BMPs.monthly.bmp94');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp94_insert')->name('external.pengawasan.BMPs.monthly.bmp94');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp94_delete1')->name('external.pengawasan.BMPs.monthly.bmp94');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp94_delete')->name('external.pengawasan.BMPs.monthly.bmp94.delete');
          });

        Route::prefix('bmp95')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp95_index')->name('external.pengawasan.BMPs.monthly.bmp95');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp95_insert')->name('external.pengawasan.BMPs.monthly.bmp95');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp95_delete1')->name('external.pengawasan.BMPs.monthly.bmp95');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp95_delete')->name('external.pengawasan.BMPs.monthly.bmp95.delete');
          });

        Route::prefix('bmp96')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp96_index')->name('external.pengawasan.BMPs.monthly.bmp96');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp96_insert')->name('external.pengawasan.BMPs.monthly.bmp96');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp96_delete1')->name('external.pengawasan.BMPs.monthly.bmp96');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp96_delete')->name('external.pengawasan.BMPs.monthly.bmp96.delete');
          });

        Route::prefix('bmp97')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp97_index')->name('external.pengawasan.BMPs.monthly.bmp97');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp97_insert')->name('external.pengawasan.BMPs.monthly.bmp97');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp97_delete1')->name('external.pengawasan.BMPs.monthly.bmp97');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp97_delete')->name('external.pengawasan.BMPs.monthly.bmp97.delete');
          });

        Route::prefix('bmp98')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp98_index')->name('external.pengawasan.BMPs.monthly.bmp98');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp98_insert')->name('external.pengawasan.BMPs.monthly.bmp98');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp98_delete1')->name('external.pengawasan.BMPs.monthly.bmp98');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp98_delete')->name('external.pengawasan.BMPs.monthly.bmp98.delete');
          });

        Route::prefix('bmp99')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp99_index')->name('external.pengawasan.BMPs.monthly.bmp99');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp99_insert')->name('external.pengawasan.BMPs.monthly.bmp99');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp99_delete1')->name('external.pengawasan.BMPs.monthly.bmp99');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp99_delete')->name('external.pengawasan.BMPs.monthly.bmp99.delete');
          });

        Route::prefix('bmp100')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp100_index')->name('external.pengawasan.BMPs.monthly.bmp100');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp100_insert')->name('external.pengawasan.BMPs.monthly.bmp100');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp100_delete1')->name('external.pengawasan.BMPs.monthly.bmp100');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp100_delete')->name('external.pengawasan.BMPs.monthly.bmp100.delete');
          });

        Route::prefix('bmp101')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp101_index')->name('external.pengawasan.BMPs.monthly.bmp101');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp101_insert')->name('external.pengawasan.BMPs.monthly.bmp101');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp101_delete1')->name('external.pengawasan.BMPs.monthly.bmp101');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp101_delete')->name('external.pengawasan.BMPs.monthly.bmp101.delete');
          });

        Route::prefix('bmp102')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp102_index')->name('external.pengawasan.BMPs.monthly.bmp102');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp102_insert')->name('external.pengawasan.BMPs.monthly.bmp102');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp102_delete1')->name('external.pengawasan.BMPs.monthly.bmp102');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp102_delete')->name('external.pengawasan.BMPs.monthly.bmp102.delete');
          });

        Route::prefix('bmp103')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp103_index')->name('external.pengawasan.BMPs.monthly.bmp103');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp103_insert')->name('external.pengawasan.BMPs.monthly.bmp103');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp103_delete1')->name('external.pengawasan.BMPs.monthly.bmp103');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp103_delete')->name('external.pengawasan.BMPs.monthly.bmp103.delete');
          });

        Route::prefix('bmp104')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp104_index')->name('external.pengawasan.BMPs.monthly.bmp104');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp104_insert')->name('external.pengawasan.BMPs.monthly.bmp104');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp104_delete1')->name('external.pengawasan.BMPs.monthly.bmp104');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp104_delete')->name('external.pengawasan.BMPs.monthly.bmp104.delete');
          });

        Route::prefix('bmp105')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp105_index')->name('external.pengawasan.BMPs.monthly.bmp105');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp105_insert')->name('external.pengawasan.BMPs.monthly.bmp105');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp105_delete1')->name('external.pengawasan.BMPs.monthly.bmp105');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp105_delete')->name('external.pengawasan.BMPs.monthly.bmp105.delete');
          });

        Route::prefix('bmp106')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp106_index')->name('external.pengawasan.BMPs.monthly.bmp106');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp106_insert')->name('external.pengawasan.BMPs.monthly.bmp106');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp106_delete1')->name('external.pengawasan.BMPs.monthly.bmp106');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp106_delete')->name('external.pengawasan.BMPs.monthly.bmp106.delete');
          });

        Route::prefix('bmp107')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp107_index')->name('external.pengawasan.BMPs.monthly.bmp107');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp107_insert')->name('external.pengawasan.BMPs.monthly.bmp107');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp107_delete1')->name('external.pengawasan.BMPs.monthly.bmp107');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp107_delete')->name('external.pengawasan.BMPs.monthly.bmp107.delete');
          });

        Route::prefix('bmp108')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp108_index')->name('external.pengawasan.BMPs.monthly.bmp108');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp108_insert')->name('external.pengawasan.BMPs.monthly.bmp108');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp108_delete1')->name('external.pengawasan.BMPs.monthly.bmp108');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp108_delete')->name('external.pengawasan.BMPs.monthly.bmp108.delete');
          });

        Route::prefix('bmp109')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp109_index')->name('external.pengawasan.BMPs.monthly.bmp109');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp109_insert')->name('external.pengawasan.BMPs.monthly.bmp109');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp109_delete1')->name('external.pengawasan.BMPs.monthly.bmp109');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp109_delete')->name('external.pengawasan.BMPs.monthly.bmp109.delete');
          });

        Route::prefix('bmp110')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp110_index')->name('external.pengawasan.BMPs.monthly.bmp110');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp110_insert')->name('external.pengawasan.BMPs.monthly.bmp110');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp110_delete1')->name('external.pengawasan.BMPs.monthly.bmp110');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp100_delete')->name('external.pengawasan.BMPs.monthly.bmp110.delete');
          });

        Route::prefix('bmp111')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp111_index')->name('external.pengawasan.BMPs.monthly.bmp111');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp111_insert')->name('external.pengawasan.BMPs.monthly.bmp111');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp111_delete1')->name('external.pengawasan.BMPs.monthly.bmp111');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp111_delete')->name('external.pengawasan.BMPs.monthly.bmp111.delete');
          });

        Route::prefix('bmp112')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp112_index')->name('external.pengawasan.BMPs.monthly.bmp112');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp112_insert')->name('external.pengawasan.BMPs.monthly.bmp112');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp112_delete1')->name('external.pengawasan.BMPs.monthly.bmp112');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp112_delete')->name('external.pengawasan.BMPs.monthly.bmp112.delete');
          });

        Route::prefix('bmp113')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp113_index')->name('external.pengawasan.BMPs.monthly.bmp113');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp113_insert')->name('external.pengawasan.BMPs.monthly.bmp113');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp113_delete1')->name('external.pengawasan.BMPs.monthly.bmp113');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp113_delete')->name('external.pengawasan.BMPs.monthly.bmp113.delete');
          });

        Route::prefix('bmp114')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp114_index')->name('external.pengawasan.BMPs.monthly.bmp114');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp114_insert')->name('external.pengawasan.BMPs.monthly.bmp114');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp114_delete1')->name('external.pengawasan.BMPs.monthly.bmp114');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp114_delete')->name('external.pengawasan.BMPs.monthly.bmp114.delete');
          });

        Route::prefix('bmp115')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPController@bmp115_index')->name('external.pengawasan.BMPs.monthly.bmp115');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPController@bmp115_insert')->name('external.pengawasan.BMPs.monthly.bmp115');
          Route::delete('', 'External\Pengawasan\BMP\BMPController@bmp115_delete1')->name('external.pengawasan.BMPs.monthly.bmp115');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPController@bmp115_delete')->name('external.pengawasan.BMPs.monthly.bmp115.delete');
          });
  		});
    });


    Route::prefix('rainy')->group(function () {
      Route::post('tarikh', 'External\Pengawasan\BMP\BMPRainyController@tarikhtambahrainy')->name('external.pengawasan.BMPs.rainy.tarikh.tambah');
      Route::get('bmp_rain/{id}', 'External\Pengawasan\BMP\BMPRainyController@maklumatborangrainy')->name('external.pengawasan.BMPs.rainy.bmp_rain');
      Route::get('bmp_rainview/{id}', 'External\Pengawasan\BMP\BMPRainyController@maklumatborangrainyview')->name('external.pengawasan.BMPs.rainy.bmp_rainview');
      Route::post('simpanmaklumatborangrainy', 'External\Pengawasan\BMP\BMPRainyController@simpanmaklumatborangrainy')->name('external.pengawasan.BMPs.pemantauan_bmps.simpanmaklumatborangrainy');
      Route::get('pemantauan_bmps/hantarmaklumatrainy/{id}', 'External\Pengawasan\BMP\BMPRainyController@hantarmaklumatrainy')->name('external.pengawasan.BMPs.pemantauan_bmps.hantarmaklumatrainy');
      Route::get('pemantauan_bmps/hantarmaklumatrainypp/{id}', 'External\Pengawasan\BMP\BMPRainyController@hantarmaklumatrainypp')->name('external.pengawasan.BMPs.pemantauan_bmps.hantarmaklumatrainypp');
      Route::get('status_bmps', 'External\Pengawasan\BMP\BMPRainyController@status_bmpsrainy')->name('external.pengawasan.BMPs.rainy.status_bmps');
      Route::get('view_bmpsrain/{id}', 'External\Pengawasan\BMP\BMPRainyController@view_bmpsrain')->name('external.pengawasan.BMPs.view_bmpsrain');
      Route::get('listrainy/{id}', 'External\Pengawasan\BMP\BMPRainyController@listrainy')->name('external.pengawasan.BMPs.listrainy');
      Route::get('remove/{id}', 'External\Pengawasan\BMP\BMPRainyController@remove')->name('external.pengawasan.BMPs.remove');
      Route::get('hantarMaklumatBorangrainy/{id}', 'External\Pengawasan\BMP\BMPRainyController@hantarMaklumatBorangrainy')->name('external.pengawasan.BMPs.hantarMaklumatBorangrainy');
      Route::get('hantarMaklumatBorangrainypp/{id}', 'External\Pengawasan\BMP\BMPRainyController@hantarMaklumatBorangrainypp')->name('external.pengawasan.BMPs.hantarMaklumatBorangrainypp');
      Route::get('BMPS_rainy_pakej/{bulan}/{tahun}/{projekid}/{pakejid}', 'External\Pengawasan\BMP\BMPRainyController@BMPS_rainy_pakej')->name('external.pengawasan.BMPs.BMPS_rainy_pakej');
      Route::get('tab1view/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab1_indexview')->name('external.pengawasan.BMPs.rainy.tab1view');
      Route::get('tab2view/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab2_indexview')->name('external.pengawasan.BMPs.rainy.tab2view');
      Route::get('tab3view/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab3_indexview')->name('external.pengawasan.BMPs.rainy.tab3view');
      Route::get('tab4view/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab4_indexview')->name('external.pengawasan.BMPs.rainy.tab4view');
      Route::get('tab5view/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab5_indexview')->name('external.pengawasan.BMPs.rainy.tab5view');
      Route::get('janapdf_semua/{id}', 'External\Pengawasan\BMP\BMPRainyController@janapdf_semua')->name('external.pengawasan.BMPs.rainy.janapdf_semua');
      Route::prefix('tab1')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab1_index')->name('external.pengawasan.BMPs.rainy.tab1');
		  Route::get('/janapdf_tab1/{id}', 'External\Pengawasan\BMP\BMPRainyController@janapdf_tab1')->name('external.pengawasan.BMPs.rainy.tab1.janapdf_tab1');
          });

      Route::prefix('tab2')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab2_index')->name('external.pengawasan.BMPs.rainy.tab2');
		  Route::get('/janapdf_tab2/{id}', 'External\Pengawasan\BMP\BMPRainyController@janapdf_tab2')->name('external.pengawasan.BMPs.rainy.tab2.janapdf_tab2');
          });

      Route::prefix('tab3')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab3_index')->name('external.pengawasan.BMPs.rainy.tab3');
		  Route::get('/janapdf_tab3/{id}', 'External\Pengawasan\BMP\BMPRainyController@janapdf_tab3')->name('external.pengawasan.BMPs.rainy.tab3.janapdf_tab3');
          });

      Route::prefix('tab4')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab4_index')->name('external.pengawasan.BMPs.rainy.tab4');
		  Route::get('/janapdf_tab4/{id}', 'External\Pengawasan\BMP\BMPRainyController@janapdf_tab4')->name('external.pengawasan.BMPs.rainy.tab4.janapdf_tab4');
          });

      Route::prefix('tab5')->group(function () {
          Route::get('/{id}', 'External\Pengawasan\BMP\BMPRainyController@tab5_index')->name('external.pengawasan.BMPs.rainy.tab5');
		  Route::get('/janapdf_tab5/{id}', 'External\Pengawasan\BMP\BMPRainyController@janapdf_tab5')->name('external.pengawasan.BMPs.rainy.tab5.janapdf_tab5');
          });
      
      Route::prefix('attachment')->group(function () {
        Route::prefix('bmp1')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp1_index')->name('external.pengawasan.BMPs.rainy.bmp1');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp1_insert')->name('external.pengawasan.BMPs.rainy.bmp1');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp1_delete1')->name('external.pengawasan.BMPs.rainy.bmp1');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp1_delete')->name('external.pengawasan.BMPs.rainy.bmp1.delete');
          });

        Route::prefix('bmp2')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp2_index')->name('external.pengawasan.BMPs.rainy.bmp2');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp2_insert')->name('external.pengawasan.BMPs.rainy.bmp2');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp2_delete1')->name('external.pengawasan.BMPs.rainy.bmp2');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp2_delete')->name('external.pengawasan.BMPs.rainy.bmp2.delete');
          });

        Route::prefix('bmp3')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp3_index')->name('external.pengawasan.BMPs.rainy.bmp3');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp3_insert')->name('external.pengawasan.BMPs.rainy.bmp3');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp3_delete1')->name('external.pengawasan.BMPs.rainy.bmp3');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp3_delete')->name('external.pengawasan.BMPs.rainy.bmp3.delete');
          });

        Route::prefix('bmp4')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp4_index')->name('external.pengawasan.BMPs.rainy.bmp4');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp4_insert')->name('external.pengawasan.BMPs.rainy.bmp4');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp4_delete1')->name('external.pengawasan.BMPs.rainy.bmp4');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp4_delete')->name('external.pengawasan.BMPs.rainy.bmp4.delete');
          });

        Route::prefix('bmp5')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp5_index')->name('external.pengawasan.BMPs.rainy.bmp5');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp5_insert')->name('external.pengawasan.BMPs.rainy.bmp5');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp5_delete1')->name('external.pengawasan.BMPs.rainy.bmp5');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp5_delete')->name('external.pengawasan.BMPs.rainy.bmp5.delete');
          });

        Route::prefix('bmp6')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp6_index')->name('external.pengawasan.BMPs.rainy.bmp6');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp6_insert')->name('external.pengawasan.BMPs.rainy.bmp6');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp6_delete1')->name('external.pengawasan.BMPs.rainy.bmp6');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp6_delete')->name('external.pengawasan.BMPs.rainy.bmp6.delete');
          });

        Route::prefix('bmp7')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp7_index')->name('external.pengawasan.BMPs.rainy.bmp7');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp7_insert')->name('external.pengawasan.BMPs.rainy.bmp7');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp7_delete1')->name('external.pengawasan.BMPs.rainy.bmp7');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp7_delete')->name('external.pengawasan.BMPs.rainy.bmp7.delete');
          });

        Route::prefix('bmp8')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp8_index')->name('external.pengawasan.BMPs.rainy.bmp8');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp8_insert')->name('external.pengawasan.BMPs.rainy.bmp8');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp8_delete1')->name('external.pengawasan.BMPs.rainy.bmp8');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp8_delete')->name('external.pengawasan.BMPs.rainy.bmp8.delete');
          });

        Route::prefix('bmp9')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp9_index')->name('external.pengawasan.BMPs.rainy.bmp9');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp9_insert')->name('external.pengawasan.BMPs.rainy.bmp9');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp9_delete1')->name('external.pengawasan.BMPs.rainy.bmp9');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp9_delete')->name('external.pengawasan.BMPs.rainy.bmp9.delete');
          });

        Route::prefix('bmp10')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp10_index')->name('external.pengawasan.BMPs.rainy.bmp10');
    			Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp10_insert')->name('external.pengawasan.BMPs.rainy.bmp10');
    			Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp10_delete1')->name('external.pengawasan.BMPs.rainy.bmp10');
          Route::get('rainy/delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp10_delete')->name('external.pengawasan.BMPs.rainy.bmp10.delete');
          });

        Route::prefix('bmp11')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp11_index')->name('external.pengawasan.BMPs.rainy.bmp11');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp11_insert')->name('external.pengawasan.BMPs.rainy.bmp11');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp11_delete1')->name('external.pengawasan.BMPs.rainy.bmp11');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp11_delete')->name('external.pengawasan.BMPs.rainy.bmp11.delete');
          });

        Route::prefix('bmp12')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp12_index')->name('external.pengawasan.BMPs.rainy.bmp12');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp12_insert')->name('external.pengawasan.BMPs.rainy.bmp12');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp12_delete1')->name('external.pengawasan.BMPs.rainy.bmp12');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp12_delete')->name('external.pengawasan.BMPs.rainy.bmp12.delete');
          });

        Route::prefix('bmp13')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp13_index')->name('external.pengawasan.BMPs.rainy.bmp13');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp13_insert')->name('external.pengawasan.BMPs.rainy.bmp13');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp13_delete1')->name('external.pengawasan.BMPs.rainy.bmp13');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp13_delete')->name('external.pengawasan.BMPs.rainy.bmp13.delete');
          });

        Route::prefix('bmp14')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp14_index')->name('external.pengawasan.BMPs.rainy.bmp14');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp14_insert')->name('external.pengawasan.BMPs.rainy.bmp14');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp14_delete1')->name('external.pengawasan.BMPs.rainy.bmp14');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp14_delete')->name('external.pengawasan.BMPs.rainy.bmp14.delete');
          });

        Route::prefix('bmp15')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp15_index')->name('external.pengawasan.BMPs.rainy.bmp15');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp15_insert')->name('external.pengawasan.BMPs.rainy.bmp15');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp15_delete1')->name('external.pengawasan.BMPs.rainy.bmp15');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp15_delete')->name('external.pengawasan.BMPs.rainy.bmp15.delete');
          });

        Route::prefix('bmp16')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp16_index')->name('external.pengawasan.BMPs.rainy.bmp16');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp16_insert')->name('external.pengawasan.BMPs.rainy.bmp16');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp16_delete1')->name('external.pengawasan.BMPs.rainy.bmp16');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp16_delete')->name('external.pengawasan.BMPs.rainy.bmp16.delete');
          });

        Route::prefix('bmp17')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp17_index')->name('external.pengawasan.BMPs.rainy.bmp17');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp17_insert')->name('external.pengawasan.BMPs.rainy.bmp17');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp17_delete1')->name('external.pengawasan.BMPs.rainy.bmp17');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp17_delete')->name('external.pengawasan.BMPs.rainy.bmp17.delete');
          });

        Route::prefix('bmp18')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp18_index')->name('external.pengawasan.BMPs.rainy.bmp18');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp18_insert')->name('external.pengawasan.BMPs.rainy.bmp18');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp18_delete1')->name('external.pengawasan.BMPs.rainy.bmp18');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp18_delete')->name('external.pengawasan.BMPs.rainy.bmp18.delete');
          });

        Route::prefix('bmp19')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp19_index')->name('external.pengawasan.BMPs.rainy.bmp19');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp19_insert')->name('external.pengawasan.BMPs.rainy.bmp19');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp19_delete1')->name('external.pengawasan.BMPs.rainy.bmp19');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp19_delete')->name('external.pengawasan.BMPs.rainy.bmp19.delete');
          });

        Route::prefix('bmp20')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp20_index')->name('external.pengawasan.BMPs.rainy.bmp20');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp20_insert')->name('external.pengawasan.BMPs.rainy.bmp20');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp20_delete1')->name('external.pengawasan.BMPs.rainy.bmp20');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp20_delete')->name('external.pengawasan.BMPs.rainy.bmp20.delete');
          });

        Route::prefix('bmp21')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp21_index')->name('external.pengawasan.BMPs.rainy.bmp21');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp21_insert')->name('external.pengawasan.BMPs.rainy.bmp21');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp21_delete1')->name('external.pengawasan.BMPs.rainy.bmp21');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp21_delete')->name('external.pengawasan.BMPs.rainy.bmp21.delete');
          });

        Route::prefix('bmp22')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp22_index')->name('external.pengawasan.BMPs.rainy.bmp22');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp22_insert')->name('external.pengawasan.BMPs.rainy.bmp22');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp21_delete1')->name('external.pengawasan.BMPs.rainy.bmp22');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp22_delete')->name('external.pengawasan.BMPs.rainy.bmp22.delete');
          });

        Route::prefix('bmp23')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp23_index')->name('external.pengawasan.BMPs.rainy.bmp23');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp23_insert')->name('external.pengawasan.BMPs.rainy.bmp23');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp23_delete1')->name('external.pengawasan.BMPs.rainy.bmp23');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp23_delete')->name('external.pengawasan.BMPs.rainy.bmp23.delete');
          });

        Route::prefix('bmp24')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp24_index')->name('external.pengawasan.BMPs.rainy.bmp24');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp24_insert')->name('external.pengawasan.BMPs.rainy.bmp24');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp24_delete1')->name('external.pengawasan.BMPs.rainy.bmp24');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp24_delete')->name('external.pengawasan.BMPs.rainy.bmp24.delete');
          });

        Route::prefix('bmp25')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp25_index')->name('external.pengawasan.BMPs.rainy.bmp25');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp25_insert')->name('external.pengawasan.BMPs.rainy.bmp25');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp25_delete1')->name('external.pengawasan.BMPs.rainy.bmp25');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp25_delete')->name('external.pengawasan.BMPs.rainy.bmp25.delete');
          });

        Route::prefix('bmp26')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp26_index')->name('external.pengawasan.BMPs.rainy.bmp26');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp26_insert')->name('external.pengawasan.BMPs.rainy.bmp26');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp26_delete1')->name('external.pengawasan.BMPs.rainy.bmp26');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp26_delete')->name('external.pengawasan.BMPs.rainy.bmp26.delete');
          });

        Route::prefix('bmp27')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp27_index')->name('external.pengawasan.BMPs.rainy.bmp27');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp27_insert')->name('external.pengawasan.BMPs.rainy.bmp27');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp25_delete1')->name('external.pengawasan.BMPs.rainy.bmp27');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp25_delete')->name('external.pengawasan.BMPs.rainy.bmp27.delete');
          });

        Route::prefix('bmp28')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp28_index')->name('external.pengawasan.BMPs.rainy.bmp28');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp28_insert')->name('external.pengawasan.BMPs.rainy.bmp28');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp28_delete1')->name('external.pengawasan.BMPs.rainy.bmp28');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp28_delete')->name('external.pengawasan.BMPs.rainy.bmp28.delete');
          });

        Route::prefix('bmp29')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp29_index')->name('external.pengawasan.BMPs.rainy.bmp29');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp29_insert')->name('external.pengawasan.BMPs.rainy.bmp29');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp29_delete1')->name('external.pengawasan.BMPs.rainy.bmp29');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp29_delete')->name('external.pengawasan.BMPs.rainy.bmp29.delete');
          });

        Route::prefix('bmp30')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp30_index')->name('external.pengawasan.BMPs.rainy.bmp30');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp30_insert')->name('external.pengawasan.BMPs.rainy.bmp30');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp30_delete1')->name('external.pengawasan.BMPs.rainy.bmp30');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp30_delete')->name('external.pengawasan.BMPs.rainy.bmp30.delete');
          });

        Route::prefix('bmp31')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp31_index')->name('external.pengawasan.BMPs.rainy.bmp31');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp31_insert')->name('external.pengawasan.BMPs.rainy.bmp31');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp31_delete1')->name('external.pengawasan.BMPs.rainy.bmp31');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp31_delete')->name('external.pengawasan.BMPs.rainy.bmp31.delete');
          });

        Route::prefix('bmp32')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp32_index')->name('external.pengawasan.BMPs.rainy.bmp32');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp32_insert')->name('external.pengawasan.BMPs.rainy.bmp32');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp32_delete1')->name('external.pengawasan.BMPs.rainy.bmp32');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp32_delete')->name('external.pengawasan.BMPs.rainy.bmp32.delete');
          });

        Route::prefix('bmp33')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp33_index')->name('external.pengawasan.BMPs.rainy.bmp33');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp33_insert')->name('external.pengawasan.BMPs.rainy.bmp33');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp33_delete1')->name('external.pengawasan.BMPs.rainy.bmp33');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp33_delete')->name('external.pengawasan.BMPs.rainy.bmp33.delete');
          });

        Route::prefix('bmp34')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp34_index')->name('external.pengawasan.BMPs.rainy.bmp34');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp34_insert')->name('external.pengawasan.BMPs.rainy.bmp34');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp34_delete1')->name('external.pengawasan.BMPs.rainy.bmp34');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp34_delete')->name('external.pengawasan.BMPs.rainy.bmp34.delete');
          });

        Route::prefix('bmp35')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp35_index')->name('external.pengawasan.BMPs.rainy.bmp35');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp35_insert')->name('external.pengawasan.BMPs.rainy.bmp35');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp35_delete1')->name('external.pengawasan.BMPs.rainy.bmp35');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp35_delete')->name('external.pengawasan.BMPs.rainy.bmp35.delete');
          });

        Route::prefix('bmp36')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp36_index')->name('external.pengawasan.BMPs.rainy.bmp36');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp36_insert')->name('external.pengawasan.BMPs.rainy.bmp36');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp36_delete1')->name('external.pengawasan.BMPs.rainy.bmp36');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp36_delete')->name('external.pengawasan.BMPs.rainy.bmp36.delete');
          });

        Route::prefix('bmp37')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp37_index')->name('external.pengawasan.BMPs.rainy.bmp37');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp37_insert')->name('external.pengawasan.BMPs.rainy.bmp37');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp37_delete1')->name('external.pengawasan.BMPs.rainy.bmp37');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp37_delete')->name('external.pengawasan.BMPs.rainy.bmp37.delete');
          });

        Route::prefix('bmp38')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp38_index')->name('external.pengawasan.BMPs.rainy.bmp38');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp38_insert')->name('external.pengawasan.BMPs.rainy.bmp38');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp38_delete1')->name('external.pengawasan.BMPs.rainy.bmp38');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp38_delete')->name('external.pengawasan.BMPs.rainy.bmp38.delete');
          });

        Route::prefix('bmp39')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp39_index')->name('external.pengawasan.BMPs.rainy.bmp39');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp39_insert')->name('external.pengawasan.BMPs.rainy.bmp39');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp39_delete1')->name('external.pengawasan.BMPs.rainy.bmp39');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp39_delete')->name('external.pengawasan.BMPs.rainy.bmp39.delete');
          });

        Route::prefix('bmp40')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp40_index')->name('external.pengawasan.BMPs.rainy.bmp40');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp40_insert')->name('external.pengawasan.BMPs.rainy.bmp40');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp40_delete1')->name('external.pengawasan.BMPs.rainy.bmp40');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp40_delete')->name('external.pengawasan.BMPs.rainy.bmp40.delete');
          });

        Route::prefix('bmp41')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp41_index')->name('external.pengawasan.BMPs.rainy.bmp41');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp41_insert')->name('external.pengawasan.BMPs.rainy.bmp41');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp41_delete1')->name('external.pengawasan.BMPs.rainy.bmp41');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp41_delete')->name('external.pengawasan.BMPs.rainy.bmp41.delete');
          });

        Route::prefix('bmp42')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp42_index')->name('external.pengawasan.BMPs.rainy.bmp42');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp42_insert')->name('external.pengawasan.BMPs.rainy.bmp42');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp42_delete1')->name('external.pengawasan.BMPs.rainy.bmp42');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp42_delete')->name('external.pengawasan.BMPs.rainy.bmp42.delete');
          });

        Route::prefix('bmp43')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp43_index')->name('external.pengawasan.BMPs.rainy.bmp43');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp43_insert')->name('external.pengawasan.BMPs.rainy.bmp43');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp43_delete1')->name('external.pengawasan.BMPs.rainy.bmp43');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp43_delete')->name('external.pengawasan.BMPs.rainy.bmp43.delete');
          });

        Route::prefix('bmp44')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp44_index')->name('external.pengawasan.BMPs.rainy.bmp44');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp44_insert')->name('external.pengawasan.BMPs.rainy.bmp44');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp44_delete1')->name('external.pengawasan.BMPs.rainy.bmp44');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp44_delete')->name('external.pengawasan.BMPs.rainy.bmp44.delete');
          });

        Route::prefix('bmp45')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp45_index')->name('external.pengawasan.BMPs.rainy.bmp45');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp45_insert')->name('external.pengawasan.BMPs.rainy.bmp45');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp45_delete1')->name('external.pengawasan.BMPs.rainy.bmp45');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp45_delete')->name('external.pengawasan.BMPs.rainy.bmp45.delete');
          });

        Route::prefix('bmp46')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp46_index')->name('external.pengawasan.BMPs.rainy.bmp46');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp46_insert')->name('external.pengawasan.BMPs.rainy.bmp46');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp46_delete1')->name('external.pengawasan.BMPs.rainy.bmp46');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp46_delete')->name('external.pengawasan.BMPs.rainy.bmp46.delete');
          });

        Route::prefix('bmp47')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp47_index')->name('external.pengawasan.BMPs.rainy.bmp47');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp47_insert')->name('external.pengawasan.BMPs.rainy.bmp47');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp47_delete1')->name('external.pengawasan.BMPs.rainy.bmp47');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp47_delete')->name('external.pengawasan.BMPs.rainy.bmp47.delete');
          });

        Route::prefix('bmp48')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp48_index')->name('external.pengawasan.BMPs.rainy.bmp48');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp48_insert')->name('external.pengawasan.BMPs.rainy.bmp48');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp48_delete1')->name('external.pengawasan.BMPs.rainy.bmp48');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp48_delete')->name('external.pengawasan.BMPs.rainy.bmp48.delete');
          });

        Route::prefix('bmp49')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp49_index')->name('external.pengawasan.BMPs.rainy.bmp49');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp49_insert')->name('external.pengawasan.BMPs.rainy.bmp49');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp49_delete1')->name('external.pengawasan.BMPs.rainy.bmp49');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp49_delete')->name('external.pengawasan.BMPs.rainy.bmp49.delete');
          });

        Route::prefix('bmp50')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp50_index')->name('external.pengawasan.BMPs.rainy.bmp50');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp50_insert')->name('external.pengawasan.BMPs.rainy.bmp50');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp50_delete1')->name('external.pengawasan.BMPs.rainy.bmp50');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp50_delete')->name('external.pengawasan.BMPs.rainy.bmp50.delete');
          });

        Route::prefix('bmp51')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp51_index')->name('external.pengawasan.BMPs.rainy.bmp51');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp51_insert')->name('external.pengawasan.BMPs.rainy.bmp51');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp51_delete1')->name('external.pengawasan.BMPs.rainy.bmp51');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp51_delete')->name('external.pengawasan.BMPs.rainy.bmp51.delete');
          });

        Route::prefix('bmp52')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp52_index')->name('external.pengawasan.BMPs.rainy.bmp52');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp52_insert')->name('external.pengawasan.BMPs.rainy.bmp52');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp52_delete1')->name('external.pengawasan.BMPs.rainy.bmp52');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp52_delete')->name('external.pengawasan.BMPs.rainy.bmp52.delete');
          });

        Route::prefix('bmp53')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp53_index')->name('external.pengawasan.BMPs.rainy.bmp53');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp53_insert')->name('external.pengawasan.BMPs.rainy.bmp53');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp53_delete1')->name('external.pengawasan.BMPs.rainy.bmp53');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp53_delete')->name('external.pengawasan.BMPs.rainy.bmp53.delete');
          });

        Route::prefix('bmp54')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp54_index')->name('external.pengawasan.BMPs.rainy.bmp54');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp54_insert')->name('external.pengawasan.BMPs.rainy.bmp54');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp54_delete1')->name('external.pengawasan.BMPs.rainy.bmp54');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp54_delete')->name('external.pengawasan.BMPs.rainy.bmp54.delete');
          });

        Route::prefix('bmp55')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp55_index')->name('external.pengawasan.BMPs.rainy.bmp55');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp55_insert')->name('external.pengawasan.BMPs.rainy.bmp55');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp55_delete1')->name('external.pengawasan.BMPs.rainy.bmp55');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp55_delete')->name('external.pengawasan.BMPs.rainy.bmp55.delete');
          });

        Route::prefix('bmp56')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp56_index')->name('external.pengawasan.BMPs.rainy.bmp56');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp56_insert')->name('external.pengawasan.BMPs.rainy.bmp56');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp56_delete1')->name('external.pengawasan.BMPs.rainy.bmp56');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp56_delete')->name('external.pengawasan.BMPs.rainy.bmp56.delete');
          });

        Route::prefix('bmp57')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp57_index')->name('external.pengawasan.BMPs.rainy.bmp57');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp57_insert')->name('external.pengawasan.BMPs.rainy.bmp57');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp57_delete1')->name('external.pengawasan.BMPs.rainy.bmp57');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp57_delete')->name('external.pengawasan.BMPs.rainy.bmp57.delete');
          });

        Route::prefix('bmp58')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp58_index')->name('external.pengawasan.BMPs.rainy.bmp58');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp58_insert')->name('external.pengawasan.BMPs.rainy.bmp58');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp58_delete1')->name('external.pengawasan.BMPs.rainy.bmp58');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp58_delete')->name('external.pengawasan.BMPs.rainy.bmp58.delete');
          });

        Route::prefix('bmp59')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp59_index')->name('external.pengawasan.BMPs.rainy.bmp59');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp59_insert')->name('external.pengawasan.BMPs.rainy.bmp59');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp59_delete1')->name('external.pengawasan.BMPs.rainy.bmp59');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp59_delete')->name('external.pengawasan.BMPs.rainy.bmp59.delete');
          });

        Route::prefix('bmp60')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp60_index')->name('external.pengawasan.BMPs.rainy.bmp60');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp60_insert')->name('external.pengawasan.BMPs.rainy.bmp60');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp60_delete1')->name('external.pengawasan.BMPs.rainy.bmp60');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp60_delete')->name('external.pengawasan.BMPs.rainy.bmp60.delete');
          });

        Route::prefix('bmp61')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp61_index')->name('external.pengawasan.BMPs.rainy.bmp61');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp61_insert')->name('external.pengawasan.BMPs.rainy.bmp61');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp61_delete1')->name('external.pengawasan.BMPs.rainy.bmp61');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp61_delete')->name('external.pengawasan.BMPs.rainy.bmp61.delete');
          });

        Route::prefix('bmp62')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp62_index')->name('external.pengawasan.BMPs.rainy.bmp62');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp62_insert')->name('external.pengawasan.BMPs.rainy.bmp62');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp62_delete1')->name('external.pengawasan.BMPs.rainy.bmp62');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp62_delete')->name('external.pengawasan.BMPs.rainy.bmp62.delete');
          });

        Route::prefix('bmp63')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp63_index')->name('external.pengawasan.BMPs.rainy.bmp63');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp63_insert')->name('external.pengawasan.BMPs.rainy.bmp63');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp63_delete1')->name('external.pengawasan.BMPs.rainy.bmp63');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp63_delete')->name('external.pengawasan.BMPs.rainy.bmp63.delete');
          });

        Route::prefix('bmp64')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp64_index')->name('external.pengawasan.BMPs.rainy.bmp64');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp64_insert')->name('external.pengawasan.BMPs.rainy.bmp64');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp64_delete1')->name('external.pengawasan.BMPs.rainy.bmp64');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp64_delete')->name('external.pengawasan.BMPs.rainy.bmp64.delete');
          });

        Route::prefix('bmp65')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp65_index')->name('external.pengawasan.BMPs.rainy.bmp65');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp65_insert')->name('external.pengawasan.BMPs.rainy.bmp65');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp65_delete1')->name('external.pengawasan.BMPs.rainy.bmp65');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp65_delete')->name('external.pengawasan.BMPs.rainy.bmp65.delete');
          });

        Route::prefix('bmp66')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp66_index')->name('external.pengawasan.BMPs.rainy.bmp66');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp66_insert')->name('external.pengawasan.BMPs.rainy.bmp66');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp66_delete1')->name('external.pengawasan.BMPs.rainy.bmp66');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp66_delete')->name('external.pengawasan.BMPs.rainy.bmp66.delete');
          });

        Route::prefix('bmp67')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp67_index')->name('external.pengawasan.BMPs.rainy.bmp67');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp67_insert')->name('external.pengawasan.BMPs.rainy.bmp67');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp67_delete1')->name('external.pengawasan.BMPs.rainy.bmp67');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp67_delete')->name('external.pengawasan.BMPs.rainy.bmp67.delete');
          });

        Route::prefix('bmp68')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp68_index')->name('external.pengawasan.BMPs.rainy.bmp68');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp68_insert')->name('external.pengawasan.BMPs.rainy.bmp68');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp68_delete1')->name('external.pengawasan.BMPs.rainy.bmp68');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp68_delete')->name('external.pengawasan.BMPs.rainy.bmp68.delete');
          });

        Route::prefix('bmp69')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp69_index')->name('external.pengawasan.BMPs.rainy.bmp69');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp69_insert')->name('external.pengawasan.BMPs.rainy.bmp69');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp69_delete1')->name('external.pengawasan.BMPs.rainy.bmp69');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp69_delete')->name('external.pengawasan.BMPs.rainy.bmp69.delete');
          });

        Route::prefix('bmp70')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp70_index')->name('external.pengawasan.BMPs.rainy.bmp70');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp70_insert')->name('external.pengawasan.BMPs.rainy.bmp70');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp70_delete1')->name('external.pengawasan.BMPs.rainy.bmp70');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp70_delete')->name('external.pengawasan.BMPs.rainy.bmp70.delete');
          });

        Route::prefix('bmp71')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp71_index')->name('external.pengawasan.BMPs.rainy.bmp71');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp71_insert')->name('external.pengawasan.BMPs.rainy.bmp71');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp71_delete1')->name('external.pengawasan.BMPs.rainy.bmp71');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp71_delete')->name('external.pengawasan.BMPs.rainy.bmp71.delete');
          });

        Route::prefix('bmp72')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp72_index')->name('external.pengawasan.BMPs.rainy.bmp72');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp72_insert')->name('external.pengawasan.BMPs.rainy.bmp72');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp72_delete1')->name('external.pengawasan.BMPs.rainy.bmp72');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp72_delete')->name('external.pengawasan.BMPs.rainy.bmp72.delete');
          });

        Route::prefix('bmp73')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp73_index')->name('external.pengawasan.BMPs.rainy.bmp73');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp73_insert')->name('external.pengawasan.BMPs.rainy.bmp73');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp73_3elete1')->name('external.pengawasan.BMPs.rainy.bmp73');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp73_delete')->name('external.pengawasan.BMPs.rainy.bmp73.delete');
          });

        Route::prefix('bmp74')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp74_index')->name('external.pengawasan.BMPs.rainy.bmp74');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp74_insert')->name('external.pengawasan.BMPs.rainy.bmp74');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp74_delete1')->name('external.pengawasan.BMPs.rainy.bmp74');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp74_delete')->name('external.pengawasan.BMPs.rainy.bmp74.delete');
          });

        Route::prefix('bmp75')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp75_index')->name('external.pengawasan.BMPs.rainy.bmp75');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp75_insert')->name('external.pengawasan.BMPs.rainy.bmp75');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp75_delete1')->name('external.pengawasan.BMPs.rainy.bmp75');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp75_delete')->name('external.pengawasan.BMPs.rainy.bmp75.delete');
          });

        Route::prefix('bmp76')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp76_index')->name('external.pengawasan.BMPs.rainy.bmp76');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp76_insert')->name('external.pengawasan.BMPs.rainy.bmp76');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp76_delete1')->name('external.pengawasan.BMPs.rainy.bmp76');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp76_delete')->name('external.pengawasan.BMPs.rainy.bmp76.delete');
          });

        Route::prefix('bmp77')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp77_index')->name('external.pengawasan.BMPs.rainy.bmp77');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp77_insert')->name('external.pengawasan.BMPs.rainy.bmp77');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp77_delete1')->name('external.pengawasan.BMPs.rainy.bmp77');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp77_delete')->name('external.pengawasan.BMPs.rainy.bmp77.delete');
          });

        Route::prefix('bmp78')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp78_index')->name('external.pengawasan.BMPs.rainy.bmp78');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp78_insert')->name('external.pengawasan.BMPs.rainy.bmp78');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp78_delete1')->name('external.pengawasan.BMPs.rainy.bmp78');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp78_delete')->name('external.pengawasan.BMPs.rainy.bmp78.delete');
          });

        Route::prefix('bmp79')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp79_index')->name('external.pengawasan.BMPs.rainy.bmp79');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp79_insert')->name('external.pengawasan.BMPs.rainy.bmp79');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp79_delete1')->name('external.pengawasan.BMPs.rainy.bmp79');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp79_delete')->name('external.pengawasan.BMPs.rainy.bmp79.delete');
          });

        Route::prefix('bmp80')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp80_index')->name('external.pengawasan.BMPs.rainy.bmp80');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp80_insert')->name('external.pengawasan.BMPs.rainy.bmp80');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp80_delete1')->name('external.pengawasan.BMPs.rainy.bmp80');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp80_delete')->name('external.pengawasan.BMPs.rainy.bmp80.delete');
          });

        Route::prefix('bmp81')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp81_index')->name('external.pengawasan.BMPs.rainy.bmp81');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp81_insert')->name('external.pengawasan.BMPs.rainy.bmp81');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp81_delete1')->name('external.pengawasan.BMPs.rainy.bmp81');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp81_delete')->name('external.pengawasan.BMPs.rainy.bmp81.delete');
          });

        Route::prefix('bmp82')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp82_index')->name('external.pengawasan.BMPs.rainy.bmp82');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp82_insert')->name('external.pengawasan.BMPs.rainy.bmp82');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp82_delete1')->name('external.pengawasan.BMPs.rainy.bmp82');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp82_delete')->name('external.pengawasan.BMPs.rainy.bmp82.delete');
          });

        Route::prefix('bmp83')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp83_index')->name('external.pengawasan.BMPs.rainy.bmp83');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp83_insert')->name('external.pengawasan.BMPs.rainy.bmp83');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp83_delete1')->name('external.pengawasan.BMPs.rainy.bmp83');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp83_delete')->name('external.pengawasan.BMPs.rainy.bmp83.delete');
          });

        Route::prefix('bmp84')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp84_index')->name('external.pengawasan.BMPs.rainy.bmp84');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp84_insert')->name('external.pengawasan.BMPs.rainy.bmp84');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp84_delete1')->name('external.pengawasan.BMPs.rainy.bmp84');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp84_delete')->name('external.pengawasan.BMPs.rainy.bmp84.delete');
          });

        Route::prefix('bmp85')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp85_index')->name('external.pengawasan.BMPs.rainy.bmp85');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp85_insert')->name('external.pengawasan.BMPs.rainy.bmp85');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp85_delete1')->name('external.pengawasan.BMPs.rainy.bmp85');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp85_delete')->name('external.pengawasan.BMPs.rainy.bmp85.delete');
          });

        Route::prefix('bmp86')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp86_index')->name('external.pengawasan.BMPs.rainy.bmp86');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp86_insert')->name('external.pengawasan.BMPs.rainy.bmp86');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp86_delete1')->name('external.pengawasan.BMPs.rainy.bmp86');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp86_delete')->name('external.pengawasan.BMPs.rainy.bmp86.delete');
          });

        Route::prefix('bmp87')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp87_index')->name('external.pengawasan.BMPs.rainy.bmp87');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp87_insert')->name('external.pengawasan.BMPs.rainy.bmp87');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp87_delete1')->name('external.pengawasan.BMPs.rainy.bmp87');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp87_delete')->name('external.pengawasan.BMPs.rainy.bmp87.delete');
          });

        Route::prefix('bmp88')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp88_index')->name('external.pengawasan.BMPs.rainy.bmp88');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp88_insert')->name('external.pengawasan.BMPs.rainy.bmp88');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp88_delete1')->name('external.pengawasan.BMPs.rainy.bmp88');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp88_delete')->name('external.pengawasan.BMPs.rainy.bmp88.delete');
          });

        Route::prefix('bmp89')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp89_index')->name('external.pengawasan.BMPs.rainy.bmp89');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp89_insert')->name('external.pengawasan.BMPs.rainy.bmp89');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp89_delete1')->name('external.pengawasan.BMPs.rainy.bmp89');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp89_delete')->name('external.pengawasan.BMPs.rainy.bmp89.delete');
          });

        Route::prefix('bmp90')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp90_index')->name('external.pengawasan.BMPs.rainy.bmp90');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp90_insert')->name('external.pengawasan.BMPs.rainy.bmp90');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp90_delete1')->name('external.pengawasan.BMPs.rainy.bmp90');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp90_delete')->name('external.pengawasan.BMPs.rainy.bmp90.delete');
          });

        Route::prefix('bmp91')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp91_index')->name('external.pengawasan.BMPs.rainy.bmp91');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp91_insert')->name('external.pengawasan.BMPs.rainy.bmp91');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp91_delete1')->name('external.pengawasan.BMPs.rainy.bmp91');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp91_delete')->name('external.pengawasan.BMPs.rainy.bmp91.delete');
          });

        Route::prefix('bmp92')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp92_index')->name('external.pengawasan.BMPs.rainy.bmp92');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp92_insert')->name('external.pengawasan.BMPs.rainy.bmp92');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp92_delete1')->name('external.pengawasan.BMPs.rainy.bmp92');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp92_delete')->name('external.pengawasan.BMPs.rainy.bmp92.delete');
          });

        Route::prefix('bmp93')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp93_index')->name('external.pengawasan.BMPs.rainy.bmp93');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp93_insert')->name('external.pengawasan.BMPs.rainy.bmp93');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp93_delete1')->name('external.pengawasan.BMPs.rainy.bmp93');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp93_delete')->name('external.pengawasan.BMPs.rainy.bmp93.delete');
          });

        Route::prefix('bmp94')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp94_index')->name('external.pengawasan.BMPs.rainy.bmp94');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp94_insert')->name('external.pengawasan.BMPs.rainy.bmp94');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp94_delete1')->name('external.pengawasan.BMPs.rainy.bmp94');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp94_delete')->name('external.pengawasan.BMPs.rainy.bmp94.delete');
          });

        Route::prefix('bmp95')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp95_index')->name('external.pengawasan.BMPs.rainy.bmp95');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp95_insert')->name('external.pengawasan.BMPs.rainy.bmp95');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp95_delete1')->name('external.pengawasan.BMPs.rainy.bmp95');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp95_delete')->name('external.pengawasan.BMPs.rainy.bmp95.delete');
          });

        Route::prefix('bmp96')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp96_index')->name('external.pengawasan.BMPs.rainy.bmp96');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp96_insert')->name('external.pengawasan.BMPs.rainy.bmp96');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp96_delete1')->name('external.pengawasan.BMPs.rainy.bmp96');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp96_delete')->name('external.pengawasan.BMPs.rainy.bmp96.delete');
          });

        Route::prefix('bmp97')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp97_index')->name('external.pengawasan.BMPs.rainy.bmp97');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp97_insert')->name('external.pengawasan.BMPs.rainy.bmp97');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp97_delete1')->name('external.pengawasan.BMPs.rainy.bmp97');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp97_delete')->name('external.pengawasan.BMPs.rainy.bmp97.delete');
          });

        Route::prefix('bmp98')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp98_index')->name('external.pengawasan.BMPs.rainy.bmp98');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp98_insert')->name('external.pengawasan.BMPs.rainy.bmp98');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp98_delete1')->name('external.pengawasan.BMPs.rainy.bmp98');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp98_delete')->name('external.pengawasan.BMPs.rainy.bmp98.delete');
          });

        Route::prefix('bmp99')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp99_index')->name('external.pengawasan.BMPs.rainy.bmp99');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp99_insert')->name('external.pengawasan.BMPs.rainy.bmp99');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp99_delete1')->name('external.pengawasan.BMPs.rainy.bmp99');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp99_delete')->name('external.pengawasan.BMPs.rainy.bmp99.delete');
          });

        Route::prefix('bmp100')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp100_index')->name('external.pengawasan.BMPs.rainy.bmp100');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp100_insert')->name('external.pengawasan.BMPs.rainy.bmp100');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp100_delete1')->name('external.pengawasan.BMPs.rainy.bmp100');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp100_delete')->name('external.pengawasan.BMPs.rainy.bmp100.delete');
          });

        Route::prefix('bmp101')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp101_index')->name('external.pengawasan.BMPs.rainy.bmp101');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp101_insert')->name('external.pengawasan.BMPs.rainy.bmp101');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp101_delete1')->name('external.pengawasan.BMPs.rainy.bmp101');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp101_delete')->name('external.pengawasan.BMPs.rainy.bmp101.delete');
          });

        Route::prefix('bmp102')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp102_index')->name('external.pengawasan.BMPs.rainy.bmp102');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp102_insert')->name('external.pengawasan.BMPs.rainy.bmp102');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp102_delete1')->name('external.pengawasan.BMPs.rainy.bmp102');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp102_delete')->name('external.pengawasan.BMPs.rainy.bmp102.delete');
          });

        Route::prefix('bmp103')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp103_index')->name('external.pengawasan.BMPs.rainy.bmp103');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp103_insert')->name('external.pengawasan.BMPs.rainy.bmp103');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp103_delete1')->name('external.pengawasan.BMPs.rainy.bmp103');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp103_delete')->name('external.pengawasan.BMPs.rainy.bmp103.delete');
          });

        Route::prefix('bmp104')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp104_index')->name('external.pengawasan.BMPs.rainy.bmp104');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp104_insert')->name('external.pengawasan.BMPs.rainy.bmp104');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp104_delete1')->name('external.pengawasan.BMPs.rainy.bmp104');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp104_delete')->name('external.pengawasan.BMPs.rainy.bmp104.delete');
          });

        Route::prefix('bmp105')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp105_index')->name('external.pengawasan.BMPs.rainy.bmp105');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp105_insert')->name('external.pengawasan.BMPs.rainy.bmp105');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp105_delete1')->name('external.pengawasan.BMPs.rainy.bmp105');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp105_delete')->name('external.pengawasan.BMPs.rainy.bmp105.delete');
          });

        Route::prefix('bmp106')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp106_index')->name('external.pengawasan.BMPs.rainy.bmp106');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp106_insert')->name('external.pengawasan.BMPs.rainy.bmp106');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp106_delete1')->name('external.pengawasan.BMPs.rainy.bmp106');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp106_delete')->name('external.pengawasan.BMPs.rainy.bmp106.delete');
          });

        Route::prefix('bmp107')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp107_index')->name('external.pengawasan.BMPs.rainy.bmp107');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp107_insert')->name('external.pengawasan.BMPs.rainy.bmp107');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp107_delete1')->name('external.pengawasan.BMPs.rainy.bmp107');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp107_delete')->name('external.pengawasan.BMPs.rainy.bmp107.delete');
          });

        Route::prefix('bmp108')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp108_index')->name('external.pengawasan.BMPs.rainy.bmp108');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp108_insert')->name('external.pengawasan.BMPs.rainy.bmp108');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp108_delete1')->name('external.pengawasan.BMPs.rainy.bmp108');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp108_delete')->name('external.pengawasan.BMPs.rainy.bmp108.delete');
          });

        Route::prefix('bmp109')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp109_index')->name('external.pengawasan.BMPs.rainy.bmp109');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp109_insert')->name('external.pengawasan.BMPs.rainy.bmp109');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp109_delete1')->name('external.pengawasan.BMPs.rainy.bmp109');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp109_delete')->name('external.pengawasan.BMPs.rainy.bmp109.delete');
          });

        Route::prefix('bmp110')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp110_index')->name('external.pengawasan.BMPs.rainy.bmp110');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp110_insert')->name('external.pengawasan.BMPs.rainy.bmp110');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp110_delete1')->name('external.pengawasan.BMPs.rainy.bmp110');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp100_delete')->name('external.pengawasan.BMPs.rainy.bmp110.delete');
          });

        Route::prefix('bmp111')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp111_index')->name('external.pengawasan.BMPs.rainy.bmp111');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp111_insert')->name('external.pengawasan.BMPs.rainy.bmp111');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp111_delete1')->name('external.pengawasan.BMPs.rainy.bmp111');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp111_delete')->name('external.pengawasan.BMPs.rainy.bmp111.delete');
          });

        Route::prefix('bmp112')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp112_index')->name('external.pengawasan.BMPs.rainy.bmp112');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp112_insert')->name('external.pengawasan.BMPs.rainy.bmp112');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp112_delete1')->name('external.pengawasan.BMPs.rainy.bmp112');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp112_delete')->name('external.pengawasan.BMPs.rainy.bmp112.delete');
          });

        Route::prefix('bmp113')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp113_index')->name('external.pengawasan.BMPs.rainy.bmp113');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp113_insert')->name('external.pengawasan.BMPs.rainy.bmp113');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp113_delete1')->name('external.pengawasan.BMPs.rainy.bmp113');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp113_delete')->name('external.pengawasan.BMPs.rainy.bmp113.delete');
          });

        Route::prefix('bmp114')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp114_index')->name('external.pengawasan.BMPs.rainy.bmp114');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp114_insert')->name('external.pengawasan.BMPs.rainy.bmp114');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp114_delete1')->name('external.pengawasan.BMPs.rainy.bmp114');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp114_delete')->name('external.pengawasan.BMPs.rainy.bmp114.delete');
          });

        Route::prefix('bmp115')->group(function () {
          Route::get('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp115_index')->name('external.pengawasan.BMPs.rainy.bmp115');
          Route::post('{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp115_insert')->name('external.pengawasan.BMPs.rainy.bmp115');
          Route::delete('', 'External\Pengawasan\BMP\BMPRainyController@bmp115_delete1')->name('external.pengawasan.BMPs.rainy.bmp115');
          Route::get('delete/{id}', 'External\Pengawasan\BMP\BMPRainyController@bmp115_delete')->name('external.pengawasan.BMPs.rainy.bmp115.delete');
          });
  		});
    });
});
