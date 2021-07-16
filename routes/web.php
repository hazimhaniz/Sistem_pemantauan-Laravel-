<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('api-esdr-stesen', 'API\LaporanStatistikIntegrasiController@laporanESDRStesen');
Route::get('api-esdr-bulanan', 'API\LaporanStatistikIntegrasiController@laporanESDRBulanan');
Route::get('api-esdr-parameter', 'API\LaporanStatistikIntegrasiController@laporanESDRParameter');

Route::get('login/announcement/{id}', 'Auth\LoginController@announcement')->name('login.announcement');
Route::get('login/faq/{id}', 'Auth\LoginController@faq')->name('login.faq');

Auth::routes();

Route::get('reset-password', 'AuthController@resetPassword')->name('reset.password');
Route::post('reset-password', 'AuthController@resetPasswordPost')->name('reset.password.post');
Route::get('reset-password/{token}', 'AuthController@showPasswordResetForm')->name('reset.password.token');
Route::post('reset-password/{token}', 'AuthController@PasswordResetPost')->name('reset.password.token.post');

Route::prefix('api')->group(function () {
    Route::post('database', 'API\DatabaseController@index')->name('api.database');
});
// additional routes sai
Route::get('downlaodfile/{id}/{type}/{projekId}', 'EOController@downlaodfile')->name('downlaodfile');
Route::post('stesen/deleteimage', 'ProjekController@deleteImage')->name('deletefile');

Route::get('getdistricts/{id}/{type}', 'EMCController@getdistricts')->name('getdistricts');
Route::get('checkuseremc/{id}/{projeckid}', 'EMCController@checkuseremc')->name('checkuseremc');

Route::post('form/hantarborangescp', 'BorangAController@BorangESCP')->name('form.hantarBorangESCP');
Route::post('form/tambah_fasa', 'BorangAController@TambahFasa')->name('form.tambah_fasa');

Route::prefix('statistik')->group(function () {
 Route::get('/pengawasan/{id}', 'StatistikController@getJenisPengawasan')->name('statistik.pengawasan');
 Route::get('/getstesen/{id}', 'StatistikController@getStesen')->name('statistik.stesen');
 Route::get('/getparameter/{id}', 'StatistikController@getParameter')->name('statistik.paramter');
 Route::post('/submitstatistik/{type}', 'StatistikController@submitStatistik')->name('statistik.submitstatistik');
 Route::post('/submitstatistiksai/{type}', 'StatistikController@submitStatistikSai')->name('statistik.submitstatistik');

});

Route::prefix('pengesahan_stesen')->group(function () {
    Route::get('/senarai_stesen', 'PengesahanStesenController@senaraiStesen');
    
    Route::get('/pengesahan_stesen', 'PengesahanStesenController@pengesahan_stesen')->name('pengesahan_stesen.pengesahan_stesen');
    Route::get('/tambah_stesen', 'PengesahanStesenController@tambah_stesen')->name('pengesahan_stesen.tambah_stesen');
    Route::get('/pengesahanmodal/{id}', 'PengesahanStesenController@pengesahanModal')->name('pengesahan_stesen.pengesahanmodal');
    Route::get('/downloadFile/{id}', 'PengesahanStesenController@downloadFile')->name('pengesahan_stesen.downloadFile');
    Route::post('/savestesen/{id}', 'PengesahanStesenController@saveStesen')->name('pengesahan_stesen.savestesen');
});

Route::prefix('pengurusan_projek')->group(function () {

    Route::get('/aktif', 'PengurusanProjekController@projekAktif')->name('pengurusan_projek.aktif');
    Route::get('/dipinda', 'PengurusanProjekController@projekDipinda')->name('pengurusan_projek.dipinda');

    Route::get('/belum_disahkan', 'PengurusanProjekController@belum_sah')->name('pengurusan_projek.belum_sah');
    Route::get('/telah_disahkan', 'PengurusanProjekController@telah_sah')->name('pengurusan_projek.telah_sah');

    Route::get('/penyiasat-sah-daftar/{projekID}', 'PengurusanProjekController@penyiasatSahDaftar')->name('pengurusan_projek.penyiasatSahDaftar');
    Route::get('/penyiasat-pinda-daftar/{projekID}', 'PengurusanProjekController@penyiasatPindaDaftar')->name('pengurusan_projek.penyiasatPindaDaftar');

    Route::group(['prefix' => 'laporan'], function () {

        Route::get('/bulanan-senarai', 'PengurusanProjekController@laporanBulananSenarai')->name('pengurusan_projek.laporanBulananSenarai');

        Route::get('/bulanan', 'PengurusanProjekController@laporanBulanan')->name('pengurusan_projek.laporanBulanan');
        Route::get('/bulanan-view-projek/{projekID}/{year}/{month}', 'PengurusanProjekController@laporanBulananView');
        Route::post('/submit-query', 'PengurusanProjekController@submitQuery');
        Route::post('/sahkan-laporan', 'PengurusanProjekController@sahkanLaporan');

        Route::get('/pemarkahan', 'PengurusanProjekController@laporanPemarkahan');
        Route::get('/pemarkahan-view/{pemarkahanID}', 'PengurusanProjekController@laporanPemarkahanView');
        Route::get('/pemarkahan-sah/{pemarkahanID}', 'PengurusanProjekController@laporanPemarkahanSah');

        Route::get('/siasatan', 'PengurusanProjekController@laporanSiasatan');
        Route::get('/siasatan-view/{laporanFinalID}', 'PengurusanProjekController@laporanSiasatanView');
        Route::post('/siasatan-sahkan', 'PengurusanProjekController@laporanSiasatanSah');
        
    });
});

Route::prefix('admin/email')->group(function () {
    Route::get('/', 'Admin\EmailController@index')->name('admin.email');
});

// end additional routes
Route::post('register', 'API\AuthController@register');
Route::post('registerexist', 'API\AuthController@registerexist');
Route::get('checkExist/{id}', 'API\AuthController@checkExist');
Route::get('jas/{id}', 'API\AuthController@jas');
Route::get('autologin/{id}', 'Auth\LoginController@autologin')->name('autologin');

Route::post('/login-process', 'AuthController@loginRegister')->name('log-pro');
Route::post('/check-projek-external', 'AuthController@CheckProjekExternal')->name('check-projek-external');
Route::get('/login-projek-external', 'AuthController@LoginProjekExternal')->name('login-projek-external');
Route::get('/login-other-projek-external', 'AuthController@LoginOtherProjekExternal')->name('login-other-projek-external');
Route::get('/listProjek/{username}/{password}', 'AuthController@ModalProjek')->name('listProjek');

Route::post('semak-fail-jas', 'FailJasController@semakFailJas');
Route::post('daftar-pp-projek', 'FailJasController@daftarPPProjek');

Route::prefix('home')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('list', 'HomeController@list')->name('home.list');

    Route::post('/getStatisticEIA/{year}/{month}', 'HomeController@getStatisticEIA');
    Route::post('/getLaporanPemarkahan/{year}/{month_from}/{month_to}', 'HomeController@getLaporanPemarkahan');
});

Route::prefix('rekodEkas')->group(function () {
    Route::get('senarai', 'RekodEkasController@index')->name('rekodEkas.senarai');
    Route::get('edit/{id}', 'RekodEkasController@edit')->name('edit');
    Route::post('update/{id}', 'RekodEkasController@update')->name('update');
});

Route::prefix('pengurusan_eo')->group(function () {
    Route::get('/', 'PenggunaEOController@pengurusan_eo')->name('external.pengguna.pengurusan_eo');
    Route::post('/', 'PenggunaEOController@insert_pengurusan_eo')->name('external.pengguna.pengurusan_eo');
    Route::get('komen/{id}', 'PenggunaEOController@komen')->name('external.pengguna.pengurusan_eo.komen');
    Route::get('delete/{id}', 'PenggunaEOController@delete_pengurusan_eo')->name('external.pengguna.pengurusan_eo.delete');
    Route::get('deactivate/{id}', 'PenggunaEOController@deactivate_pengurusan_eo')->name('external.pengguna.pengurusan_eo.deactivate');
    Route::get('activate/{id}', 'PenggunaEOController@activate_pengurusan_eo')->name('external.pengguna.pengurusan_eo.activate');
    Route::get('view_user/{id}', 'PenggunaEOController@view_user')->name('external.pengguna.pengurusan_eo.view_user');
    Route::get('hantarpengguna/{id}/{type}', 'PenggunaEOController@hantarpengguna')->name('external.pengguna.pengurusan_eo.hantarpengguna');

    Route::get('/admin-list', 'EOController@adminList')->name('pengurusan_eo.adminList');
    Route::get('/admin-list/adminTindakanModal/{projekHasUserID}', 'EOController@adminTindakanModal')->name('pengurusan_eo.adminTindakanModal');
    Route::post('/admin-list/adminTindakanModal/{projekHasUserID}', 'EOController@adminTindakanModalSubmit')->name('pengurusan_eo.adminTindakanModalSubmit');
});

