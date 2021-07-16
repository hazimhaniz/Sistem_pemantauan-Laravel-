<?php

use Illuminate\Database\Seeder;

class MasterModuleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_module')->delete();
        
        \DB::table('master_module')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Paparan Utama',
                'data' => NULL,
                'code' => 'home',
                'type' => 1,
                'created_at' => '2019-09-19 13:03:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Carian',
                'data' => NULL,
                'code' => 'search',
                'type' => 1,
                'created_at' => '2019-09-19 13:03:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pengurusan Pengumuman',
                'data' => NULL,
                'code' => 'announcement',
                'type' => 1,
                'created_at' => '2019-09-19 13:03:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Profil Pengguna',
                'data' => NULL,
                'code' => 'user_profile',
                'type' => 1,
                'created_at' => '2019-09-19 13:03:41',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Inbox Notifikasi',
                'data' => NULL,
                'code' => 'inbox_notification',
                'type' => 1,
                'created_at' => '2019-09-19 13:03:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Laporan',
                'data' => NULL,
                'code' => 'report',
                'type' => 1,
                'created_at' => '2019-09-19 13:03:41',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Pendaftaran Sistem Borang A',
                'data' => NULL,
                'code' => 'forma',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Pendaftaran Sistem Borang B',
                'data' => NULL,
                'code' => 'formb',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Pendaftaran Sistem Borang C',
                'data' => NULL,
                'code' => 'formc',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Pendaftaran Sistem Borang D',
                'data' => NULL,
                'code' => 'formd',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Pendaftaran Sistem Borang E',
                'data' => NULL,
                'code' => 'forme',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Pendaftaran Sistem Borang F',
                'data' => NULL,
                'code' => 'formf',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Paparan Pemantauan',
                'data' => NULL,
                'code' => 'monitoring',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Pengurusan Agihan',
                'data' => NULL,
                'code' => 'distribution',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Admin - Pengurusan Pengguna',
                'data' => NULL,
                'code' => 'admin_user',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Admin - Pengurusan Peranan',
                'data' => NULL,
                'code' => 'admin_role',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Admin - Pengurusan Tugasan',
                'data' => NULL,
                'code' => 'admin_permission',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Admin - Pengurusan Akses',
                'data' => NULL,
                'code' => 'admin_access',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Admin - Pengurusan Simpanan',
                'data' => NULL,
                'code' => 'admin_backup_db',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Admin - Pengurusan Sistem',
                'data' => NULL,
                'code' => 'admin_system_config',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Admin - Pengurusan Notifikasi',
                'data' => NULL,
                'code' => 'admin_notification',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Admin - Pengurusan Paparan Surat',
                'data' => NULL,
                'code' => 'admin_letter_show',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Admin - Pengurusan Cuti',
                'data' => NULL,
                'code' => 'admin_holiday',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Admin - Jejak Audit / Log Sistem',
                'data' => NULL,
                'code' => 'audit_trail',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Admin - Data Induk',
                'data' => NULL,
                'code' => 'master_data',
                'type' => 2,
                'created_at' => '2019-09-19 13:03:41',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Pendaftaran Projek',
                'data' => NULL,
                'code' => 'form_projek',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Pendaftaran Pengguna',
                'data' => NULL,
                'code' => 'form_user',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Log Masuk Sistem',
                'data' => 'login',
                'code' => 'login',
                'type' => 2,
                'created_at' => '2019-09-30 01:39:26',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Pendaftaran Sistem Borang D Hujan Melebihi 12.55',
                'data' => NULL,
                'code' => 'formdrainy',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Pendaftaran Sistem Pengawasan',
                'data' => NULL,
                'code' => 'pengawasan',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Pendaftaran Lilit Curtain',
                'data' => NULL,
                'code' => 'curtain',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Kuiri',
                'data' => NULL,
                'code' => 'kuiri',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Ekas',
                'data' => NULL,
                'code' => 'ekas',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'Stesen',
                'data' => NULL,
                'code' => 'stesen',
                'type' => 3,
                'created_at' => '2019-09-19 13:03:41',
            ),
        ));
        
        
    }
}