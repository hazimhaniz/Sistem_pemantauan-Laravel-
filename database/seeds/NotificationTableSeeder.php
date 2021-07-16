<?php

use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notification')->delete();
        
        \DB::table('notification')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sistem SPEIA: Tetapkan Semula Kata Laluan',
                'code' => 'emel.tetapkan.semula.katalaluan',
                'message' => 'Sistem SPEIA: Tetapkan Semula Kata Laluan

Salam Sejahtera,

Adalah dimaklumkan bahawa Tuan / Puan telah menerima emel ini untuk menetapkan semula kata laluan bagi akaun Tuan / Puan di sistem SPEIA.<br />

<a class="btn btn-log m-t-10" href="%reset_password_link%">Tetap Semula Katalaluan</a><br />

Sekiranya Tuan / Puan tidak membuat sebarang permintaan bagi penetapan semula kata laluan, sila abaikan emel ini.<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-08-07 01:25:52',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Pendaftaran Pengguna',
                'code' => 'pengesahanpengguna.pengguna',
                'message' => 'Salam Sejahtera.

Tuan / Puan,

Adalah dimaklumkan pendaftaran [nama] ([email]), dengan peranan [peranan] telah diluluskan bagi [nama_projek] ([no_fail_jas]). Sila log masuk ke Sistem SPPPEIA dengan menggunakan <b>ID Pengguna</b> dan <b>Kata Laluan</b> di bawah:

ID Pengguna : [id]

Kata Laluan  : [kata_laluan]


Capaian ke Sistem SPPPEIA adalah di https://stagingspppe.doe.gov.my.



Langkah-langkah berikut perlu dilakukan melalui Sistem SPPPEIA :

(a) Pendaftaran Pengguna Environmental Officer (EO)

(b) Pendaftaran Pengguna Environmental Monitoring Committee (EMC)

(c) Setelah mendapat pengesahan pendaftaran pengguna EO dan EMC, lakukan Pendaftaran Projek.

Sila berhubung dengan Pegawai Penyiasat JAS Negeri untuk sebarang pertanyaan.



Sekian, terima kasih.