Route::prefix('pengurusan_emc')->group(function () {
    Route::get('/', 'PenggunaEMCController@pengurusan_emc')->name('external.pengguna.pengurusan_emc');
    Route::post('/', 'PenggunaEMCController@insert_pengurusan_emc')->name('external.pengguna.pengurusan_emc');
    Route::post('submitemc', 'PenggunaEMCController@submit_pengurusan_emc')->name('external.pengguna.submitemc');
    Route::get('tambahemc', 'PenggunaEMCController@tambah_emc')->name('external.pengguna.tambah_emc');
    Route::post('updateemc', 'PenggunaEMCController@update_emc')->name('external.pengguna.update_emc');
    Route::get('deleteemc/{id}', 'PenggunaEMCController@delete_pengurusan_emc')->name('external.pengguna.pengurusan_emc.deleteemc');
    Route::get('senaraimakmal/{id}', 'PenggunaEMCController@senaraimakmal')->name('senaraimakmal');
    Route::get('senaraimakmaldetail/{id}', 'PenggunaEMCController@senaraimakmaldetail')->name('senaraimakmaldetail');
    Route::post('makmalAkreditasisimpan', 'PenggunaEMCController@makmalAkreditasisimpan')->name('makmalAkreditasi.simpan');
    Route::get('makmalAkreditasibuang/{id}', 'PenggunaEMCController@makmalAkreditasibuang')->name('makmalAkreditasi.buang');
    Route::get('deactivate/{id}', 'PenggunaEMCController@deactivate_pengurusan_emc')->name('external.pengguna.pengurusan_emc.deactivate');
    Route::get('activate/{id}', 'PenggunaEMCController@activate_pengurusan_emc')->name('external.pengguna.pengurusan_emc.activate');
    Route::get('view_user/{id}', 'PenggunaEMCController@view_user')->name('external.pengguna.pengurusan_emc.view_user');
    Route::get('checkemc/{id}', 'PenggunaEMCController@checkemc')->name('external.pengguna.pengurusan_emc.checkemc');
    Route::get('hantarpengguna/{id}/{type}', 'PenggunaEMCController@hantarpengguna')->name('external.pengguna.pengurusan_emc.hantarpengguna');

    Route::get('/admin-list', 'EMCController@adminList')->name('pengurusan_emc.adminList');
    Route::get('/admin-list/adminTindakanModal/{projekHasUserID}', 'EMCController@adminTindakanModal')->name('pengurusan_emc.adminTindakanModal');
    Route::post('/admin-list/adminTindakanModal/{projekHasUserID}', 'EMCController@adminTindakanModalSubmit')->name('pengurusan_emc.adminTindakanModalSubmit');
});

Route::prefix('kompetensi')->group(function () {
    Route::get('/', 'KompetensiController@index')->name('kompetensi.index');
});

Route::prefix('pengguna')->group(function () {
    Route::get('/', 'Pengguna@PenggunaEOController@dummy_index')->name('pengguna');
    Route::get('deactivate/{jenis}/{id}', 'PenggunaEOController@deactivate_pengguna')->name('external.pengguna.pengurusan.deactivate');
    Route::post('deactivate/post', 'PenggunaEOController@deactivate_penggunaPost')->name('external.pengguna.pengurusan.deactivatepost');
});

