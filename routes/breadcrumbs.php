<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push(trans('sidebar.home'), route('home'));
});

//letter generator
Breadcrumbs::register('letter', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pengurusan Surat', route('letter'));
});

//inbox generator
Breadcrumbs::register('inbox', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(trans('sidebar.inbox_notification'), route('inbox'));
});

// Monitoring
Breadcrumbs::register('monitoring', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pemantauan', route('monitoring'));
});

Breadcrumbs::register('announcement', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pengurusan Pengumuman', route('announcement'));
});

// Profil
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profil', route('profile'));
});

// Search
Breadcrumbs::register('search', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Carian', route('search'));
});

// Report
Breadcrumbs::register('report', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Laporan', route('report'));
});

Breadcrumbs::register('admin', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    // $breadcrumbs->push('Pentadbir');
});

Breadcrumbs::register('admin.settings', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Konfigurasi Sistem', route('admin.settings'));
});

Breadcrumbs::register('admin.holiday', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Cuti', route('admin.holiday'));
});

Breadcrumbs::register('admin.user', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Pengguna');
});

Breadcrumbs::register('admin.user.internal', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.user');
    $breadcrumbs->push('Pengguna Dalaman', route('admin.user.internal'));
});

Breadcrumbs::register('admin.user.external', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.user');
    $breadcrumbs->push('Pengguna Luaran', route('admin.user.external'));
});

Breadcrumbs::register('admin.role', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Peranan', route('admin.role'));
});

Breadcrumbs::register('admin.permission', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Tugasan', route('admin.permission'));
});

Breadcrumbs::register('admin.backup', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Simpanan', route('admin.backup'));
});

Breadcrumbs::register('admin.notification', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Notifikasi', route('admin.notification'));
});

Breadcrumbs::register('admin.module', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Module', route('admin.module'));
});

Breadcrumbs::register('admin.module.form', function ($breadcrumbs,$id) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->parent('admin.module');
    $breadcrumbs->push('Kemaskini Module', route('admin.module.form',$id));
});

Breadcrumbs::register('admin.faq', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Soalan Lazim (FAQ)', route('admin.faq'));
});

Breadcrumbs::register('admin.letter', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Pengurusan Paparan Surat', route('admin.letter'));
});

Breadcrumbs::register('admin.log', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Log Sistem', route('admin.log'));
});

Breadcrumbs::register('admin.master', function ($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Data Induk');
});

Breadcrumbs::register('admin.master.announcement-type', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.master');
    $breadcrumbs->push('Jenis Pengumuman', route('admin.master.announcement-type'));
});

Breadcrumbs::register('admin.master.holiday-type', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.master');
    $breadcrumbs->push('Jenis Cuti', route('admin.master.holiday-type'));
});

Breadcrumbs::register('admin.master.faq-type', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.master');
    $breadcrumbs->push('Jenis Faq', route('admin.master.faq-type'));
});

Breadcrumbs::register('admin.master.province-office', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.master');
    $breadcrumbs->push('Pejabat Wilayah', route('admin.master.province-office'));
});

Breadcrumbs::register('admin.master.designation', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.master');
    $breadcrumbs->push('Jawatan', route('admin.master.designation'));
});

Breadcrumbs::register('distribution', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Agihan', route('distribution'));
});

Breadcrumbs::register('appeal', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Rayuan SKB', route('appeal.list'));
});

Breadcrumbs::register('goodconduct', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sijil Kelakuan Baik', route('goodconduct'));
});

Breadcrumbs::register('goodconduct.list_user', function ($breadcrumbs) {
    $breadcrumbs->push('Senarai Sijil Kelakuan Baik', route('goodconduct.list_user'));
});

Breadcrumbs::register('goodconduct.view_user', function ($breadcrumbs,$id,$submission_id) {
    $breadcrumbs->parent('goodconduct.list_user');
    $breadcrumbs->push($submission_id, route('goodconduct.form.view_user',$id));
});

Breadcrumbs::register('cert_waiver', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Sijil Pelepasan Keluar Negeri', route('cert_waiver'));
});

Breadcrumbs::register('cert_waiver.view_user', function ($breadcrumbs,$id,$submission_id) {
    $breadcrumbs->parent('cert_waiver.list_user');
    $breadcrumbs->push($submission_id, route('cert_waiver.form.view_user',$id));
});

Breadcrumbs::register('cert_waiver.list_user', function ($breadcrumbs) {
    $breadcrumbs->push('Senarai Sijil Pelepasan Keluar Negeri', route('cert_waiver.list_user'));
});

Breadcrumbs::register('reg_abroad', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pendaftaran Rakyat Malaysia Di Luar Negara', route('application.reg_abroad.konsular.list'));
});


Breadcrumbs::register('reg_abroad.list_user', function ($breadcrumbs) {
    $breadcrumbs->push('Senarai Pendaftaran Rakyat Malaysia Di Luar Negara', route('application.reg_abroad.list_user'));
});

Breadcrumbs::register('reg_abroad.view_user', function ($breadcrumbs,$id,$submission_id) {
    $breadcrumbs->parent('reg_abroad.list_user');
    $breadcrumbs->push($submission_id, route('application.reg_abroad.form.view_user',$id));
});


Breadcrumbs::register('assistance_malaysian', function ($breadcrumbs,$type=false) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bantuan Konsular Rakyat Malaysia Di Luar Negara ( '.$type.' )', route('application.assistance.malaysian'));
});

Breadcrumbs::register('assistance_foreigner_', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bantuan Konsular Rakyat Asing Di Malaysia', route('application.assistance.foreigner.missing.list'));
});

Breadcrumbs::register('assistance_foreigner', function ($breadcrumbs,$type=false) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bantuan Konsular Rakyat Asing Di Malaysia ( '.$type.' )', route('application.assistance.foreigner.missing.list'));
});

Breadcrumbs::register('assistance_malaysian_missing', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bantuan Konsular Rakyat Malaysia Di Luar Negara (Kehilangan) ', route('application.assistance.malaysian.missing.list'));
});

Breadcrumbs::register('assistance_foreigner_missing', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Bantuan Konsular Rakyat Asing Di Malaysia (Kehilangan)', route('application.assistance.foreigner.missing.list'));
});

Breadcrumbs::register('record_missing_passport', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Rekod Aduan Kehilangan Passport', route('application.record.missing_passport.list'));
});

Breadcrumbs::register('record_document_verification', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Rekod Perkhidmatan Pengesahan Dokumen', route('application.record.document_verification.list'));
});

Breadcrumbs::register('record_court_document', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Rekod Dokumen Mahkamah', route('application.record.court_document.list'));
});

Breadcrumbs::register('record_sign_specimen', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Rekod Tandatangan Spesimen', route('application.record.sign_specimen.list'));
});

