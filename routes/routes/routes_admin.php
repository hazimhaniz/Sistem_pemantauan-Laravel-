<?php

Route::prefix('admin')->group(function () {

  Route::prefix('ADintegration')->group(function() {
  	Route::get('/', 'Admin\ADintegrationController@index')->name('adintegration.index');
  });

  Route::prefix('complaint')->group(function() {
  	Route::get('/', 'ComplaintController@index')->name('complaint.index');
  	Route::post('/', 'ComplaintController@insert')->name('admin.complaint');
  });

  Route::prefix('complaint-classification')->group(function () {
   Route::get('/', 'Admin\Master\ComplaintClassificationController@index')->name('admin.master.complaint-classification');
   Route::post('/', 'Admin\Master\ComplaintClassificationController@insert')->name('admin.master.complaint-classification');
   Route::get('{id}', 'Admin\Master\ComplaintClassificationController@edit')->name('admin.master.complaint-classification.form');
   Route::post('{id}', 'Admin\Master\ComplaintClassificationController@update')->name('admin.master.complaint-classification.form');
   Route::delete('{id}', 'Admin\Master\ComplaintClassificationController@delete')->name('admin.master.complaint-classification.form');
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

  Route::prefix('user')->group(function () {
    Route::prefix('internal')->group(function () {
      Route::get('/', 'Admin\User\UserInternalController@index')->name('admin.user.internal');
      Route::post('/', 'Admin\User\UserInternalController@insert')->name('admin.user.internal');
      Route::get('{id}', 'Admin\User\UserInternalController@edit')->name('admin.user.internal.form');
      Route::get('tukar/{id}', 'Admin\User\UserInternalController@change')->name('admin.user.internal.form');
      Route::post('{id}', 'Admin\User\UserInternalController@update')->name('admin.user.internal.form');
      Route::post('/change/{id}', 'Admin\User\UserInternalController@updatechange')->name('admin.user.internal.change.form');
      Route::get('password/{id}', 'Admin\User\UserInternalController@edit_password')->name('admin.user.internal.password.form');
      Route::post('password/{id}', 'Admin\User\UserInternalController@update_password')->name('admin.user.internal.password.form');
      Route::delete('{id}', 'Admin\User\UserInternalController@delete')->name('admin.user.internal.form');
      Route::prefix('penukaran')->group(function(){
        Route::get('staf', 'Admin\User\PenukaranController@penukaran')->name('admin.user.internal.penukaran_staf');
        Route::get('staf/{id?}', 'Admin\User\PenukaranController@penukaran_process')->name('admin.user.internal.tukarStaf.change');
        Route::post('staf/{id?}', 'Admin\User\PenukaranController@penukaran_process_post')->name('admin.user.internal.tukarStaf.change');
      });
    });

    Route::prefix('external')->group(function () {
      Route::get('/', 'Admin\User\UserExternalController@index')->name('admin.user.external');
      Route::get('{id}', 'Admin\User\UserExternalController@edit')->name('admin.user.external.form');
      Route::get('pp/{id}/{projek}', 'Admin\User\UserExternalController@edit2')->name('admin.user.external.form2');
      Route::get('emc/{id}', 'Admin\User\UserExternalController@editemc')->name('admin.user.external.formemc');
      Route::post('{id}', 'Admin\User\UserExternalController@update')->name('admin.user.external.form');
      Route::post('/{id}/{projek}', 'Admin\User\UserExternalController@update2')->name('admin.user.external.form2');
      Route::delete('{id}', 'Admin\User\UserExternalController@delete')->name('admin.user.external.form');
      Route::get('password/{id}', 'Admin\User\UserExternalController@edit_password')->name('admin.user.external.password.form');
      Route::post('password/{id}', 'Admin\User\UserExternalController@update_password')->name('admin.user.external.password.form');
      Route::get('handover/{id}', 'Admin\User\UserExternalController@request_handover')->name('admin.user.external.handover.form');
      Route::post('handover/{id}', 'Admin\User\UserExternalController@send_handover')->name('admin.user.external.handover.form');
      Route::get('deactivate/{id}', 'Admin\User\UserExternalController@deactivate_external')->name('admin.user.external.deactivate');
      Route::get('activate/{id}', 'Admin\User\UserExternalController@activate_external')->name('admin.user.external.activate');


    });
  });
  Route::prefix('settings')->group(function () {
    Route::get('/', 'Admin\SettingsController@index')->name('admin.settings');
    Route::post('/', 'Admin\SettingsController@update')->name('admin.settings');
    Route::prefix('checkemail')->group(function() {
      Route::post('/', 'Admin\SettingsController@checkEmail')->name('admin.settings.checkemail');
    });
  });

  Route::prefix('monitoring')->group(function () {
    Route::get('/', 'MonitoringController@index')->name('admin.monitoring');
  });

  Route::prefix('inbox')->group(function () {
  	Route::get('/', 'InboxController@index')->name('inbox');
  	Route::get('{id}', 'InboxController@view')->name('inbox.view');
  });

  Route::prefix('announcement')->group(function () {
  	Route::get('/', 'AnnouncementController@index')->name('admin.announcement');
  	Route::post('/', 'AnnouncementController@insert')->name('admin.announcement');
  	Route::get('{id}', 'AnnouncementController@edit')->name('admin.announcement.form');
  	Route::post('{id}', 'AnnouncementController@update')->name('admin.announcement.form');
  	Route::delete('{id}', 'AnnouncementController@delete')->name('admin.announcement.form');
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

  // Route::prefix('trail')->group(function () {
  //   Route::get('/', 'Admin\TrailController@index')->name('admin.trail');
  //   Route::post('/', 'Admin\TrailController@insert')->name('admin.notification');
  //   Route::get('{id}', 'Admin\TrailController@edit')->name('admin.notification.form');
  //   Route::post('{id}', 'Admin\TrailController@update')->name('admin.notification.form');
  //   Route::post('setactivationsystem/{id}', 'Admin\NotificationController@setactivationsystem')->name('admin.notification.setactivationsystem');
  //   Route::post('setactivationemel/{id}', 'Admin\NotificationController@setactivationemel')->name('admin.notification.setactivationemel');
  //   Route::get('send/{id}', 'Admin\NotificationController@sendform')->name('admin.notification.send');
  //   Route::post('send/{id}', 'Admin\NotificationController@sendprocess')->name('admin.notification.send');
  //   Route::delete('{id}', 'Admin\NotificationController@delete')->name('admin.notification.form');
  // });

  Route::prefix('trail')->group(function () {
    Route::get('/', 'Admin\TrailController@index')->name('admin.trail');
    Route::post('/', 'Admin\TrailController@insert')->name('admin.trail');
    Route::get('{id}', 'Admin\TrailController@edit')->name('admin.trail.form');
    Route::post('{id}', 'Admin\TrailController@update')->name('admin.trail.form');
    // Route::post('setactivationsystem/{id}', 'Admin\TrailController@setactivationsystem')->name('admin.trail.setactivationsystem');
    // Route::post('setactivationemel/{id}', 'Admin\TrailController@setactivationemel')->name('admin.trail.setactivationemel');
    // Route::get('send/{id}', 'Admin\TrailController@sendform')->name('admin.trail.send');
    // Route::post('send/{id}', 'Admin\TrailController@sendprocess')->name('admin.trail.send');
    Route::delete('{id}', 'Admin\TrailController@delete')->name('admin.trail.form');
  });


  Route::prefix('backup')->group(function () {
    Route::get('/', 'Admin\BackupController@index')->name('admin.backup');
    Route::post('/', 'Admin\BackupController@store')->name('admin.backup');
    Route::delete('{filename}', 'Admin\BackupController@delete')->name('admin.backup.data');
    Route::get('{filename}', 'Admin\BackupController@download')->name('admin.backup.data');
  });

  Route::prefix('log')->group(function () {
    Route::get('/', 'Admin\LogController@index')->name('admin.log');
    Route::get('{id}', 'Admin\LogController@view')->name('admin.log.view');
  });

  Route::prefix('master')->group(function () {

    Route::prefix('baseline')->group(function () {
      Route::get('/', 'Admin\Master\BaselineController@index')->name('admin.master.baseline');
      Route::post('/', 'Admin\Master\BaselineController@insert')->name('admin.master.baseline');
      Route::get('{id}', 'Admin\Master\BaselineController@edit')->name('admin.master.baseline.form');
      Route::post('{id}', 'Admin\Master\BaselineController@update')->name('admin.master.baseline.form');
      Route::delete('{id}', 'Admin\Master\BaselineController@delete')->name('admin.master.baseline.form');
    });

    Route::prefix('district')->group(function () {
      Route::get('/', 'Admin\Master\DistrictController@index')->name('admin.master.district');
      Route::post('/', 'Admin\Master\DistrictController@insert')->name('admin.master.district');
      Route::get('{id}', 'Admin\Master\DistrictController@edit')->name('admin.master.district.form');
      Route::post('{id}', 'Admin\Master\DistrictController@update')->name('admin.master.district.form');
      Route::delete('{id}', 'Admin\Master\DistrictController@delete')->name('admin.master.district.form');
    });

    Route::prefix('projecttype')->group(function () {
      Route::get('/', 'Admin\Master\ProjectTypeController@index')->name('admin.master.projecttype');
      Route::post('/', 'Admin\Master\ProjectTypeController@insert')->name('admin.master.projecttype');
      Route::get('{id}', 'Admin\Master\ProjectTypeController@edit')->name('admin.master.projecttype.form');
      Route::post('{id}', 'Admin\Master\ProjectTypeController@update')->name('admin.master.projecttype.form');
      Route::delete('{id}', 'Admin\Master\ProjectTypeController@delete')->name('admin.master.projecttype.form');
    });

    Route::prefix('month')->group(function () {
      Route::get('/', 'Admin\Master\MonthController@index')->name('admin.master.month');
      Route::post('/', 'Admin\Master\MonthController@insert')->name('admin.master.month');
      Route::get('{id}', 'Admin\Master\MonthController@edit')->name('admin.master.month.form');
      Route::post('{id}', 'Admin\Master\MonthController@update')->name('admin.master.month.form');
      Route::delete('{id}', 'Admin\Master\MonthController@delete')->name('admin.master.month.form');
    });

    Route::prefix('parameter')->group(function () {
      Route::get('/', 'Admin\Master\ParameterController@index')->name('admin.master.parameter');
      Route::post('/', 'Admin\Master\ParameterController@insert')->name('admin.master.parameter');
      Route::get('{id}', 'Admin\Master\ParameterController@edit')->name('admin.master.parameter.form');
      Route::post('{id}', 'Admin\Master\ParameterController@update')->name('admin.master.parameter.form');
      Route::delete('{id}', 'Admin\Master\ParameterController@delete')->name('admin.master.parameter.form');
    });

    Route::prefix('pematuhaneia')->group(function () {
      Route::get('/', 'Admin\Master\PematuhanEiaController@index')->name('admin.master.pematuhaneia');
      Route::post('/', 'Admin\Master\PematuhanEiaController@insert')->name('admin.master.pematuhaneia');
      Route::get('{id}', 'Admin\Master\PematuhanEiaController@edit')->name('admin.master.pematuhaneia.form');
      Route::post('{id}', 'Admin\Master\PematuhanEiaController@update')->name('admin.master.pematuhaneia.form');
      Route::delete('{id}', 'Admin\Master\PematuhanEiaController@delete')->name('admin.master.pematuhaneia.form');
    });

    Route::prefix('pengawasan')->group(function () {
      Route::get('/', 'Admin\Master\PengawasanController@index')->name('admin.master.pengawasan');
      Route::post('/', 'Admin\Master\PengawasanController@insert')->name('admin.master.pengawasan');
      Route::get('{id}', 'Admin\Master\PengawasanController@edit')->name('admin.master.pengawasan.form');
      Route::post('{id}', 'Admin\Master\PengawasanController@update')->name('admin.master.pengawasan.form');
      Route::delete('{id}', 'Admin\Master\PengawasanController@delete')->name('admin.master.pengawasan.form');
    });

    Route::prefix('peringkatpengawasan')->group(function () {
      Route::get('/', 'Admin\Master\PeringkatPengawasanController@index')->name('admin.master.peringkatpengawasan');
      Route::post('/', 'Admin\Master\PeringkatPengawasanController@insert')->name('admin.master.peringkatpengawasan');
      Route::get('{id}', 'Admin\Master\PeringkatPengawasanController@edit')->name('admin.master.peringkatpengawasan.form');
      Route::post('{id}', 'Admin\Master\PeringkatPengawasanController@update')->name('admin.master.peringkatpengawasan.form');
      Route::delete('{id}', 'Admin\Master\PeringkatPengawasanController@delete')->name('admin.master.peringkatpengawasan.form');
    });

    Route::prefix('postcode')->group(function () {
      Route::get('/', 'Admin\Master\PostcodeController@index')->name('admin.master.postcode');
      Route::post('/', 'Admin\Master\PostcodeController@insert')->name('admin.master.postcode');
      Route::get('{id}', 'Admin\Master\PostcodeController@edit')->name('admin.master.postcode.form');
      Route::post('{id}', 'Admin\Master\PostcodeController@update')->name('admin.master.postcode.form');
      Route::delete('{id}', 'Admin\Master\PostcodeController@delete')->name('admin.master.postcode.form');
    });

    Route::prefix('projectactivity')->group(function () {
      Route::get('/', 'Admin\Master\ProjectActivityController@index')->name('admin.master.projectactivity');
      Route::post('/', 'Admin\Master\ProjectActivityController@insert')->name('admin.master.projectactivity');
      Route::get('{id}', 'Admin\Master\ProjectActivityController@edit')->name('admin.master.projectactivity.form');
      Route::post('{id}', 'Admin\Master\ProjectActivityController@update')->name('admin.master.projectactivity.form');
      Route::delete('{id}', 'Admin\Master\ProjectActivityController@delete')->name('admin.master.projectactivity.form');
    });

    Route::prefix('standard')->group(function () {
      Route::get('/', 'Admin\Master\StandardController@index')->name('admin.master.standard');
      Route::post('/', 'Admin\Master\StandardController@insert')->name('admin.master.standard');
      Route::get('{id}', 'Admin\Master\StandardController@edit')->name('admin.master.standard.form');
      Route::post('{id}', 'Admin\Master\StandardController@update')->name('admin.master.standard.form');
      Route::delete('{id}', 'Admin\Master\StandardController@delete')->name('admin.master.standard.form');
    });

    Route::prefix('state')->group(function () {
      Route::get('/', 'Admin\Master\StateController@index')->name('admin.master.state');
      Route::post('/', 'Admin\Master\StateController@insert')->name('admin.master.state');
      Route::get('{id}', 'Admin\Master\StateController@edit')->name('admin.master.state.form');
      Route::post('{id}', 'Admin\Master\StateController@update')->name('admin.master.state.form');
      Route::delete('{id}', 'Admin\Master\StateController@delete')->name('admin.master.state.form');
    });

    Route::prefix('userstatus')->group(function () {
      Route::get('/', 'Admin\Master\UserStatusController@index')->name('admin.master.userstatus');
      Route::post('/', 'Admin\Master\UserStatusController@insert')->name('admin.master.userstatus');
      Route::get('{id}', 'Admin\Master\UserStatusController@edit')->name('admin.master.userstatus.form');
      Route::post('{id}', 'Admin\Master\UserStatusController@update')->name('admin.master.userstatus.form');
      Route::delete('{id}', 'Admin\Master\UserStatusController@delete')->name('admin.master.userstatus.form');
    });


  });

Route::get('distribution', function () {
  return view('admin.distribution.index');
})->name('admin.distribution');

Route::get('logs', function () {
  return view('admin.logs.index');
})->name('admin.logs');
Route::get('letter', function () {
  return view('admin.letter.index');
})->name('admin.letter');
Route::get('letters', function () {
  return view('admin.letters.index');
})->name('admin.letters');
});