Route::prefix('projek')->group(function () {
	// new form route
    Route::get('/form/{id}/{year?}/{month?}', 'ProjekController@openProjekForm')->name('projek.form');
    Route::get('/getmonths/{year}/{projekid}', 'ProjekController@getmonths')->name('projek.getmonths');
    Route::get('/savemonths/{month}/{year}/{projekid}', 'ProjekController@savemonths')->name('projek.savemonths');
    Route::post('/getfasa/{id}', 'ProjekController@getfasaTab')->name('projek.getfasa');

    Route::get('/get-senarai-hujan/{id}/{year?}/{month?}','LaporanHujanController@getSenaraiLaporanHujan')->name('projek.senaraiHujan');
    Route::get('/get-form-hujan/{id}','LaporanHujanController@getHujanKawalan')->name('projek.getHujan');
    Route::get('/tindakan-hujan/{id}/{status}','LaporanHujanController@tindakanHujan')->name('projek.tindakanHujan');
    Route::post('/submit-kawalan-hujan','LaporanHujanController@saveKawalan')->name('projek.submitHujan');
    Route::get('/senaraihujan/{hujan}', 'LaporanHujanController@viewHujan')->name('form.viewhujan');


    Route::get('/hantar-laporan-bulanan/{projekid}/{year}/{month}', 'ProjekController@hantarLaporanBulanan');

    Route::get('/get-senarai-kuiri/{projekid}/{year}/{month}', 'ProjekKuiriController@getSenaraiKuiri');
    Route::get('/get-lihat-kuiri/{kuiriID}', 'ProjekKuiriController@getLihatKuiri');
    Route::post('/jawab-kuiri', 'ProjekKuiriController@jawabKuiri');

    Route::get('/get-syarat-b/{projekid}/{year}/{month}', 'BorangBController@projekGetSyaratB');
    Route::get('/delete-doc-syarat-b/{syaratBDocID}', 'BorangBController@deleteDocSyaratB');
    Route::post('/save-syarat-number', 'BorangBController@projekSaveSyaratNumber');
    Route::post('/save-syarat-b', 'BorangBController@projekSaveSyaratB');
    Route::get('/tindakan-syarat-b/{monthlyBID}/{status}', 'BorangBController@tindakanSyaratB');

    Route::post('/submit-form-d', 'FormDController@saveD');
    Route::get('/get-form-d/{borangDID}', 'FormDController@getD');
    Route::get('/tindakan-borang-d/{monthlyDID}/{status}', 'FormDController@tindakanBorangD');

    Route::post('add-audit', 'ProjekController@addAudit')->name('projek.addAudit');
    Route::post('projek-fasa', 'ProjekController@projekFasa')->name('projek.projekFasa');
    Route::get('edit-fasa/{fasaID}', 'ProjekController@editFasa')->name('projek.editFasa');
    Route::post('edit-fasa/{fasaID}', 'ProjekController@editFasaSubmit')->name('projek.editFasaSubmit');

    Route::get('/view-pendaftaran/{projekID}', 'ProjekViewController@view')->name('projek.view');

    Route::get('/senaraiprojek', 'ProjekController@senaraiProjek')->name('projek.senarai_projek');
    Route::get('/pendaftaranprojek/{projekID}', 'PendaftaranProjekController@pendaftaranProjek')->name('projek.pendaftaranProjek');
    Route::post('/pendaftaranprojek/maklumatprojek/{projekID}', 'PendaftaranProjekController@pendaftaranProjekMaklumatProjek')->name('projek.pendaftaranProjekMaklumatProjek');

    //Daftar Syarat
    Route::post('/pendaftaranSyarat/{projekID}','SyaratController@projekSaveSyaratNumber')->name('projek.pendaftaranSyarat');
    Route::get('/viewSyarat/{id}','SyaratController@projekViewSyarat')->name('projek.viewSyarat');
    Route::post('/save-syarat', 'SyaratController@projekSaveSyarat');
    Route::get('/simpan-syarat/{id}', 'SyaratController@projekSimpanSyarat');
    Route::get('/deleteSyaratEIA/{syaratBID}', 'SyaratController@deleteSyarat')->name('projek.deleteSyaratEIA');
    Route::get('/kuiri/{id}', 'SyaratController@getKuiri')->name('projek.kuiri');
    Route::get('/loadKuiri/{id}','SyaratController@loadKuiri')->name('projek.loadKuiri');
    Route::get('/viewKuiri/{id}','SyaratController@viewKuiri')->name('projek.viewKuiri');
    Route::post('/submit-kuiri/{id}', 'SyaratController@submitKuiri')->name('projek.submitKuiri');
    Route::post('/submit-kemaskini-syarat/{id}', 'SyaratController@submitKemaskiniSyarat')->name('projek.submitKemaskini');
    Route::get('/sahSyarat/{id}', 'SyaratController@sahSyarat')->name('projek.sahKuiri');
    ////end
    
    Route::post('/pendaftaranprojek/getuserdata', 'PendaftaranProjekController@getuserData')->name('projek.getuserdata');

    Route::post('/pendaftaranprojek/tambahfasa/{projekID}', 'PendaftaranProjekController@pendaftaranProjekTambahFasa')->name('projek.pendaftaranProjekTambahFasa');
    Route::get('/pendaftaranprojek/deletefasa/{projekFasaID}', 'PendaftaranProjekController@pendaftaranProjekDeleteFasa')->name('projek.pendaftaranProjekDeleteFasa');
    Route::get('/pendaftaranprojek/kemaskinifasa/{projekFasaID}', 'PendaftaranProjekController@pendaftaranProjekKemaskiniFasa');
    Route::post('/pendaftaranprojek/kemaskinifasa/{projekFasaID}', 'PendaftaranProjekController@pendaftaranProjekKemaskiniFasaSubmit');

    Route::get('/pendaftaranprojek/senarai_emp/{projekID}', 'PendaftaranProjekController@senaraiEMP');
    Route::post('/pendaftaranprojek/tambah_emp/{projekID}', 'PendaftaranProjekController@tambahEMP');
    Route::get('/pendaftaranprojek/delete_emp/{empID}', 'PendaftaranProjekController@deleteEMP');

    Route::get('/pendaftaranprojek/senarai_ldp2m2/{projekID}', 'PendaftaranProjekController@senaraiLDP2M2');
    Route::post('/pendaftaranprojek/tambah_ldp2m2/{projekID}', 'PendaftaranProjekController@tambahLDP2M2');
    Route::get('/pendaftaranprojek/delete_ldp2m2/{ldp2m2ID}', 'PendaftaranProjekController@deleteLDP2M2');

    Route::get('/pendaftaranprojek/senarai_audit/{projekID}', 'PendaftaranProjekController@senaraiAudit');
    Route::post('/pendaftaranprojek/tambah_audit/{projekID}', 'PendaftaranProjekController@tambahAudit');
    Route::get('/pendaftaranprojek/delete_audit/{auditID}', 'PendaftaranProjekController@deleteAudit');
    Route::post('/pendaftaranprojek/edit_audit/{auditID}', 'PendaftaranProjekController@editAudit');

    Route::get('/pendaftaranprojek/hantar/{projekID}', 'PendaftaranProjekController@hantarPendaftaran');

    Route::get('senarai_projek', 'ProjekController@senarai_projek')->name('projek.senarai_projek');
    Route::get('senarai_ahli/{projekID}', 'ProjekController@senarai_ahli')->name('projek.senarai_ahli');
    Route::get('/projek_fasa/{projekID}', 'ProjekController@projek_fasa');
    Route::get('senarai_projek/delete/{role}/{projekID}/{userID}', 'ProjekController@deleteAhli')->name('projek.deleteAhli');
    

    Route::post('daftarEO', 'EOController@daftarEO')->name('projek.daftarEO');
    Route::get('penukaranEO/{projekID}', 'EOController@penukaranEO')->name('projek.penukaranEO');
    Route::get('pendEO/{projekID}', 'EOController@pendEO')->name('projek.pendeo');
    Route::post('penukaranEO/{projekID}', 'EOController@penukaranEOSubmit')->name('projek.penukaranEOSubmit');

    Route::post('daftarEMC', 'EMCController@daftarEMC')->name('projek.daftarEMC');
    Route::post('simpanPengawasan', 'EMCController@simpanPengawasan')->name('projek.simpanPengawasan');
    Route::get('getPengawasan/{userID}/{projekID}', 'EMCController@getTableEMCPengawasan')->name('projek.getPengawasan');

    Route::get('penukaranEMC/{projekID}', 'EMCController@penukaranEMC')->name('projek.penukaranEMC');
    Route::get('pendEMC/{projekID}', 'EMCController@pendEMC')->name('projek.pendEMC');
    Route::post('penukaranEMC/{projekID}', 'EMCController@penukaranEMCSubmit')->name('projek.penukaranEMCSubmit');

    Route::get('daftar_penggerak_projek', 'ProjekController@daftar_projek')->name('projek.daftar_penggerak_projek');
    Route::post('daftar_penggerak_projek', 'ProjekController@daftar_projek_process')->name('projek.daftar_penggerak_projek');

    Route::post('registerexist', 'ProjekController@registerexist');
    Route::get('checkExist2/{id}', 'ProjekController@checkExist2');
    Route::get('jas/{id}', 'ProjekController@jas');

    Route::post('/login-process', 'AuthController@loginRegister')->name('log-pro');
    Route::post('/check-projek-external', 'AuthController@CheckProjekExternal')->name('check-projek-external');
    Route::get('/login-projek-external', 'AuthController@LoginProjekExternal')->name('login-projek-external');
    Route::get('/login-other-projek-external', 'AuthController@LoginOtherProjekExternal')->name('login-other-projek-external');
    Route::get('/listProjek/{username}/{password}', 'AuthController@ModalProjek')->name('listProjek');

    Route::get('daftar_projek', 'ProjekController@projek')->name('projek.daftar_projek');
    Route::get('daftar_projek_temp', 'ProjekController@projek_temp')->name('projek.daftar_projek_temp');
    Route::post('fasa', 'ProjekController@fasa')->name('projek.fasa');
    Route::post('savedate', 'ProjekController@saveDate')->name('projek.savedate');
    Route::get('editpakej/{id}', 'ProjekController@editpakej')->name('projek.editpakej');
    Route::get('daftar_projek1/{id}', 'ProjekController@projek')->name('projek.daftar_projek1');
    Route::post('audit', 'ProjekController@audit')->name('projek.audit');

    Route::post('addProjek', 'ProjekController@addProjek')->name('addProjek');
    Route::post('addProjekTab5', 'ProjekController@addProjekTab5')->name('addProjekTab5');
    Route::post('addProjektab1', 'ProjekController@addProjektab1')->name('addProjektab1');
    Route::post('addProjektab2', 'ProjekController@addProjektab2')->name('addProjektab2');

    Route::get('getFasa/{id}', 'ProjekController@getFasa')->name('getFasa');
    Route::get('kemaskinifasa/{id}', 'ProjekController@kemaskinifasa')->name('projek.kemaskinifasa');
    Route::post('updatefasa', 'ProjekController@updatefasa')->name('projek.updatefasa');
    Route::get('buangFasa/{id}', 'ProjekController@buangFasa')->name('buangFasa');

    Route::get('pakej_pengawasan/{id}', 'ProjekController@pakej_pengawasan')->name('pakej.pengawasan');
    Route::get('checkupeoemc/{id}', 'ProjekController@checkupeoemc')->name('pakej.checkupeoemc');
    Route::post('pakej', 'ProjekController@pakej')->name('pakej');

    Route::post('pendaftaraneoemc', 'ProjekController@pendaftaraneoemc')->name('pendaftaraneoemc');
    Route::post('pakejupdate', 'ProjekController@pakejupdate')->name('pakejupdate');
    Route::post('pakejeoemc', 'ProjekController@pakejeoemc')->name('pakejeoemc');
    Route::post('jenis_pakej', 'ProjekController@jenis_pakej')->name('jenis_pakej');
    Route::post('jenis_pakej_eo', 'ProjekController@jenis_pakej_eo')->name('jenis_pakej_eo');
    Route::post('jenis_pakej_emc', 'ProjekController@jenis_pakej_emc')->name('jenis_pakej_emc');

    Route::post('EMP', 'ProjekController@EMP')->name('EMP');
    Route::get('buangemp/{id}', 'ProjekController@buangemp');
    Route::get('getEMP/{id}', 'ProjekController@getEMP')->name('getEMP');

    Route::post('LDP2M2', 'ProjekController@LDP2M2')->name('LDP2M2');
    Route::get('getLDP2M2/{id}', 'ProjekController@getLDP2M2')->name('getLDP2M2');
    Route::get('buangLDP2M2/{id}', 'ProjekController@buangLDP2M2');

    Route::get('getTarikhAudit/{id}', 'ProjekController@getTarikhAudit')->name('getTarikhAudit');
    Route::get('getModalAudit/{id}', 'ProjekController@getModalAudit')->name('getModalAudit');
    Route::get('kemaskiniaudit/{id}', 'ProjekController@kemaskiniaudit')->name('projek.kemaskiniaudit');
    Route::get('kemaskiniaudit1/{id}', 'ProjekController@kemaskiniaudit1')->name('projek.kemaskiniaudit1');
    Route::post('updatemaklumataudit1', 'ProjekController@updatemaklumataudit1')->name('projek.updatemaklumataudit1');
    Route::post('updatemaklumataudit', 'ProjekController@updatemaklumataudit')->name('projek.updatemaklumataudit');

    Route::post('submitProjek/{id}', 'ProjekController@submitProjek')->name('submitProjek');
    Route::post('submitProjekIO', 'ProjekController@submitProjekIO')->name('submitProjekIO');

    Route::get('senarai', 'ProjekController@senarai_projek')->name('projek.senarai');
    Route::get('catatan', 'ProjekController@catatan')->name('projek.catatan');
    Route::get('kuiriview', 'ProjekController@kuiriview')->name('projek.kuiriview');

    Route::get('buangpakej/{id}', 'ProjekController@buangpakej')->name('buangpakej');

    Route::get('getTidakPakej/{id}', 'ProjekController@getTidakPakej')->name('getTidakPakej');

    Route::get('eotable', 'ProjekController@eotable')->name('eotable');

    Route::get('pakej_pengawasan/{id}', 'ProjekController@pakej_pengawasan')->name('pakej.pengawasan');

    Route::post('addsungai', 'ProjekController@jenispengawasan')->name('addsungai');
    Route::post('addmarin', 'ProjekController@jenispengawasan')->name('addmarin');
    Route::post('addtasik', 'ProjekController@jenispengawasan')->name('addtasik');
    Route::post('addtanah', 'ProjekController@jenispengawasan')->name('addtanah');
    Route::post('addair', 'ProjekController@jenispengawasan')->name('addair');
    Route::post('addUdara', 'ProjekController@jenispengawasan')->name('addUdara');
    Route::post('addBunyi', 'ProjekController@jenispengawasan')->name('addBunyi');
    Route::post('addGetaran', 'ProjekController@jenispengawasan')->name('addGetaran');
    Route::post('addDron', 'ProjekController@jenispengawasan')->name('addDron');

    // WTF looping dlm route
    $pengawasan = \App\MasterModel\MasterPengawasan::all();
    foreach ($pengawasan as $pengawasans) {
        Route::get('emctable' . $pengawasans->id, 'ProjekController@emctable' . $pengawasans->id)->name('emctable' . $pengawasans->id);
    }

    // newly added routes
    Route::get('/pendaftaranprojek', 'ProjekController@pendaftaranProjek')->name('projek.pendaftaran_projek');
    Route::get('/berfasa', 'ProjekController@berfasa')->name('form.berfasa');
    Route::get('/jadual', 'ProjekController@jadual')->name('form.bunyi');

    Route::get('/rekodekas', 'ProjekController@senaraiRekodEkas')->name('projek.rekodekas');

    Route::get('tabs3', 'ProjekController@tabs3')->name('project.tabs3');
    Route::get('tabs4', 'ProjekController@tabs4')->name('project.tabs4');

    Route::get('load-pengawasan/{pengawasan}/{projek}', 'ProjekController@loadPengawasan')->name('form.load.pengawasan');
    Route::get('stesen-sungai/{projek}', 'ProjekController@stesenSungai')->name('form.stesen.sungai');
    Route::get('stesen-marin/{projek}', 'ProjekController@stesenMarin')->name('form.stesen.marin');
    Route::get('stesen-tasik/{projek}', 'ProjekController@stesenTasik')->name('form.stesen.tasik');
    Route::get('stesen-air-tanah/{projek}', 'ProjekController@stesenAirTanah')->name('form.stesen.air-tanah');
    Route::get('stesen-kolam/{projek}', 'ProjekController@stesenKolam')->name('form.stesen.kolam');
    Route::get('stesen-udara/{projek}', 'ProjekController@stesenUdara')->name('form.stesen.udara');
    Route::get('stesen-bunyi/{projek}', 'ProjekController@stesenBunyi')->name('form.stesen.bunyi');
    Route::get('stesen-getaran/{projek}', 'ProjekController@stesenGetaran')->name('form.stesen.getaran');
    Route::get('stesen-dron/{projek}', 'ProjekController@stesenDron')->name('form.stesen.dron');

    //routes datatable semua stesen
    Route::get('/senarai/{projek}/{year}/{month}', 'ProjekController@senaraiStesen')->name('project.senarai.stesen');
    Route::get('/borangC', 'ProjekController@borangC')->name('project.borangC.modal');
    Route::post('/borang-c', 'ProjekController@tambahBorangC')->name('project.tambah.borang-c');
    Route::get('/senarai-borang-c/{projek}/{year}/{month}', 'ProjekController@senaraiBorangC')->name('project.senarai.borang-c');

    Route::group(['prefix' => 'view-borang-c'], function () {
        Route::group(['prefix' => 'sungai'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCSungaiModal')->name('form.sungai.borang-c-view');
        });
        Route::group(['prefix' => 'marin'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCMarinModal')->name('form.marin.borang-c-view');
        });
        Route::group(['prefix' => 'tasik'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCTasikModal')->name('form.tasik.borang-c-view');
        });
        Route::group(['prefix' => 'air-tanah'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCAirTanahModal')->name('form.air.tanah.borang-c-view');
        });
        Route::group(['prefix' => 'kolam'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCKolamModal')->name('form.kolam.borang-c-view');
        });
        Route::group(['prefix' => 'udara'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCUdaraModal')->name('form.udara.borang-c-view');
        });
        Route::group(['prefix' => 'bunyi-bising'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCBunyiBisingModal')->name('form.bunyi.bising.borang-c-view');
        });
        Route::group(['prefix' => 'getaran'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCGetaranModal')->name('form.getaran.borang-c-view');
        });
        Route::group(['prefix' => 'dron'], function () {
            Route::get('/{id}', 'ProjekController@viewBorangCDronModal')->name('form.dron.borang-c-view');
        });
    });
    Route::group(['prefix' => 'edit-borang-c'], function () {
        Route::group(['prefix' => 'sungai'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCSungaiModal')->name('form.sungai.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.sungai');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.sungai.modal');
        });
        Route::group(['prefix' => 'marin'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCMarinModal')->name('form.marin.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.marin');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.marin.modal');
        });
        Route::group(['prefix' => 'tasik'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCTasikModal')->name('form.tasik.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.tasik');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.tasik.modal');
        });
        Route::group(['prefix' => 'air-tanah'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCAirTanahModal')->name('form.air.tanah.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.air.tanah');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.air.tanah.modal');
        });
        Route::group(['prefix' => 'kolam'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCKolamModal')->name('form.kolam.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.kolam');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.kolam.modal');
        });
        Route::group(['prefix' => 'udara'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCUdaraModal')->name('form.udara.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.udara');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.udara.modal');
        });
        Route::group(['prefix' => 'bunyi-bising'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCBunyiBisingModal')->name('form.bunyi.bising.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.bunyi.bising');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.bunyi.bising.modal');
        });
        Route::group(['prefix' => 'getaran'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCGetaranModal')->name('form.getaran.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.getaran');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.getaran.modal');
        });
        Route::group(['prefix' => 'dron'], function () {
            Route::get('/{id}', 'ProjekController@editBorangCDronModal')->name('form.dron.borang-c-create');
            Route::match(['put', 'patch'], '/{monthlyC}', 'ProjekController@updateBorangC')->name('project.update.borangc.dron');
            Route::delete('/{monthlyC}', 'ProjekController@deleteBorangC')->name('project.delete.borangc.dron.modal');
        });
    });
