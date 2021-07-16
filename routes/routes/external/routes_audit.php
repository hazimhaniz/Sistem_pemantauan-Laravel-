<?php
Route::prefix('audit')->group(function () {
  Route::get('tarikh', 'External\AuditController@tarikh')->name('external.audit.EMT.tarikh');
  Route::post('tarikh', 'External\AuditController@tarikhtambah')->name('external.audit.tarikh.tambah');
  Route::get('status_audit', 'External\AuditController@status_audit')->name('external.audit.status_audit');
  Route::get('kemaskini/{id}', 'External\AuditController@kemaskini')->name('external.audit.kemaskini');
  Route::get('view/{id}', 'External\AuditController@view')->name('external.audit.view');
  Route::get('auditviewio/kemaskini/{id}', 'External\AuditController@kemaskini')->name('external.audit.auditviewio.kemaskini');
    Route::get('kemaskini/janapdf/{id}', 'External\AuditController@kemaskini_janapdf')->name('external.audit.kemaskini.janapdf');
  Route::post('kemaskinimaklumat', 'External\AuditController@kemaskinimaklumat')->name('external.audit.kemaskinimaklumat');
  Route::post('kemaskinimaklumattidak', 'External\AuditController@kemaskinimaklumattidak')->name('external.audit.kemaskinimaklumattidak');
  Route::get('audithantar/{id}', 'External\AuditController@audithantar')->name('external.audit.audithantar');
  Route::get('auditpengesahanpp/{id}', 'External\AuditController@auditpengesahanpp')->name('external.audit.auditpengesahanpp');
  Route::get('auditviewio/{id}', 'External\AuditController@auditviewio')->name('external.audit.auditviewio');
  Route::get('/{id}', 'External\AuditController@attachment_index')->name('external.audit.jadual');
  Route::post('/{id?}', 'External\AuditController@attachment_insert')->name('external.audit.jadual');
  Route::get('/delete/{id}', 'External\AuditController@attachment_delete')->name('external.audit.delete');
  Route::get('status_audit/deleteaudit/{id}', 'External\AuditController@deleteaudit')->name('external.audit.deleteaudit');

  Route::get('viewPenyiasat/{id}', 'External\AuditController@viewPenyiasat');
    // Route::get('tarikh', function () {
    //     return view('external.audit.tarikh');
    // })->name('external.audit.tarikh');
    // Route::get('audit', function () {
    //     return view('external.audit.pemantauan_bmps');
    // })->name('external.audit.pemantauan_bmps');
    // Route::get('status_audit', function () {
    //     return view('external.audit.status_audit');
    // })->name('external.audit.status_audit');
});
