<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission')->delete();
        
        \DB::table('permission')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'dashboard',
                'display_name' => 'Dashboard',
                'guard_name' => 'web',
                'description' => 'Peranan Dashboard',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'penyiasat',
                'display_name' => 'Pegawai Penyiasat JAS Negeri',
                'guard_name' => 'web',
                'description' => 'Peranan Penyiasat',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'penyelia',
                'display_name' => 'Pegawai Penyelia JAS Negeri',
                'guard_name' => 'web',
                'description' => 'Peranan Penyelia',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'pengarah',
                'display_name' => 'Pengarah JAS Negeri',
                'guard_name' => 'web',
                'description' => 'Peranan Pelulus',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2020-07-08 15:10:26',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'admin-jas',
                'display_name' => 'Pentadbiran Sistem JAS',
                'guard_name' => 'web',
                'description' => 'Peranan Admin JAS',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'pendaftaran-pengguna',
                'display_name' => 'Pendaftaran Pengguna',
                'guard_name' => 'web',
                'description' => 'Pendaftaran Pengguna EO & EMC',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'projek',
                'display_name' => 'Projek',
                'guard_name' => 'web',
                'description' => 'Pendaftaran Projek & Status Pendaftaran Projek',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'bahagiana',
                'display_name' => 'Bahagian A',
                'guard_name' => 'web',
                'description' => 'Bahagian A: EIA 1-18 Maklumat Status Bagi Projek Yang Tertakluk Kepada EIA',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'bahagianb',
                'display_name' => 'Bahagian B',
                'guard_name' => 'web',
                'description' => 'Bahagian B: EIA 2-18 Jadual Pematuhan Syarat Kelulusan EIA',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'bahagianc',
                'display_name' => 'Bahagian C',
                'guard_name' => 'web',
            'description' => 'Bahagian C: Pengawasan Alam Sekitar(EMR)',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'bahagiand',
                'display_name' => 'Bahagian D',
                'guard_name' => 'web',
            'description' => 'Bahagian D: Pemeriksaan Pengurusan Terbaik(BMPs)',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'bahagiane',
                'display_name' => 'Bahagian E',
                'guard_name' => 'web',
                'description' => 'Bahagian E: Status Perlaksanaan Program Audit Alam Sekeliling',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'laporan',
                'display_name' => 'Status Laporan',
                'guard_name' => 'web',
                'description' => 'Status Pengawasan dan Pemantauan',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'pengesahan-projek',
                'display_name' => 'Pengesahan Projek',
                'guard_name' => 'web',
                'description' => 'Peranan Pengesahan Projek',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'pengesahan-laporan',
                'display_name' => 'Pengesahan Laporan',
                'guard_name' => 'web',
                'description' => 'Peranan Pengesahan Laporan',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'pengurusan-kuiri',
                'display_name' => 'Pengurusan Kuiri',
                'guard_name' => 'web',
                'description' => 'Peranan Pengurusan Kuiri',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'laporan-siasatan',
                'display_name' => 'Laporan Siasatan',
                'guard_name' => 'web',
                'description' => 'Peranan Laporan Siasatan',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'laporan-penyiasat',
                'display_name' => 'Laporan Penyiasat',
                'guard_name' => 'web',
                'description' => 'Peranan Laporan Penyiasat',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'laporan-siasatan-penyelia',
                'display_name' => 'Laporan Siasatan Penyelia',
                'guard_name' => 'web',
                'description' => 'Peranan Laporan Siasatan Penyelia',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'superadmin',
                'display_name' => 'Superadmin',
                'guard_name' => 'web',
                'description' => 'Peranan SuperAdmin',
                'created_at' => '2019-09-19 13:03:41',
                'updated_at' => '2019-09-19 13:03:41',
            ),
        ));
        
        
    }
}