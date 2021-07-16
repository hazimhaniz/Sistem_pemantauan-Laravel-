<?php

Route::prefix('profile')->group(function () {
	Route::get('/', 'ProfileController@index')->name('profile.index');
	Route::post('/', 'ProfileController@update')->name('profile');
	Route::post('update_password', 'ProfileController@update_password')->name('profile.update_password');
	Route::post('handover', 'ProfileController@handover')->name('profile.handover');
});
Route::get('profilepicture/{filename}', 'ProfileController@picture')->name('profile.picture');

Route::prefix('general')->group(function () {
	Route::get('postcode-state/{postcode}', 'GeneralController@getStateFromPostcode')->name('general.getStateFromPostcode');
	Route::get('state-district/{state_id}', 'GeneralController@getDistrictFromState')->name('general.getDistrictFromState');
	Route::get('state-city/{state_id}', 'GeneralController@getDistrictFromCity')->name('general.getDistrictFromCity');
	Route::get('lembangan-sungai/{lembangan_id}', 'GeneralController@getLembanganSungai')->name('general.getLembanganSungai');
	Route::get('attachment/{attachment_id}/{filename}', 'GeneralController@getAttachment')->name('general.getAttachment');
	Route::get('letter/{letter_type_id}/{filename}', 'GeneralController@getLetterTemplate')->name('general.getLetterTemplate');
	Route::get('filing', 'GeneralController@getFilingDetails')->name('general.getFilingDetails');
	Route::get('filing1', 'GeneralController@getFlowDetails')->name('general.getFlowDetails');
	Route::get('kuiri', 'GeneralController@pengurusankuiri')->name('pengurusan.kuiri');

	Route::get('getSungaiFromStesen/{stesen_id}', 'GeneralController@getSungaiFromStesen')->name('general.getSungaiFromStesen');
});