Route::group(['prefix' => 'hantar-stesen'], function () {
    Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@hantarStesen')->name('project.hantar.stesen');
});

Route::group(['prefix' => 'sahkan-stesen'], function () {
    Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@sahkanStesen')->name('project.sahkan.stesen');
});

Route::group(['prefix' => 'semak-borang-c'], function () {
    Route::match(['put', 'patch'], '/{monthlyc}', 'ProjekController@semakBorangC')->name('project.semak.borang-c');
});

Route::group(['prefix' => 'view-stesen'], function () {
    Route::group(['prefix' => 'sungai'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenSungaiModal')->name('project.view.stesen.sungai.modal');
    });
    Route::group(['prefix' => 'marin'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenMarinModal')->name('project.view.stesen.marin.modal');
    });
    Route::group(['prefix' => 'tasik'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenTasikModal')->name('project.view.stesen.tasik.modal');
    });
    Route::group(['prefix' => 'air-tanah'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenAirTanahModal')->name('project.view.stesen.air.tanah.modal');
    });
    Route::group(['prefix' => 'kolam'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenKolamModal')->name('project.view.stesen.kolam.modal');
    });
    Route::group(['prefix' => 'udara'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenUdaraModal')->name('project.view.stesen.udara.modal');
    });
    Route::group(['prefix' => 'bunyi-bising'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenBunyiBisingModal')->name('project.view.stesen.bunyi.bising.modal');
    });
    Route::group(['prefix' => 'getaran'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenGetaranModal')->name('project.view.stesen.getaran.modal');
    });
    Route::group(['prefix' => 'dron'], function () {
        Route::get('/{stesen}', 'ProjekController@viewStesenDronModal')->name('project.view.stesen.dron.modal');
    });
});

