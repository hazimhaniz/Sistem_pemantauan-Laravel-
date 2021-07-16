<?php
Route::prefix('pengesahanprojek')->group(function () {
	Route::get('belumhantar','Pegawai\PengesahanProjekController@senarai_belumhantar')->name('pegawai.pengesahanprojek.belumhantar');
	Route::get('belumsah','Pegawai\PengesahanProjekController@senarai_belumsah')->name('pegawai.pengesahanprojek.belumsah');
	Route::get('sah','Pegawai\PengesahanProjekController@senarai_sah')->name('pegawai.pengesahanprojek.sah');
	Route::get('sahsemula','Pegawai\PengesahanProjekController@senarai_sahsemula')->name('pegawai.pengesahanprojek.sahsemula');

	Route::get('projek/{id}','Pegawai\PengesahanProjekController@projek')->name('pegawai.pengesahanprojek.projek');

	Route::get('viewFasa/{id}','Pegawai\PengesahanProjekController@viewFasa')->name('viewFasa');

	Route::get('viewEMP/{id}','Pegawai\PengesahanProjekController@viewEMP')->name('viewEMP');

	Route::get('viewLDP2M2/{id}','Pegawai\PengesahanProjekController@viewLDP2M2')->name('viewLDP2M2');

	Route::get('viewAudit/{id}','Pegawai\PengesahanProjekController@viewAudit')->name('viewAudit');

	Route::get('viewSungai/{id}','Pegawai\PengesahanProjekController@viewSungai')->name('viewSungai');
	Route::get('viewMarin/{id}','Pegawai\PengesahanProjekController@viewMarin')->name('viewMarin');
	Route::get('viewTasik/{id}','Pegawai\PengesahanProjekController@viewTasik')->name('viewTasik');
	Route::get('viewTanah/{id}','Pegawai\PengesahanProjekController@viewTanah')->name('viewTanah');
	Route::get('viewAir/{id}','Pegawai\PengesahanProjekController@viewAir')->name('viewAir');
	Route::get('viewUdara/{id}','Pegawai\PengesahanProjekController@viewUdara')->name('viewUdara');
	Route::get('viewBunyi/{id}','Pegawai\PengesahanProjekController@viewBunyi')->name('viewBunyi');
	Route::get('viewGetaran/{id}','Pegawai\PengesahanProjekController@viewGetaran')->name('viewGetaran');
	Route::get('viewDron/{id}','Pegawai\PengesahanProjekController@viewDron')->name('viewDron');

	Route::prefix('viewStesen')->group(function () {
		Route::get('{id}', 'Pegawai\PengesahanProjekController@viewStesen')->name('pegawai.pengesahanprojek.viewStesen');
	});

	Route::prefix('viewParameter')->group(function () {
		Route::get('{id}', 'Pegawai\PengesahanProjekController@viewParameter')->name('pegawai.pengesahanprojek.viewParameter');
	});
	Route::get('getParameter/{id}', 'Pegawai\PengesahanProjekController@getParameter')->name('getParameter');

	Route::post('sahProjek', 'Pegawai\PengesahanProjekController@sahProjek')->name('sahProjek');

	Route::post('tidaklengkapProjek', 'Pegawai\PengesahanProjekController@tidaklengkapProjek')->name('tidaklengkapProjek');
});

Route::prefix('rekodEkas')->group(function () {
	Route::get('senarai', 'Pegawai\RekodEkasController@index')->name('rekodEkas.senarai');
	Route::get('edit/{id}', 'Pegawai\RekodEkasController@edit')->name('edit');
	Route::post('update/{id}', 'Pegawai\RekodEkasController@update')->name('update');
});

Route::prefix('stesen')->group(function () {
	Route::get('penambahan', 'Pegawai\StesenController@index')->name('penambahan.stesen');
	Route::get('stesen_pengawasan_edit/{id}/{projekid}', 'Pegawai\StesenController@stesenpengawasanedit')->name('stesen.pengawasan.stesen.edit');
	Route::post('submitstesenstatuspenyiasat/{id}', 'Pegawai\StesenController@submitstesenstatuspenyiasat')->name('submitstesenstatuspenyiasat');
});