Pentadbir Sistem SPPPEIA.',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-08-06 03:28:14',
            ),
            2 => 
            array (
                'id' => 3,
            'name' => 'Pendaftaran Pengguna - Penggerak Projek (PP)',
                'code' => 'pengesahanpengguna.pengguna.pp',
                'message' => '<p>Salam Sejahtera.</p><br />
<br />
<p>Tuan / Puan, No Fail JAS : [no_fail_jas] . Permohonan pendaftaran pengguna telah dihantar oleh Penggerak Projek. Sila log masuk ke dalam sistem SPEIA untuk pengesahan. Sekian, terima kasih.</p><br />
<br />
<p>&nbsp;</p><br />
<br />
<p>&nbsp;</p><br />
<br />
<p>Pentadbir Sistem SPEIA.</p><br />
<br />
<p>&nbsp;</p><br />
<br />
<p>&nbsp;</p>',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-12-22 10:43:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sistem SPEIA: Agihan Tugasan',
                'code' => 'emel.agihan.tugasan',
                'message' => '<strong>Sistem SPEIA: Agihan Tugasan</strong>

Salam Sejahtera,

Tuan / Puan telah dilantik sebagai <strong>%peranan%</strong> di dalam Sistem Pemantauan EIA (SPEIA) untuk menguruskan laporan-laporan bulanan bagi projek:

No Fail JAS: <strong>%no_fail_jas%</strong><br />
Nama Projek: <strong>%nama_projek%</strong><br />
Penggerak Projek: <strong>%nama%</strong><br />

Sila log masuk ke sistem SPEIA di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 01:53:30',
                'updated_at' => '2020-08-24 04:32:05',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna PP',
                'code' => 'emel.pendaftaranprojek.projek',
                'message' => 'Sistem SPEIA: Pendaftaran Pengguna PP

Salam Sejahtera,

Adalah dimaklumkan bahawa permohonan pendaftaran sebagai pengguna baharu dengan peranan Penggerak Projek (PP) bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan.

Maklumat Permohonan:
No Fail JAS: <strong>%no_fail_jas%</strong><br />
Nama Projek: <strong>%nama_projek%</strong><br />
Emel: <strong>%emel_pp%</strong><br />
Nama: <strong>%nama_pp%</strong><br />
No Kad Pengenalan: <strong>%no_kad_pengenalan_pp%</strong>

Sila log masuk ke Sistem SPEIA untuk menyemak maklumat permohonan dan mengaktifkan akaun pengguna di pautan: http://speia.doe.gov.my/login
"Alam Sekitar, Tanggungjawab Bersama"
Sekian, terima kasih

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 01:53:48',
                'updated_at' => '2020-12-07 18:31:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna PP',
                'code' => 'emel.pendaftaran.pengguna.pp',
                'message' => '<strong>Sistem SPEIA: Pendaftaran Pengguna PP</strong>

Salam Sejahtera,

Adalah dimaklumkan bahawa permohonan pendaftaran sebagai pengguna baharu dengan peranan <strong>%peranan%</strong> bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan.

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
Emel: <strong>%emel%<br /></strong>
Nama: <strong>%nama%<br /></strong>
No Kad Pengenalan: <strong>%username%<br /></strong>
Katalaluan: <strong>%password%<br /></strong>

Sila log masuk ke Sistem SPEIA untuk menyemak maklumat permohonan dan mengaktifkan akaun pengguna di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 09:25:36',
                'updated_at' => '2020-03-09 09:25:46',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Statuslaporan.Projek',
                'code' => 'Statuslaporan.projek',
                'message' => 'Salam Sejahtera.


Tuan / Puan Adalah Dimaklumkan Penggerak Projek Telah menghantar Laporan Pematuhan EIA Untuk Semakan.<br />

No. Fail JAS : [NO_FAIL_JAS]

Nama Projek : </b></b>.

Penggerak Projek : </b></b>.

Link Pautan : <a href="https://stagingspppe.doe.gov.my/login"> https://stagingspppe.doe.gov.my/login </a>



Sekian, terima kasih.

Pentadbir Sistem SPPPEIA.',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 09:29:15',
                'updated_at' => '2020-03-09 09:31:20',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'KuiriIOPP.Projek',
                'code' => 'KuiriIOPP.Projek',
                'message' => 'Salam Sejahtera.


Tuan / Puan Adalah Dimaklumkan Kuiri Telah Diahnatar Oleh Pegawai JAS Negeri untuk semakan Tuan / Puan.

Link Pautan : <a href="https://stagingspppe.doe.gov.my/login"> https://stagingspppe.doe.gov.my/login </a>



Sekian, terima kasih.

Pentadbir Sistem SPPPEIA.',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 09:30:16',
                'updated_at' => '2020-03-09 09:31:23',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'KuiriPPIO.Projek',
                'code' => 'KuiriPPIO.Projek',
                'message' => 'Salam Sejahtera.


Tuan / Puan Adalah Dimaklumkan Penggerak Projek Telah Menghantar Maklum Balas Kuiri Untuk Semakan.

Link Pautan : <a href="https://stagingspppe.doe.gov.my/login"> https://stagingspppe.doe.gov.my/login </a>



Sekian, terima kasih.

Pentadbir Sistem SPPPEIA.',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 09:31:16',
                'updated_at' => '2020-03-09 09:31:26',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Pendaftaran Pengguna',
                'code' => 'pengesahanpenggunaeo.pengguna',
                'message' => 'Salam Sejahtera.


Tuan / Puan,

Adalah dimaklumkan pendaftaran [nama] ([email]), dengan peranan [peranan] telah diluluskan bagi [nama_projek] ([no_fail_jas]). Sila log masuk ke Sistem SPPPEIA dengan menggunakan <b>ID Pengguna</b> dan <b>Kata Laluan</b> di bawah:

ID Pengguna : [id]

Kata Laluan  : [kata_laluan]


Capaian ke Sistem SPPPEIA adalah di https://stagingspppe.doe.gov.my.



Langkah-langkah berikut perlu dilakukan melalui Sistem SPPPEIA :

(a) Pelaporan Bahagian B, Pelaporan Bahagian D


Sila berhubung dengan Pegawai Penyiasat JAS Negeri untuk sebarang pertanyaan.

Sekian, terima kasih.

Pentadbir Sistem SPPPEIA.',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-08-06 03:28:14',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pendaftaran Pengguna',
                'code' => 'pengesahanpenggunaemc.pengguna',
                'message' => 'Salam Sejahtera.


Tuan / Puan,

Adalah dimaklumkan pendaftaran [nama] ([email]), dengan peranan [peranan] telah diluluskan bagi [nama_projek] ([no_fail_jas]). Sila log masuk ke Sistem SPPPEIA dengan menggunakan <b>ID Pengguna</b> dan <b>Kata Laluan</b> di bawah:

ID Pengguna : [id]

Kata Laluan  : [kata_laluan]


Capaian ke Sistem SPPPEIA adalah di https://stagingspppe.doe.gov.my.



Langkah-langkah berikut perlu dilakukan melalui Sistem SPPPEIA :

(a) Pendaftaran Stesen Pengawasan

(b) Pelaporan Bahagian C


Sila berhubung dengan Pegawai Penyiasat JAS Negeri untuk sebarang pertanyaan.

Sekian, terima kasih.

Pentadbir Sistem SPPPEIA.',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-08-06 03:28:14',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna JAS',
                'code' => 'email.pendaftaran.pengguna.jas',
                'message' => 'Sistem SPEIA: Pendaftaran Pengguna JAS

Salam Sejahtera,

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Pentadbir JAS Negeri / Penyiasat / Penyelia / Pelulus bagi negeri Selangor telah diluluskan.

Sila log masuk ke Sistem SPEIA dengan menggunakan Emel dan Kata Laluan yang telah disediakan oleh Unit Rangkaian, BTM JAS di pautan: http://speia.doe.gov.my/login
"Alam Sekitar, Tanggungjawab Bersama"
Sekian, terima kasih

Pentadbir Sistem SPEIA
Jabatan Alam Sekitar
Kementerian Alam Sekitar dan Air (KASA)
Aras 3, Podium 2 , Wisma Sumber Asli No.25, 
Persiaran Perdana, Presint 4, 
Pusat Pentadbiran Kerajaan Persekutuan, 
62574 Putrajaya, Malaysia.
Telefon: 03-8871 2000 / 2200
Faks: 03-8888 9987 / 03-8889 1040',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-08-07 01:25:52',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna PP',
                'code' => 'notifikasi.pendaftaranprojek.projek',
                'message' => '<p><strong></strong>Sistem&nbsp;SPEIA:&nbsp;Pendaftaran&nbsp;Pengguna&nbsp;PP</strong></p>
<p>Salam&nbsp;Sejahtera,</p>
<p>Adalah&nbsp;dimaklumkan&nbsp;bahawa&nbsp;permohonan&nbsp;pendaftaran&nbsp;sebagai&nbsp;pengguna&nbsp;baharu&nbsp;dengan&nbsp;peranan&nbsp;Penggerak&nbsp;Projek&nbsp;(PP)&nbsp;bagi&nbsp;sistem&nbsp;SPEIA&nbsp;telah&nbsp;dihantar&nbsp;untuk&nbsp;semakan&nbsp;Tuan&nbsp;/&nbsp;Puan.&nbsp;Sila&nbsp;klik&nbsp;butang&nbsp;di&nbsp;bawah&nbsp;untuk&nbsp;ke&nbsp;paparan&nbsp;maklumat&nbsp;pengguna.</p>
<p><a href="#">Lihat Maklumat</a><br />
<p>Sekian,&nbsp;terima&nbsp;kasih</p>
<p>Pentadbir&nbsp;Sistem&nbsp;SPEIA</p>',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-12-07 18:56:31',
                'updated_at' => '2020-12-07 18:58:42',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna JAS',
                'code' => 'notifikasi.pendaftaran.pengguna.jas',
                'message' => 'Sistem SPEIA: Pendaftaran Pengguna JAS

Salam Sejahtera,

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Pentadbir JAS Negeri / Penyiasat / Penyelia / Pelulus bagi negeri Selangor telah diluluskan.

Sila log masuk ke Sistem SPEIA dengan menggunakan Emel dan Kata Laluan yang telah disediakan oleh Unit Rangkaian, BTM JAS di pautan: http://speia.doe.gov.my/login
"Alam Sekitar, Tanggungjawab Bersama"
Sekian, terima kasih

Pentadbir Sistem SPEIA
Jabatan Alam Sekitar
Kementerian Alam Sekitar dan Air (KASA)
Aras 3, Podium 2 , Wisma Sumber Asli No.25, 
Persiaran Perdana, Presint 4, 
Pusat Pentadbiran Kerajaan Persekutuan, 
62574 Putrajaya, Malaysia.
Telefon: 03-8871 2000 / 2200
Faks: 03-8888 9987 / 03-8889 1040',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2019-09-19 13:03:59',
                'updated_at' => '2020-08-06 03:28:14',
            ),
            14 => 
            array (
                'id' => 15,
            'name' => 'Sistem SPEIA: Tiada Pengesahan Pengguna Penggerak Projek (PP)',
                'code' => 'emel.tiada.pengesahan.pengguna.pp',
            'message' => '<strong>Sistem SPEIA: Tiada Pengesahan Pengguna Penggerak Projek (PP)</strong>

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan <strong>%peranan%</strong> telah ditolak.<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
Sebab ditolak: <strong>%sebab_ditolak%<br /></strong>

Sebarang masalah sila emel kepada Pentadbir Sistem di speia@doe.gov.my<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-03-09 01:53:30',
                'updated_at' => '2020-08-24 04:32:05',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna EO',
                'code' => 'notifikasi.pendaftaran.pengguna.eo',
                'message' => '<strong>Sistem SPEIA: Pendaftaran Pengguna EO<br /><br /></strong>

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa permohonan pendaftaran sebagai pengguna baharu dengan peranan Environmental Officer (EO) bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan. Sila klik butang di bawah untuk ke paparan maklumat pengguna.<br /><br />

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-12-07 18:56:31',
                'updated_at' => '2020-12-07 18:58:42',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Sistem SPEIA: Pendaftaran Pengguna EMC',
                'code' => 'notifikasi.pendaftaran.pengguna.emc',
                'message' => '<strong>Sistem SPEIA: Pendaftaran Pengguna EMC<br /><br /></strong>

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa permohonan pendaftaran sebagai pengguna baharu dengan peranan Environmental Monitoring Consultant (EMC) bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan. Sila klik butang di bawah untuk ke paparan maklumat pengguna.<br /><br />

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA<br />',
                'is_active_emel' => 1,
                'is_active_system' => 1,
                'created_by_user_id' => 1207,
                'created_at' => '2020-12-07 18:56:31',
                'updated_at' => '2020-12-07 18:58:42',
            ),
            17 => 
            array (
                'id' => 18,
            'name' => 'Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EO)',
                'code' => 'notifikasi.pengesahan.pengguna.eo',
            'message' => '<strong>Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EO)<br /><br /></strong>

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Officer (eo012010@getnada.com) telah diluluskan.<br /><br />

Tuan / Puan dimohon untuk melaksanakan:<br />
<strong>1) Pelaporan Bahagian B<br /></strong>
<strong>2) Semakan Bahagian C<br /></strong>
<strong>3) Pelaporan Bahagian D<br /></strong>
<strong>4) Pelaporan Hujan (Jika ada)<br /><br /></strong>

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA<br />
',
    'is_active_emel' => 1,
    'is_active_system' => 1,
    'created_by_user_id' => 1207,
    'created_at' => '2020-12-07 18:56:31',
    'updated_at' => '2020-12-07 18:58:42',
),
18 => 
array (
    'id' => 19,
'name' => 'Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EO)',
    'code' => 'emel.tiada.pengesahan.pengguna.eo',
'message' => '<strong>Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EO)</strong><br />

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Officer (eo) telah ditolak.<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
ID Pengguna: <strong>%username%<br /></strong>
Sebab ditolak: <strong>%sebab_ditolak%<br /></strong>

Sebarang masalah sila emel kepada Pentadbir Sistem di speia@doe.gov.my<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />
',
    'is_active_emel' => 1,
    'is_active_system' => 1,
    'created_by_user_id' => 1207,
    'created_at' => '2020-12-07 18:56:31',
    'updated_at' => '2020-12-07 18:58:42',
),
19 => 
array (
    'id' => 20,
'name' => 'Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EO)',
    'code' => 'notifikasi.tiada.pengesahan.pengguna.eo',
'message' => '<strong>Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EO)</strong><br /><br />

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Officer (eo) telah ditolak.<br /><br />

Maklumat Permohonan:<br /><br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong><br />
Nama Projek: <strong>%nama_projek%<br /></strong><br />
ID Pengguna: <strong>%username%<br /></strong><br />
Sebab ditolak: <strong>%sebab_ditolak%<br /></strong><br />

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA',
    'is_active_emel' => 1,
    'is_active_system' => 1,
    'created_by_user_id' => 1207,
    'created_at' => '2020-12-07 18:56:31',
    'updated_at' => '2020-12-07 18:58:42',
),
20 => 
array (
    'id' => 21,
'name' => 'Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EMC)',
    'code' => 'notifikasi.pengesahan.pengguna.emc',
'message' => '<strong>Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EMC)</strong><br /><br />

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Monitoring Consultant (emc) telah diluluskan.<br /><br />

Tuan / Puan dimohon untuk melaksanakan:<br />
<strong>1) Pendaftaran Stesen Pengawasan<br /></strong>
<strong>2) Pelaporan Bahagian C<br /><br /></strong>

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
21 => 
array (
'id' => 22,
'name' => 'Sistem SPEIA: Pendaftaran Projek',
'code' => 'emel.pendaftaran.projek',
'message' => '<strong>Sistem SPEIA: Pendaftaran Projek<br /></strong>

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa permohonan pendaftaran projek bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan.<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%</strong><br />
Nama Projek: <strong>%nama_projek%</strong><br />

Sila log masuk ke Sistem SPEIA untuk menyemak maklumat permohonan projek di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
22 => 
array (
'id' => 23,
'name' => 'Sistem SPEIA: Pendaftaran Projek',
'code' => 'notifikasi.pendaftaran.projek',
'message' => '<strong>Sistem SPEIA: Pendaftaran Projek<br /><br /></strong>

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa permohonan pendaftaran projek bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan. Sila klik butang di bawah untuk ke paparan maklumat projek.<br /><br />

<u><a href="%link_projek%">Lihat Maklumat</a></u><br /><br />

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
23 => 
array (
'id' => 24,
'name' => 'Sistem SPEIA: Pendaftaran Pengguna EO',
'code' => 'emel.pendaftaran.pengguna.eo',
'message' => '<strong>Sistem SPEIA: Pendaftaran Pengguna EO</strong>

Salam Sejahtera,

Adalah dimaklumkan bahawa permohonan pendaftaran sebagai pengguna baharu dengan peranan Environmental Officer (EO) bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan.

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
Emel: <strong>%emel%<br /></strong>
Nama: <strong>%nama%<br /></strong>
No Kad Pengenalan: <strong>%username%<br /></strong>

Sila log masuk ke Sistem SPEIA untuk menyemak maklumat permohonan dan mengaktifkan akaun pengguna di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
24 => 
array (
'id' => 25,
'name' => 'Sistem SPEIA: Pendaftaran Pengguna EMC',
'code' => 'emel.pendaftaran.pengguna.emc',
'message' => '<strong>Sistem SPEIA: Pendaftaran Pengguna EMC</strong>

Salam Sejahtera,

Adalah dimaklumkan bahawa terdapat permohonan pendaftaran sebagai pengguna baharu dengan peranan Environmental Monitoring Consultant (EMC) bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan.

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
Emel: <strong>%emel%<br /></strong>
Nama: <strong>%nama%<br /></strong>
No Kad Pengenalan: <strong>%username%<br /></strong>

Sila log masuk ke Sistem SPEIA untuk menyemak maklumat permohonan dan mengaktifkan akaun pengguna di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
25 => 
array (
'id' => 26,
'name' => 'Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EO)',
'code' => 'emel.pengesahan.pengguna.eo',
'message' => '<strong>Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EO)<br /></strong>

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Officer (eo) telah diluluskan.<br />

Sila log masuk ke Sistem SPEIA dengan menggunakan ID Pengguna dan Kata Laluan dibawah:<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
ID Pengguna: <strong>%username%<br /></strong>
Kata Laluan: <strong>%password%<br /></strong>

Tuan / Puan dimohon untuk melaksanakan:<br />
<strong>1) Pelaporan Bahagian B<br /></strong>
<strong>2) Semakan Bahagian C<br /></strong>
<strong>3) Pelaporan Bahagian D<br /></strong>
<strong>4) Pelaporan Hujan (Jika ada)<br /></strong>

Sila log masuk ke sistem SPEIA di pautan: http://speia.doe.gov.my/login<br />
Sebarang masalah sila emel kepada Pentadbir Sistem di speia@doe.gov.my<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
26 => 
array (
'id' => 27,
'name' => 'Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EMC)',
'code' => 'emel.pengesahan.pengguna.emc',
'message' => '<strong>Sistem SPEIA: Pengesahan Pengguna Environmental Officer (EMC)</strong><br />

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Monitoring Consultant (emc) telah diluluskan.<br />

Sila log masuk ke Sistem SPEIA dengan menggunakan ID Pengguna dan Kata Laluan dibawah:<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
ID Pengguna: <strong>%username%<br /></strong>
Kata Laluan: <strong>%password%<br /></strong>

Tuan / Puan dimohon untuk melaksanakan:<br />
<strong>1) Pendaftaran Stesen Pengawasan</strong><br />
<strong>2) Pelaporan Bahagian C</strong><br />