Route::group(['prefix' => 'tambah-stesen'], function () {
    Route::group(['prefix' => 'sungai'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenSungaiModal')->name('project.tambah.stesen.sungai.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.sungai');
    });

    Route::group(['prefix' => 'marin'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenMarinModal')->name('project.tambah.stesen.marin.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.marin');
    });

    Route::group(['prefix' => 'tasik'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenTasikModal')->name('project.tambah.stesen.tasik.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.tasik');
    });

    Route::group(['prefix' => 'air-tanah'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenAirTanahModal')->name('project.tambah.stesen.air.tanah.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.air.tanah');
    });

    Route::group(['prefix' => 'kolam'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenKolamModal')->name('project.tambah.stesen.kolam.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.kolam');
    });

    Route::group(['prefix' => 'udara'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenUdaraModal')->name('project.tambah.stesen.udara.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.udara');
    });

    Route::group(['prefix' => 'bunyi-bising'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenBunyiBisingModal')->name('project.tambah.stesen.bunyi.bising.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.bunyi.bising');
    });

    Route::group(['prefix' => 'getaran'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenGetaranModal')->name('project.tambah.stesen.getaran.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.getaran');
    });

    Route::group(['prefix' => 'dron'], function () {
        Route::get('/{projek}', 'ProjekController@tambahStesenDronModal')->name('project.tambah.stesen.dron.modal');
        Route::post('/{projek}', 'ProjekController@tambahStesen')->name('project.tambah.stesen.dron');
    });
});

Route::group(['prefix' => 'edit-stesen'], function () {
    Route::group(['prefix' => 'sungai'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenSungaiModal')->name('project.edit.stesen.sungai.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.sungai');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.sungai.modal');
    });

    Route::group(['prefix' => 'marin'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenMarinModal')->name('project.edit.stesen.marin.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.marin');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.marin.modal');

    });

    Route::group(['prefix' => 'tasik'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenTasikModal')->name('project.edit.stesen.tasik.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.tasik');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.tasik.modal');
    });

    Route::group(['prefix' => 'air-tanah'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenAirTanahModal')->name('project.edit.stesen.air.tanah.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.air.tanah');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.air.tanah.modal');
    });

    Route::group(['prefix' => 'kolam'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenKolamModal')->name('project.edit.stesen.kolam.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.kolam');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.kolam.modal');
    });

    Route::group(['prefix' => 'udara'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenUdaraModal')->name('project.edit.stesen.udara.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.udara');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.udara.modal');
    });

    Route::group(['prefix' => 'bunyi-bising'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenBunyiBisingModal')->name('project.edit.stesen.bunyi.bising.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.bunyi.bising');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.bunyi.bising.modal');
    });

    Route::group(['prefix' => 'getaran'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenGetaranModal')->name('project.edit.stesen.getaran.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.getaran');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.getaran.modal');
    });

    Route::group(['prefix' => 'dron'], function () {
        Route::get('/{stesen}', 'ProjekController@editStesenDronModal')->name('project.edit.stesen.dron.modal');
        Route::match(['put', 'patch'], '/{stesen}', 'ProjekController@updateStesen')->name('project.update.stesen.dron');
        Route::delete('/{stesen}', 'ProjekController@deleteStesen')->name('project.delete.stesen.dron.modal');
    });
});

Route::group(['prefix' => 'download-file'], function () {
    Route::get('monthly-d/{id}', 'ProjekController@downloadFile')->name('projek.download.monthly-d.file');
});

});

Route::prefix('pengesahanprojek')->group(function () {
    Route::get('belumhantar', 'PengesahanProjekController@senarai_belumhantar')->name('pengesahanprojek.belumhantar');
    Route::get('belumsah', 'PengesahanProjekController@senarai_belumsah')->name('pengesahanprojek.belumsah');
    Route::get('sah', 'PengesahanProjekController@senarai_sah')->name('pengesahanprojek.sah');
    Route::get('sahsemula', 'PengesahanProjekController@senarai_sahsemula')->name('pengesahanprojek.sahsemula');

    Route::get('projek/{id}', 'PengesahanProjekController@projek')->name('pengesahanprojek.projek');

    Route::get('viewFasa/{id}', 'PengesahanProjekController@viewFasa')->name('viewFasa');

    Route::get('viewEMP/{id}', 'PengesahanProjekController@viewEMP')->name('viewEMP');

    Route::get('viewLDP2M2/{id}', 'PengesahanProjekController@viewLDP2M2')->name('viewLDP2M2');

    Route::get('viewAudit/{id}', 'PengesahanProjekController@viewAudit')->name('viewAudit');

    Route::get('viewSungai/{id}', 'PengesahanProjekController@viewSungai')->name('viewSungai');
    Route::get('viewMarin/{id}', 'PengesahanProjekController@viewMarin')->name('viewMarin');
    Route::get('viewTasik/{id}', 'PengesahanProjekController@viewTasik')->name('viewTasik');
    Route::get('viewTanah/{id}', 'PengesahanProjekController@viewTanah')->name('viewTanah');
    Route::get('viewAir/{id}', 'PengesahanProjekController@viewAir')->name('viewAir');
    Route::get('viewUdara/{id}', 'PengesahanProjekController@viewUdara')->name('viewUdara');
    Route::get('viewBunyi/{id}', 'PengesahanProjekController@viewBunyi')->name('viewBunyi');
    Route::get('viewGetaran/{id}', 'PengesahanProjekController@viewGetaran')->name('viewGetaran');
    Route::get('viewDron/{id}', 'PengesahanProjekController@viewDron')->name('viewDron');

    Route::prefix('viewStesen')->group(function () {
        Route::get('{id}', 'PengesahanProjekController@viewStesen')->name('pengesahanprojek.viewStesen');
    });

    Route::prefix('viewParameter')->group(function () {
        Route::get('{id}', 'PengesahanProjekController@viewParameter')->name('pengesahanprojek.viewParameter');
    });
    Route::get('getParameter/{id}', 'PengesahanProjekController@getParameter')->name('getParameter');

    Route::post('sahProjek', 'PengesahanProjekController@sahProjek')->name('sahProjek');

    Route::post('tidaklengkapProjek', 'PengesahanProjekController@tidaklengkapProjek')->name('tidaklengkapProjek');
});

