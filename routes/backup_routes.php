Route::prefix('missing_passport')->group(function(){
			
			Route::post('/', 'RecordMissingPassport\RecordMissingPassportController@create')->name('application.record.missing_passport');

			Route::prefix('list')->group(function () {
				Route::get('/', 'RecordMissingPassport\RecordMissingPassportController@list')->name('application.record.missing_passport.list');
			});

			Route::get('view/{id}', 'RecordMissingPassport\RecordMissingPassportController@view')->name('application.record.missing_passport.view');

			Route::prefix('form')->group(function () {
			
				Route::get('{id}', 'RecordMissingPassport\RecordMissingPassportController@edit')->name('application.record.missing_passport.form');
				Route::post('{id}', 'RecordMissingPassport\RecordMissingPassportController@update')->name('application.record.missing_passport.form');
				Route::delete('{id}', 'RecordMissingPassport\RecordMissingPassportController@delete')->name('application.record.missing_passport.form');

			});

			// Route bagi proses Multiple File Uploads
			Route::prefix('{id}')->group(function () {

				Route::prefix('attachment')->group(function () {
					Route::get('/', 'RecordMissingPassport\RecordMissingPassportController@attachment_index')->name('application.record.missing_passport.attachment');
					Route::post('/', 'RecordMissingPassport\RecordMissingPassportController@attachment_insert')->name('application.record.missing_passport.attachment');
					Route::delete('{attachment_id}', 'RecordMissingPassport\RecordMissingPassportController@attachment_delete')->name('application.record.missing_passport.attachment.item');
				});

			});
	});