Sila log masuk ke sistem SPEIA di pautan: http://speia.doe.gov.my/login<br />
Sebarang masalah sila emel kepada Pentadbir Sistem di speia@doe.gov.my<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />
',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
27 => 
array (
'id' => 28,
'name' => 'Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EMC)
',
'code' => 'emel.tiada.pengesahan.pengguna.emc',
'message' => '<strong>Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EMC)</strong><br />

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Monitoring Consultant (emc012010@getnada.com) telah ditolak.<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
ID Pengguna: <strong>%username%<br /></strong>
Sebab ditolak: <strong>%sebab_ditolak%</strong><br />

Sebarang masalah sila emel kepada Pentadbir Sistem di speia@doe.gov.my<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />
',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
28 => 
array (
'id' => 29,
'name' => 'Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EMC)',
'code' => 'notifikasi.tiada.pengesahan.pengguna.emc',
'message' => '<strong>Sistem SPEIA: Tiada Pengesahan Pengguna Environmental Officer (EMC)</strong><br /><br />

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa pendaftaran Tuan / Puan dengan peranan Environmental Monitoring Consultant (emc012010@getnada.com) telah ditolak.<br /><br />

Maklumat Permohonan:<br /><br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong><br />
Nama Projek: <strong>%nama_projek%<br /></strong><br />
ID Pengguna: <strong>%username%<br /></strong><br />
Sebab ditolak: <strong>%sebab_ditolak%<br /></strong><br />

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
29 => 
array (
'id' => 30,
'name' => 'Sistem SPEIA: Pindaan Pengesahan Projek',
'code' => 'emel.pindaan.pendaftaran.projek',
'message' => '<strong>Sistem SPEIA: Pindaan Pengesahan Projek</strong><br />

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa permohonan pendaftaran projek Tuan / Puan bagi sistem SPEIA tidak sah. Sila log masuk ke dalam sistem dan hantar semula permohonan pendaftaran projek yang telah dipinda.<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>

Sila log masuk ke Sistem SPEIA di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
30 => 
array (
'id' => 31,
'name' => 'Sistem SPEIA: Pindaan Pengesahan Projek',
'code' => 'notifikasi.pindaan.pendaftaran.projek',
'message' => '<strong>Sistem SPEIA: Pindaan Pengesahan Projek</strong><br /><br />

Salam Sejahtera,<br /><br />

Adalah dimaklumkan bahawa permohonan pendaftaran projek Tuan / Puan bagi sistem SPEIA tidak sah. Sila hantar semula permohonan pendaftaran projek yang telah dipinda.<br /><br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%</strong><br />
Nama Projek: <strong>%nama_projek%</strong><br /><br />

Sekian, terima kasih<br />
Pentadbir Sistem SPEIA<br />
',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-12-07 18:56:31',
'updated_at' => '2020-12-07 18:58:42',
),
31 => 
array (
'id' => 32,
'name' => 'Agihan Tugasan - %no_fail_jas%',
'code' => 'kemaskini.agihan.tugasan',
'message' => '<strong>Sistem SPEIA: Agihan Tugasan</strong><br />

Salam Sejahtera,<br /><br />

Tuan / Puan telah dilantik sebagai <strong>%peranan%</strong> di dalam Sistem Pemantauan EIA (SPEIA) untuk menguruskan laporan-laporan bulanan bagi projek:<br /><br />

No Fail JAS: <strong>%no_fail_jas%</strong><br />
Nama Projek: <strong>%nama_projek%</strong><br />
Penggerak Projek: <strong>%nama%</strong><br /><br />

Pentadbir Sistem SPEIA',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-03-09 01:53:30',
'updated_at' => '2020-08-24 04:32:05',
),
32 => 
array (
'id' => 33,
'name' => 'Sistem SPEIA: Pendaftaran Stesen Pengawasan',
'code' => 'emel.pendaftaran.stesen',
'message' => '<strong>Sistem SPEIA: Pendaftaran Stesen Pengawasan<br /></strong>

Salam Sejahtera,<br />

Adalah dimaklumkan bahawa permohonan pendaftaran stesen pengawasan bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan.<br />

Maklumat Permohonan:<br />
No Fail JAS: <strong>%no_fail_jas%<br /></strong>
Nama Projek: <strong>%nama_projek%<br /></strong>
Fasa / Pakej: <strong>%fasa%<br /></strong>

Sila log masuk ke Sistem SPEIA untuk menyemak maklumat permohonan stesen pengawasan di pautan: http://speia.doe.gov.my/login<br />
"Alam Sekitar, Tanggungjawab Bersama"<br />
Sekian, terima kasih<br />

Pentadbir Sistem SPEIA<br />
Jabatan Alam Sekitar<br />
Kementerian Alam Sekitar dan Air (KASA)<br />
Aras 3, Podium 2 , Wisma Sumber Asli No.25, <br />
Persiaran Perdana, Presint 4, <br />
Pusat Pentadbiran Kerajaan Persekutuan, <br />
62574 Putrajaya, Malaysia.<br />
Telefon: 03-8871 2000 / 2200<br />
Faks: 03-8888 9987 / 03-8889 1040<br />',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-03-09 01:53:30',
'updated_at' => '2020-08-24 04:32:05',
),
33 => 
array (
'id' => 34,
'name' => 'Sistem SPEIA: Pendaftaran Stesen Pengawasan',
'code' => 'notifikasi.pendaftaran.stesen',
'message' => '<strong>Sistem SPEIA: Pendaftaran Stesen Pengawasan<br /></strong>

Salam Sejahtera,

Adalah dimaklumkan bahawa permohonan pendaftaran stesen pengawasan bagi sistem SPEIA telah dihantar untuk semakan Tuan / Puan. Sila klik butang di bawah untuk ke paparan maklumat stesen.

Sekian, terima kasih
Pentadbir Sistem SPEIA',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-03-09 01:53:30',
'updated_at' => '2020-08-24 04:32:05',
),
34 => 
array (
'id' => 35,
'name' => 'Sistem SPEIA: Pengesahan Stesen Pengawasan',
'code' => 'emel.pengesahan.stesen',
'message' => 'Sistem SPEIA: Pengesahan Stesen Pengawasan

Salam Sejahtera,

Adalah dimaklumkan bahawa permohonan pendaftaran stesen pengawasan Tuan / Puan bagi sistem SPEIA telah disahkan.

Maklumat Permohonan:
No Fail JAS: AS(B)T:12/200/000/013
Nama Projek: CADANGAN PROJEK PENGELUARAN HASIL HUTAN SELUAS+- 114 HEKTAR DI KOMPARTMEN 76
Fasa / Pakej: Fasa Pertama

Sila log masuk ke Sistem SPEIA di pautan: http://speia.doe.gov.my/login
"Alam Sekitar, Tanggungjawab Bersama"
Sekian, terima kasih

Pentadbir Sistem SPEIA
Jabatan Alam Sekitar
Kementerian Alam Sekitar dan Air (KASA)
Aras 3, Podium 2 , Wisma Sumber Asli No.25, 
Persiaran Perdana, Presint 4, 
Pusat Pentadbiran Kerajaan Persekutuan, 
62574 Putrajaya, Malaysia.
Telefon: 03-8871 2000 / 2200
Faks: 03-8888 9987 / 03-8889 1040',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-03-09 01:53:30',
'updated_at' => '2020-08-24 04:32:05',
),
35 => 
array (
'id' => 36,
'name' => 'Sistem SPEIA: Pengesahan Stesen Pengawasan',
'code' => 'notifikasi.pengesahan.stesen',
'message' => 'Sistem SPEIA: Pengesahan Stesen Pengawasan

Salam Sejahtera,

Adalah dimaklumkan bahawa permohonan pendaftaran stesen pengawasan Tuan / Puan bagi sistem SPEIA telah disahkan.

Sekian, terima kasih
Pentadbir Sistem SPEIA',
'is_active_emel' => 1,
'is_active_system' => 1,
'created_by_user_id' => 1207,
'created_at' => '2020-03-09 01:53:30',
'updated_at' => '2020-08-24 04:32:05',
),
));
        
        
    }
}