Route::prefix('user')->group(function () {
    Route::prefix('internal')->group(function () {
        Route::get('/', 'UserInternalController@index')->name('user.internal');
        Route::post('/', 'UserInternalController@insert')->name('user.internal');
        Route::get('{id}', 'UserInternalController@edit')->name('user.internal.form');
        Route::get('tukar/{id}', 'UserInternalController@change')->name('user.internal.form');
        Route::post('{id}', 'UserInternalController@update')->name('user.internal.form');
        Route::post('/change/{id}', 'UserInternalController@updatechange')->name('user.internal.change.form');
        Route::get('password/{id}', 'UserInternalController@edit_password')->name('user.internal.password.form');
        Route::post('password/{id}', 'UserInternalController@update_password')->name('user.internal.password.form');
        Route::delete('{id}', 'UserInternalController@delete')->name('user.internal.form');
    });

    Route::prefix('external')->group(function () {
        Route::get('/', 'UserExternalController@index')->name('user.external');
        Route::get('/listpp', 'UserExternalController@listpp')->name('user.externalpp');
        Route::get('/listeo', 'UserExternalController@listeo')->name('user.externaleo');
        Route::get('/listemc', 'UserExternalController@listemc')->name('user.externalemc');
        Route::get('{id}/{projekID}', 'UserExternalController@edit')->name('user.external.form');
        Route::get('pp/{id}/{projek}', 'UserExternalController@edit2')->name('user.external.form2');
        Route::get('emc/{id}', 'UserExternalController@editemc')->name('user.external.formemc');
        Route::post('{id}', 'UserExternalController@update')->name('user.external.form');
        Route::post('/{id}/{projek}', 'UserExternalController@update2')->name('user.external.form2');
        Route::delete('{id}', 'UserExternalController@delete')->name('user.external.form');
        Route::get('password/{id}', 'UserExternalController@edit_password')->name('user.external.password.form');
        Route::post('password/{id}', 'UserExternalController@update_password')->name('user.external.password.form');
        Route::get('handover/{id}', 'UserExternalController@request_handover')->name('user.external.handover.form');
        Route::post('handover/{id}', 'UserExternalController@send_handover')->name('user.external.handover.form');
        Route::get('deactivate/{id}', 'UserExternalController@deactivate_external')->name('user.external.deactivate');
        Route::get('activate/{id}', 'UserExternalController@activate_external')->name('user.external.activate');
    });
});

Route::prefix('form')->group(function () {
    Route::get('/', 'FormController@form')->name('form');
    Route::get('list', 'FormController@list')->name('form.list');
    Route::get('elemen', 'FormController@elemen')->name('form.elemen');

    Route::post('/hantarborangescp', 'BorangAController@BorangESCP')->name('form.hantarBorangESCP');
    Route::get('/escpview/{id}', 'BorangAController@getEscp')->name('form.tableescp');
    Route::get('/deleteescp/{id}', 'BorangAController@deleteESCP')->name('form.deleteESCP');
    Route::get('/bahagianA/{id}', 'BorangAController@bahagianA')->name('form.bahagianA');
    Route::post('/sahbahagianA', 'BorangAController@postBorangA')->name('form.sahBorangA');
    Route::get('/bahagianB/{id}', 'BorangBController@getBorangB')->name('form.bahagianB');
    Route::post('/bsyarat', 'BorangBController@BorangB')->name('form.bSyarat');
    Route::post('/hantarSyarat', 'BorangBController@postSyarat')->name('form.postSyaratB');
    Route::get('/deleteSyarat/{syaratBID}', 'BorangBController@deleteSyarat')->name('form.deleteSyaratB');
    Route::post('/submit-borangef', 'BorangEFController@postBorangEF')->name('form.borangEF');

    Route::post('borangD/keluarmasuk', 'BorangDController@simpan_bmp_keluar_masuk')->name('form.borangDKeluarMasuk');
    Route::post('borangD/kawasan_sensitif', 'BorangDController@kawasan_sensitif')->name('form.borangDKawasanSensitif');
    Route::post('borangD/larian_air_permukaan', 'BorangDController@kawasan_larian_air_permukaan')->name('form.borangDKawasanLarianAirPermukaan');
    Route::post('borangD/parameter', 'BorangDController@parameter')->name('form.parameter');
    Route::post('borangD/tanah', 'BorangDController@tanah')->name('form.tanah');
    Route::post('borangD/pelupusan', 'BorangDController@pelupusan')->name('form.pelupusan');
    Route::post('borangD/bahan', 'BorangDController@bahan')->name('form.bahan');
    Route::post('borangD/jadual', 'BorangDController@jadual')->name('form.jadual');
    Route::post('borangD/selenggara', 'BorangDController@selenggara')->name('form.selenggara');
    Route::post('borangD/buangan', 'BorangDController@buangan')->name('form.buangan');
    Route::post('borangD/bancuhan', 'BorangDController@bancuhan')->name('form.bancuhan');
    Route::post('borangD/kawasanHakisan', 'BorangDController@kawasanHakisan')->name('form.kawasanHakisan');

    Route::post('/submitborangD', 'BorangDController@saveD')->name('form.submitborangD');
    Route::get('/get-form-d/{id}', 'LaporanHujanController@getD')->name('form.getformD');

    Route::post('submit-laporan_hujan', 'LaporanHujanController@saveHujan')->name('form.laporanHujan');
    Route::get('/get-hujan/{HujanID}', 'LaporanHujanController@getPemeriksaan');
    Route::get('getHujan/{id}', 'LaporanHujanController@getHujan')->name('form.getHujan');


});

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);

    return redirect()->back();

})->name('locale');

Route::prefix('general')->group(function () {
    Route::get('/', 'GeneralController@index')->name('general');
    Route::get('postcode-state/{postcode}', 'GeneralController@getStateFromPostcode')->name('general.getStateFromPostcode');
    Route::get('country-state/{country_id}', 'GeneralController@getStateFromCountry')->name('general.getStateFromCountry');
    Route::get('state-district/{state_id}', 'GeneralController@getDistrictFromState')->name('general.getDistrictFromState');
    Route::get('country-district/{country_id}', 'GeneralController@getDistrictFromCountry')->name('general.getDistrictFromCountry');
    Route::get('attachment/{attachment_id}/{filename}', 'GeneralController@getAttachment')->name('general.getAttachment');
    Route::get('letter/{letter_type_id}/{filename}', 'GeneralController@getLetterTemplate')->name('general.getLetterTemplate');
    Route::get('filing', 'GeneralController@getFilingDetails')->name('general.getFilingDetails');
    Route::get('filing1', 'GeneralController@getFlowDetails')->name('general.getFlowDetails');
});

Route::get('autologin/{id}', 'Auth\LoginController@autologin')->name('autologin'); //home

Route::prefix('handover')->group(function () {
    Route::get('{code}', 'Auth\HandOverController@index')->name('handover');
    Route::post('create', 'Auth\HandOverController@create')->name('handover.create');
});

// Email Verification
Route::get('auth/{username}/verify/{code}', 'Auth\RegisterController@verify')->name('auth.verify');

Route::prefix('inbox')->group(function () {
    Route::get('/', 'InboxController@index')->name('inbox');
    Route::get('{id}', 'InboxController@view')->name('inbox.view');
});

Route::prefix('monitoring')->group(function () {
    Route::get('/', 'MonitoringController@index')->name('monitoring');
});

Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::post('/', 'ProfileController@update')->name('profile');
    Route::post('update_password', 'ProfileController@update_password')->name('profile.update_password');
    Route::post('handover', 'ProfileController@handover')->name('profile.handover');
    Route::get('picture/{filename}', 'ProfileController@picture')->name('profile.picture');
});

Route::prefix('search')->group(function () {
    Route::get('/', 'SearchController@index')->name('search');
    Route::get('list', 'SearchController@list')->name('search.list');
    Route::get('{id}', 'SearchController@view_search')->name('search.view');
});

Route::prefix('distribution')->group(function () {
    Route::get('/', 'DistributionController@index')->name('distribution');
    Route::get('{id}', 'DistributionController@edit')->name('distribution.form');
    Route::post('{id}', 'DistributionController@update')->name('distribution.form');
});

Route::prefix('announcement')->group(function () {
    Route::get('/', 'AnnouncementController@index')->name('announcement');
    Route::post('/', 'AnnouncementController@insert')->name('announcement');
    Route::get('{id}', 'AnnouncementController@edit')->name('announcement.form');
    Route::post('{id}', 'AnnouncementController@update')->name('announcement.form');
    Route::delete('{id}', 'AnnouncementController@delete')->name('announcement.form');
});

