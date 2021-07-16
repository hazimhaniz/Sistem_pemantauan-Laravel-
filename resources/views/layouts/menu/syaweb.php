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

Route::get('login/announcement/{id}', 'Auth\LoginController@announcement')->name('login.announcement');
Route::get('login/faq/{id}', 'Auth\LoginController@faq')->name('login.faq');

Auth::routes();

Route::prefix('api')->group(function () {
	Route::post('database', 'API\DatabaseController@index')->name('api.database');
});

Route::prefix('home')->group(function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('list', 'HomeController@list')->name('home.list');
});

Route::prefix('form')->group(function () {
	Route::get('/', 'FormController@form')->name('form');
	Route::get('list', 'FormController@list')->name('form.list');
	Route::get('elemen', 'FormController@elemen')->name('form.elemen');
});

Route::get('locale/{locale}', function($locale){
	Session::put('locale',$locale);

	return redirect()->back();

})->name('locale');

Route::prefix('general')->group(function () {
	Route::get('/','GeneralController@index')->name('general');
	Route::get('postcode-state/{postcode}', 'GeneralController@getStateFromPostcode')->name('general.getStateFromPostcode');
	Route::get('country-state/{country_id}', 'GeneralController@getStateFromCountry')->name('general.getStateFromCountry');
	Route::get('state-district/{state_id}', 'GeneralController@getDistrictFromState')->name('general.getDistrictFromState');
	Route::get('country-district/{country_id}', 'GeneralController@getDistrictFromCountry')->name('general.getDistrictFromCountry');
	Route::get('attachment/{attachment_id}/{filename}', 'GeneralController@getAttachment')->name('general.getAttachment');
	Route::get('letter/{letter_type_id}/{filename}', 'GeneralController@getLetterTemplate')->name('general.getLetterTemplate');
	Route::get('filing', 'GeneralController@getFilingDetails')->name('general.getFilingDetails');
	Route::get('filing1', 'GeneralController@getFlowDetails')->name('general.getFlowDetails');
});

Route::get('autologin/{id}', 'Auth\LoginController@autologin')->name('autologin');	//home

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

Route::prefix('admin')->group(function(){

	Route::prefix('settings')->group(function () {
		Route::get('/', 'Admin\SettingsController@index')->name('admin.settings');
		Route::post('/', 'Admin\SettingsController@update')->name('admin.settings');
		Route::prefix('save')->group(function() {
			Route::post('/', 'Admin\SettingsController@settings_save')->name('admin.settings.save');
		});
		Route::prefix('checkemail')->group(function() {
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

		Route::prefix('weekend')->group(function() {
			Route::post('/', 'Admin\HolidayController@weekend_update')->name('admin.holiday.weekend');
		});
	});

	Route::prefix('user')->group(function () {
		Route::prefix('internal')->group(function () {
			Route::get('/', 'Admin\User\UserInternalController@index')->name('admin.user.internal');
			Route::post('/', 'Admin\User\UserInternalController@insert')->name('admin.user.internal');
			Route::get('{id}', 'Admin\User\UserInternalController@edit')->name('admin.user.internal.form');
			Route::post('{id}', 'Admin\User\UserInternalController@update')->name('admin.user.internal.form');
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
		Route::post('/', 'Admin\NotificationController@insert')->name('admin.notification');
		Route::get('{id}', 'Admin\NotificationController@edit')->name('admin.notification.form');
		Route::post('{id}', 'Admin\NotificationController@update')->name('admin.notification.form');
		Route::post('setactivationsystem/{id}', 'Admin\NotificationController@setactivationsystem')->name('admin.notification.setactivationsystem');
		Route::post('setactivationemel/{id}', 'Admin\NotificationController@setactivationemel')->name('admin.notification.setactivationemel');
		Route::get('send/{id}', 'Admin\NotificationController@sendform')->name('admin.notification.send');
		Route::post('send/{id}', 'Admin\NotificationController@sendprocess')->name('admin.notification.send');
		Route::delete('{id}', 'Admin\NotificationController@delete')->name('admin.notification.form');
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

	Route::prefix('complaint')->group(function() {
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

		Route::prefix('projek')->group(function (){
			Route::get('/senaraiprojek','ProjekController@senaraiProjek')->name('projek.senarai_projek');
			Route::get('/pendaftaranprojek','ProjekController@pendaftaranProjek')->name('projek.pendaftaran_projek');
		});
	});
});
