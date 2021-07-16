<?php

Route::prefix('kuiri')->group(function () {
	Route::get('/{type}/{id}/{projek_id}', 'KuiriController@index')->name('kuiri.index');
	Route::get('kuirib/{type}/{id}/{projek_id}', 'KuiriController@kuirib')->name('kuiri.kuirib');
	Route::get('kuiriview/{type}/{id}/{projek_id}', 'KuiriController@index1')->name('kuiri.index');
  Route::post('/simpan', 'KuiriController@simpan')->name('kuiri.simpan');
	Route::get('/balasan/{id}/{projek_id}', 'KuiriController@balasan')->name('kuiri.balasan');
	Route::post('/simpan/balasan', 'KuiriController@simpanbalasan')->name('kuiri.balasan.simpan');

	Route::prefix('attachment')->group(function () {
		Route::get('/{id}', 'KuiriController@balasangambar_index')->name('kuiri.balasangambar');
		Route::post('/{id}', 'KuiriController@balasangambar_insert')->name('kuiri.balasangambar');
		Route::delete('/', 'KuiriController@balasangambar_delete1')->name('kuiri.balasangambar');
		Route::get('jadual/delete/{id}', 'KuiriController@gambarfoto_delete')->name('kuiri.deletegambar');
	});
});