Route::prefix('admin')->group(function () {

    Route::prefix('settings')->group(function () {
        Route::get('/', 'Admin\SettingsController@index')->name('admin.settings');
        Route::post('/', 'Admin\SettingsController@update')->name('admin.settings');
        Route::prefix('save')->group(function () {
            Route::post('/', 'Admin\SettingsController@settings_save')->name('admin.settings.save');
        });
        Route::prefix('checkemail')->group(function () {
            Route::post('/', 'Admin\SettingsController@checkEmail')->name('admin.settings.checkemail');
        });
        Route::get('picture/{filename}', 'Admin\SettingsController@picture')->name('settings.picture');
    });

    Route::prefix('holiday')->group(function () {
        Route::get('/', 'Admin\HolidayController@index')->name('admin.holiday');

        Route::prefix('general')->group(function () {
            Route::get('/', 'Admin\HolidayController@general_index')->name('admin.holiday.general');
            Route::post('/', 'Admin\HolidayController@general_insert')->name('admin.holiday.general');
            Route::get('{id}', 'Admin\HolidayController@general_edit')->name('admin.holiday.general.form');
            Route::post('{id}', 'Admin\HolidayController@general_update')->name('admin.holiday.general.form');
            Route::delete('{id}', 'Admin\HolidayController@general_delete')->name('admin.holiday.general.form');
        });

        Route::prefix('specific')->group(function () {
            Route::get('/', 'Admin\HolidayController@specific_index')->name('admin.holiday.specific');
            Route::post('/', 'Admin\HolidayController@specific_insert')->name('admin.holiday.specific');
            Route::get('{id}', 'Admin\HolidayController@specific_edit')->name('admin.holiday.specific.form');
            Route::post('{id}', 'Admin\HolidayController@specific_update')->name('admin.holiday.specific.form');
            Route::delete('{id}', 'Admin\HolidayController@specific_delete')->name('admin.holiday.specific.form');
        });

        Route::prefix('weekend')->group(function () {
            Route::post('/', 'Admin\HolidayController@weekend_update')->name('admin.holiday.weekend');
        });
    });

    Route::prefix('user')->group(function () {
        Route::prefix('internal')->group(function () {
            Route::get('/', 'Admin\User\UserInternalController@index')->name('admin.user.internal');
            Route::get('/list', 'Admin\User\UserInternalController@list')->name('admin.user.internal.list');
            Route::post('/', 'Admin\User\UserInternalController@insert')->name('admin.user.internal');
            Route::get('{id}', 'Admin\User\UserInternalController@edit')->name('admin.user.internal.form');
            Route::put('{id}', 'Admin\User\UserInternalController@update')->name('admin.user.internal.form');
            Route::get('password/{id}', 'Admin\User\UserInternalController@edit_password')->name('admin.user.internal.password.form');
            Route::post('password/{id}', 'Admin\User\UserInternalController@update_password')->name('admin.user.internal.password.form');
            Route::delete('{id}', 'Admin\User\UserInternalController@delete')->name('admin.user.internal.form');
        });

        Route::prefix('external')->group(function () {
            Route::get('/', 'Admin\User\UserExternalController@index')->name('admin.user.external');
            Route::get('{id}', 'Admin\User\UserExternalController@edit')->name('admin.user.external.form');
            Route::post('{id}', 'Admin\User\UserExternalController@update')->name('admin.user.external.form');
            Route::delete('{id}', 'Admin\User\UserExternalController@delete')->name('admin.user.external.form');
            Route::get('password/{id}', 'Admin\User\UserExternalController@edit_password')->name('admin.user.external.password.form');
            Route::post('password/{id}', 'Admin\User\UserExternalController@update_password')->name('admin.user.external.password.form');
            Route::get('handover/{id}', 'Admin\User\UserExternalController@request_handover')->name('admin.user.external.handover.form');
            Route::post('handover/{id}', 'Admin\User\UserExternalController@send_handover')->name('admin.user.external.handover.form');
        });
    });

    Route::prefix('role')->group(function () {
        Route::get('/', 'Admin\RoleController@index')->name('admin.role');
        Route::post('/', 'Admin\RoleController@insert')->name('admin.role');
        Route::get('{id}', 'Admin\RoleController@edit')->name('admin.role.form');
        Route::post('{id}', 'Admin\RoleController@update')->name('admin.role.form');
        Route::delete('{id}', 'Admin\RoleController@delete')->name('admin.role.form');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/', 'Admin\PermissionController@index')->name('admin.permission');
        Route::post('/', 'Admin\PermissionController@insert')->name('admin.permission');
        Route::get('{id}', 'Admin\PermissionController@edit')->name('admin.permission.form');
        Route::post('{id}', 'Admin\PermissionController@update')->name('admin.permission.form');
        Route::delete('{id}', 'Admin\PermissionController@delete')->name('admin.permission.form');
    });

    Route::prefix('access')->group(function () {
        Route::get('/', 'Admin\AccessController@index')->name('admin.access');
        Route::post('/', 'Admin\AccessController@insert')->name('admin.access');
        Route::post('/setpermission', 'Admin\AccessController@setpermission')->name('admin.access.setpermission');
        Route::post('/revokepermission', 'Admin\AccessController@revokepermission')->name('admin.access.revokepermission');
        Route::get('{id}', 'Admin\AccessController@edit')->name('admin.access.form');
        Route::post('{id}', 'Admin\AccessController@update')->name('admin.access.form');
        Route::delete('{id}', 'Admin\AccessController@delete')->name('admin.access.form');
        Route::get('view/{id}', 'Admin\AccessController@view')->name('admin.access.view');
    });

    Route::prefix('backup')->group(function () {
        Route::get('/', 'Admin\BackupController@index')->name('admin.backup');
        Route::post('/', 'Admin\BackupController@store')->name('admin.backup');
        Route::delete('{filename}', 'Admin\BackupController@delete')->name('admin.backup.data');
        Route::get('{filename}', 'Admin\BackupController@download')->name('admin.backup.data');
    });
    
    Route::prefix('notification')->group(function () {
      Route::get('/', 'Admin\NotificationController@index')->name('admin.notification');
      Route::get('/create', 'Admin\NotificationController@create')->name('admin.notification.create');
      Route::post('/', 'Admin\NotificationController@store')->name('admin.notification.store');
      Route::get('{notification}', 'Admin\NotificationController@show')->name('admin.notification.show');
      Route::get('{notification}/edit', 'Admin\NotificationController@edit')->name('admin.notification.edit');
      Route::put('{notification}/edit', 'Admin\NotificationController@update')->name('admin.notification.update');
      Route::delete('{notification}', 'Admin\NotificationController@delete')->name('admin.notification.destroy');
      Route::post('setactivationsystem/{id}', 'Admin\NotificationController@setactivationsystem')->name('admin.notification.setactivationsystem');
      Route::post('setactivationemel/{id}', 'Admin\NotificationController@setactivationemel')->name('admin.notification.setactivationemel');
      Route::get('send/{id}', 'Admin\NotificationController@sendform')->name('admin.notification.send');
      Route::post('send/{id}', 'Admin\NotificationController@sendprocess')->name('admin.notification.send');
  });

    Route::prefix('flow')->group(function () {
        Route::get('/', 'Admin\FlowController@index')->name('admin.flow');
        Route::post('/', 'Admin\FlowController@insert')->name('admin.flow');
        Route::get('{id}', 'Admin\FlowController@edit')->name('admin.flow.form');
        Route::post('{id}', 'Admin\FlowController@update')->name('admin.flow.form');
        Route::delete('{id}', 'Admin\FlowController@delete')->name('admin.flow.form');
    });

    Route::prefix('module')->group(function () {

        Route::get('/', 'Admin\ModuleController@index')->name('admin.module');
        Route::post('/', 'Admin\ModuleController@insert')->name('admin.module');
        Route::get('{id}', 'Admin\ModuleController@edit')->name('admin.module.form');
        Route::post('{id}', 'Admin\ModuleController@update')->name('admin.module.form');
        Route::delete('{id}', 'Admin\ModuleController@delete')->name('admin.flow.form');

        Route::prefix('{id}')->group(function () {
            Route::prefix('attachment')->group(function () {
                Route::get('/', 'Admin\ModuleController@attachment_index')->name('admin.module.item.attachment');
                Route::post('/', 'Admin\ModuleController@attachment_insert')->name('admin.module.item.attachment');
                Route::delete('{attachment_id}', 'Admin\ModuleController@attachment_delete')->name('admin.module.item.attachment.item');
            });
        });
    });

    Route::prefix('menu')->group(function () {
        Route::get('/', 'Admin\MenuController@index')->name('admin.menu');
        Route::post('/', 'Admin\MenuController@insert')->name('admin.menu');
        Route::get('{id}', 'Admin\MenuController@edit')->name('admin.menu.form');
        Route::post('{id}', 'Admin\MenuController@update')->name('admin.menu.form');
        Route::delete('{id}', 'Admin\MenuController@delete')->name('admin.menu.form');
    });

    Route::prefix('faq')->group(function () {
        Route::get('/', 'Admin\FaqController@index')->name('admin.faq');
        Route::post('/', 'Admin\FaqController@insert')->name('admin.faq');
        Route::get('{id}', 'Admin\FaqController@edit')->name('admin.faq.form');
        Route::post('{id}', 'Admin\FaqController@update')->name('admin.faq.form');
        Route::delete('{id}', 'Admin\FaqController@delete')->name('admin.faq.form');
    });

    Route::prefix('signature')->group(function () {
        Route::get('/', 'Admin\SignatureController@index')->name('admin.signature');
        Route::post('/', 'Admin\SignatureController@insert')->name('admin.signature');
        Route::get('{id}', 'Admin\SignatureController@edit')->name('admin.signature.form');
        Route::post('{id}', 'Admin\SignatureController@update')->name('admin.signature.form');
        Route::delete('{id}', 'Admin\SignatureController@delete')->name('admin.signature.form');
    });

    Route::prefix('form')->group(function () {
        Route::get('/', 'Admin\FormController@index')->name('admin.form');
        Route::post('/', 'Admin\FormController@insert')->name('admin.form');
        Route::get('{id}', 'Admin\FormController@edit')->name('admin.form.form');
        Route::post('{id}', 'Admin\FormController@update')->name('admin.form.form');
        Route::delete('{id}', 'Admin\FormController@delete')->name('admin.form.form');
    });

    Route::prefix('complaint')->group(function () {
        Route::get('/', 'ComplaintController@index')->name('complaint.index');
        Route::post('/', 'ComplaintController@insert')->name('complaint');
    });

    Route::prefix('letter')->group(function () {
        Route::get('/', 'Admin\LetterController@index')->name('admin.letter');
        Route::post('/', 'Admin\LetterController@insert')->name('admin.letter');
        Route::delete('delete/{id}', 'Admin\LetterController@delete')->name('admin.letter.delete');
        Route::get('editdirect/{id}', 'Admin\LetterController@editdirect')->name('admin.letter.editdirect');

        Route::prefix('{id}')->group(function () {
            Route::get('/', 'Admin\LetterController@edit')->name('admin.letter.form');
            Route::get('/downloadpdf', 'Admin\LetterController@downloadpdf')->name('admin.letter.downloadpdf');
            Route::get('/downloadword', 'Admin\LetterController@downloadword')->name('admin.letter.downloadword');

            Route::prefix('attachment')->group(function () {
                Route::get('/', 'Admin\LetterController@attachment_index')->name('admin.letter.attachment');
                Route::post('/', 'Admin\LetterController@attachment_insert')->name('admin.letter.attachment');
                Route::delete('/', 'Admin\LetterController@attachment_delete')->name('admin.letter.attachment.item');
            });

        });
    });

    Route::prefix('log')->group(function () {
        Route::get('/', 'Admin\LogController@index')->name('admin.log');
        Route::get('{id}', 'Admin\LogController@view')->name('admin.log.view');
    });

    Route::prefix('quicktemplate')->group(function () {
        Route::get('/', 'Admin\QuickTemplateController@index')->name('admin.quicktemplate');
        Route::post('/', 'Admin\QuickTemplateController@insert')->name('admin.quicktemplate');
        Route::get('{id}', 'Admin\QuickTemplateController@edit')->name('admin.quicktemplate.form');
        Route::post('{id}', 'Admin\QuickTemplateController@update')->name('admin.quicktemplate.form');
        Route::post('setdefault/{id}', 'Admin\QuickTemplateController@setdefault')->name('admin.quicktemplate.setdefault');
        Route::delete('{id}', 'Admin\QuickTemplateController@delete')->name('admin.quicktemplate.form');
    });

    Route::prefix('master')->group(function () {
        Route::prefix('announcement-type')->group(function () {
            Route::get('/', 'Admin\Master\AnnouncementTypeController@index')->name('admin.master.announcement-type');
            Route::post('/', 'Admin\Master\AnnouncementTypeController@insert')->name('admin.master.announcement-type');
            Route::get('{id}', 'Admin\Master\AnnouncementTypeController@edit')->name('admin.master.announcement-type.form');
            Route::post('{id}', 'Admin\Master\AnnouncementTypeController@update')->name('admin.master.announcement-type.form');
            Route::delete('{id}', 'Admin\Master\AnnouncementTypeController@delete')->name('admin.master.announcement-type.form');
        });

        Route::prefix('holiday-type')->group(function () {
            Route::get('/', 'Admin\Master\HolidayTypeController@index')->name('admin.master.holiday-type');
            Route::post('/', 'Admin\Master\HolidayTypeController@insert')->name('admin.master.holiday-type');
            Route::get('{id}', 'Admin\Master\HolidayTypeController@edit')->name('admin.master.holiday-type.form');
            Route::post('{id}', 'Admin\Master\HolidayTypeController@update')->name('admin.master.holiday-type.form');
            Route::delete('{id}', 'Admin\Master\HolidayTypeController@delete')->name('admin.master.holiday-type.form');
        });

        Route::prefix('faq-type')->group(function () {
            Route::get('/', 'Admin\Master\FaqTypeController@index')->name('admin.master.faq-type');
            Route::post('/', 'Admin\Master\FaqTypeController@insert')->name('admin.master.faq-type');
            Route::get('{id}', 'Admin\Master\FaqTypeController@edit')->name('admin.master.faq-type.form');
            Route::post('{id}', 'Admin\Master\FaqTypeController@update')->name('admin.master.faq-type.form');
            Route::delete('{id}', 'Admin\Master\FaqTypeController@delete')->name('admin.master.faq-type.form');
        });

        Route::prefix('province-office')->group(function () {
            Route::get('/', 'Admin\Master\ProvinceOfficeController@index')->name('admin.master.province-office');
            Route::post('/', 'Admin\Master\ProvinceOfficeController@insert')->name('admin.master.province-office');
            Route::get('{id}', 'Admin\Master\ProvinceOfficeController@edit')->name('admin.master.province-office.form');
            Route::post('{id}', 'Admin\Master\ProvinceOfficeController@update')->name('admin.master.province-office.form');
            Route::delete('{id}', 'Admin\Master\ProvinceOfficeController@delete')->name('admin.master.province-office.form');
        });

        Route::prefix('designation')->group(function () {
            Route::get('/', 'Admin\Master\DesignationController@index')->name('admin.master.designation');
            Route::post('/', 'Admin\Master\DesignationController@insert')->name('admin.master.designation');
            Route::get('{id}', 'Admin\Master\DesignationController@edit')->name('admin.master.designation.form');
            Route::post('{id}', 'Admin\Master\DesignationController@update')->name('admin.master.designation.form');
            Route::delete('{id}', 'Admin\Master\DesignationController@delete')->name('admin.master.designation.form');
        });
        Route::prefix('pengguna_luar')->group(function () {
            Route::get('/emc', 'PenggunaLuarController@emc')->name('pengguna_luar.emc');
            Route::get('/eo', 'PenggunaLuarController@eo')->name('pengguna_luar.eo');
            Route::get('/pp', 'PenggunaLuarController@pp')->name('pengguna_luar.pp');
        });
    });

    Route::prefix('review')->group(function () {
        Route::get('ca', 'Review\ReviewController@list_ca')->name('admin.review.ca');
        Route::get('view-ca', 'Review\ReviewController@view_ca')->name('admin.review.ca.item');


        Route::prefix('list')->group(function () {
            Route::get('nofile', 'Review\ReviewController@nofile_upload_list')->name('admin.review.list.nofile');
        });

        Route::prefix('upload')->group(function () {
            Route::get('nofile', 'Review\ReviewController@view_nofile_upload')->name('admin.review.upload.nofile');
            Route::post('nofile', 'Review\ReviewController@nofile_upload')->name('admin.review.upload.nofile');

            Route::prefix('edit')->group(function () {
                Route::get('ca/{id}', 'Review\ReviewController@ca_edit_upload')->name('admin.review.edit.ca');
            });
        });


        Route::prefix('download')->group(function () {
            Route::get('ca/{id}', 'Review\ReviewController@ca_download')->name('admin.review.download.ca');
        });

        

        Route::prefix('submit')->group(function () {
            Route::post('nofile', 'Review\ReviewController@nofile_upload_submit')->name('admin.review.submit.nofile');
        });

        Route::prefix('search')->group(function () {
            Route::get('ca/{registration_no}', 'Review\ReviewController@list_search_ca')->name('admin.review.search.ca');
        });

        Route::delete('nofile/{id}', 'Review\ReviewController@nofile_delete')->name('admin.review.delete.nofile');
    });

});
include 'routes/routes_admin.php';