Route::prefix('pelaporan')->group(function () {
	Route::get('senaraipelaporanindex', 'Pegawai\PelaporanController@senaraipelaporanindex')->name('penyiasat.pelaporan.indexsenaraipelaporan');
	Route::get('senaraipelaporan', 'Pegawai\PelaporanController@senaraipelaporan')->name('penyiasat.pelaporan.senaraipelaporan');
	Route::get('senaraipelaporansiasatan', 'Pegawai\PelaporanController@senaraipelaporansiasatan')->name('penyiasat.pelaporan.senaraipelaporansiasatan');
	Route::get('laporansiasatanedit/{projekid}/{tahun}/{bulan}', 'Pegawai\PelaporanController@laporansiasatanedit')->name('penyiasat.pelaporan.laporansiasatanedit');
	
	Route::post('savelaporansiasatan1', 'Pegawai\PelaporanController@savelaporansiasatan1')->name('penyiasat.pelaporan.savelaporansiasatan1');
	Route::get('lihatlaporansiasatan/{id}', 'Pegawai\PelaporanController@lihatlaporansiasatan1')->name('penyiasat.pelaporan.laporansiasatan1');
	Route::get('pengesahanlaporan', 'Pegawai\PelaporanController@pengesahanlaporan')->name('penyiasat.pengesahan.laporan');
	Route::get('pengesahansemakan', 'Pegawai\PelaporanController@pengesahansemakan')->name('penyiasat.pelaporan.pengesahansemakan');
	Route::post('pindaanlaporan', 'Pegawai\PelaporanController@pindaanlaporan')->name('penyiasat.pelaporan.pindaanlaporan');
	Route::get('downloadpdf', 'Pegawai\PelaporanController@downloadpdf')->name('penyiasat.pelaporan.downloadpdf');
	Route::get('cetakanlaporan', 'Pegawai\PelaporanController@cetakanlaporan')->name('cetakan.laporan');
	Route::post('savelaporansiasatan', 'Pegawai\PelaporanController@savelaporansiasatan')->name('penyiasat.pelaporan.savelaporansiasatan');
	Route::post('datalaporansiasatan', 'Pegawai\PelaporanController@datalaporansiasatan')->name('penyiasat.pelaporan.datalaporansiasatan');
	Route::get('laporansiasatan/{id}', 'Pegawai\PelaporanController@laporansiasatan')->name('penyiasat.pelaporan.laporansiasatan');
	Route::get('getLaporanSiasatan/{id}', 'Pegawai\PelaporanController@senaraipelaporan')->name('getLaporanSiasatan');


	Route::get('cetakLaporanSiasatan/{projekid}/{tahun}/{bulan}', 'Pegawai\PelaporanController@laporan_siasatan_pdf')->name('cetakLaporanSiasatan');

	Route::get('cetakLaporanIndex/{projekid}/{tahun}/{bulan}/{indextanah}/{indexmarin}', 'Pegawai\PelaporanController@laporan_index_pdf')->name('cetakLaporanIndex');
});

Route::prefix('laporan')->group(function () {
		Route::get('permakahan', 'Pegawai\LaporanController@permakahan')->name('pegawai.laporan.permakahan');
		Route::get('permakahanindex', 'Pegawai\LaporanController@permakahanindex')->name('pegawai.laporan.permakahanindex'); 
		Route::get('pematuhanindex', 'Pegawai\LaporanController@pematuhanindex')->name('pegawai.laporan.pematuhanindex'); 
		Route::post('permakahantambah', 'Pegawai\LaporanController@permakahantambah')->name('pegawai.laporan.permakahan.tambah');
		Route::get('statistik', 'Pegawai\LaporanController@statistik')->name('pegawai.laporan.statistik');
		Route::get('statistiksingle', 'Pegawai\LaporanController@statistik_single')->name('pegawai.laporan.statistiksingle');


		Route::get('statistikpemarkahan', 'Pegawai\LaporanController@statistikpemarkahan')->name('pegawai.laporan.statistikpemarkahan');

		Route::get('statistikeia', 'Pegawai\LaporanController@statistikeia')->name('pegawai.laporan.statistikeia');
		Route::get('statistikeiasearch', 'Pegawai\LaporanController@statistikeiasearch')->name('pegawai.laporan.statistikeiasearch');


		// Route::get('pengawasan', 'Pegawai\LaporanController@pengawasan')->name('pegawai.laporan.pengawasan');
		Route::post('statistikparameter', 'Pegawai\LaporanController@statistikparameter')->name('pegawai.laporan.statistikparameter');
		Route::post('lembangansungai', 'Pegawai\LaporanController@lembangansungai')->name('pegawai.laporan.lembangansungai');
		Route::post('sungaistesen', 'Pegawai\LaporanController@sungaistesen')->name('pegawai.laporan.sungaistesen');
		Route::get('statusprojek', function () {
				return view('pegawai.laporan.statusprojek');
		})->name('pegawai.laporan.statusprojek');
		Route::get('graflaporananalisa', function () {
				return view('pegawai.laporan.graflaporananalisa');
		})->name('pegawai.laporan.graflaporananalisa');
		Route::get('pengawasan', function () {
				return view('pegawai.laporan.pengawasan');
		})->name('pegawai.laporan.pengawasan');
});
