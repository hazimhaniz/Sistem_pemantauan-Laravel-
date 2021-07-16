<?php

use Illuminate\Database\Seeder;

class MasterFilingStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_filing_status')->delete();
        
        \DB::table('master_filing_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Draf',
                'int_text' => 'Draf',
                'ext_text' => 'Draf',
                'desc' => 'Borang baru diisi dan belum dihantar',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Semakan Peg. Penyiasat',
                'int_text' => 'Semakan Peg. Penyiasat',
                'ext_text' => 'Semakan Peg. Penyiasat',
                'desc' => 'Borang dalam semakan pengawai penyiasat',
                'badge' => 'label-light-warning',
                'created_at' => '2020-11-27 18:33:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Disemak Peg. Penyiasat',
                'int_text' => 'Disemak Peg. Penyiasat',
                'ext_text' => 'Disemak Peg. Penyiasat',
                'desc' => 'Borang telah disemak oleh pengawai penyiasat',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Pengesahan Peg. Penyiasat',
                'int_text' => 'Pengesahan Peg. Penyiasat',
                'ext_text' => 'Pengesahan Peg. Penyiasat',
                'desc' => 'Borang dalam pengesahan pengawai penyiasat',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Disahkan Peg. Penyiasat',
                'int_text' => 'Disahkan Peg. Penyiasat',
                'ext_text' => 'Disahkan Peg. Penyiasat',
                'desc' => 'Borang telah disahkan pengawai penyiasat',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Semakan Penyelia',
                'int_text' => 'Semakan Penyelia',
                'ext_text' => 'Semakan Penyelia',
                'desc' => 'Borang dalam semakan penyelia',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Disemak Penyelia',
                'int_text' => 'Disemak Penyelia',
                'ext_text' => 'Disemak Penyelia',
                'desc' => 'Borang telah disemak penyelia',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Semakan Pelulus',
                'int_text' => 'Semakan Pelulus',
                'ext_text' => 'Semakan Pelulus',
                'desc' => 'Borang dalam semakan pelulus',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Disemak Pelulus',
                'int_text' => 'Disemak Pelulus',
                'ext_text' => 'Disemak Pelulus',
                'desc' => 'Borang telah disemak pelulus',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Disahkan Pelulus',
                'int_text' => 'Disahkan Pelulus',
                'ext_text' => 'Disahkan Pelulus',
                'desc' => 'Borang telah disahkan pelulus',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Semakan EO',
                'int_text' => 'Semakan EO',
                'ext_text' => 'Semakan EO',
                'desc' => 'Borang dalam semakan Environmental Officer',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Disemak EO',
                'int_text' => 'Disemak EO',
                'ext_text' => 'Disemak EO',
                'desc' => 'Borang telah disemak Environmental Officer',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Semakan PP',
                'int_text' => 'Semakan PP',
                'ext_text' => 'Semakan PP',
                'desc' => 'Borang dalam semakan Penggerak Projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Disemak PP',
                'int_text' => 'Disemak PP',
                'ext_text' => 'Disemak PP',
                'desc' => 'Borang telah disahkan Penggerak Projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Pengesahan PP',
                'int_text' => 'Pengesahan PP',
                'ext_text' => 'Pengesahan PP',
                'desc' => 'Borang dalam pengesahan Penggerak Projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Disahkan PP',
                'int_text' => 'Disahkan PP',
                'ext_text' => 'Disahkan PP',
                'desc' => 'Borang telah disahkan Penggerak Projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Kuiri',
                'int_text' => 'Kuiri',
                'ext_text' => 'Kuiri',
                'desc' => 'Borang telah dikuiri',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Pindaan',
                'int_text' => 'Pindaan',
                'ext_text' => 'Pindaan',
                'desc' => 'Borang perlu dikemaskini',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Selesai',
                'int_text' => 'Selesai',
                'ext_text' => 'Selesai',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Pendaftaran PP',
                'int_text' => 'Pendaftaran PP',
                'ext_text' => 'Pendaftaran PP',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Pendaftaran EMC',
                'int_text' => 'Pendaftaran EMC',
                'ext_text' => 'Pendaftaran EMC',
                'desc' => 'Borang telah lengkap dihantar',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Pendaftaran EO',
                'int_text' => 'Pendaftaran EO',
                'ext_text' => 'Pendaftaran EO',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Penukaran PP',
                'int_text' => 'Penukaran PP',
                'ext_text' => 'Penukaran PP',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Penukaran EMC',
                'int_text' => 'Penukaran EMC',
                'ext_text' => 'Penukaran EMC',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Penukaran EO',
                'int_text' => 'Penukaran EO',
                'ext_text' => 'Penukaran EO',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Aktif',
                'int_text' => 'Aktif',
                'ext_text' => 'Aktif',
                'desc' => NULL,
                'badge' => 'label-light-success',
                'created_at' => '2020-11-27 18:33:33',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Tidak Aktif',
                'int_text' => 'Tidak Aktif',
                'ext_text' => 'Tidak Aktif',
                'desc' => NULL,
                'badge' => 'label-light-grey',
                'created_at' => '2020-11-27 18:33:33',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Projek Siap',
                'int_text' => 'Projek Siap',
                'ext_text' => 'Projek Siap',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Projek Tangguh',
                'int_text' => 'Projek Tangguh',
                'ext_text' => 'Projek Tangguh',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Projek Terbengkalai',
                'int_text' => 'Projek Terbengkalai',
                'ext_text' => 'Projek Terbengkalai',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            30 => 
            array (
                'id' => 101,
                'name' => 'Aktif',
                'int_text' => 'Aktif',
                'ext_text' => 'Aktif',
                'desc' => 'Pengguna Aktif',
                'badge' => 'label-light-success',
                'created_at' => '2020-11-27 18:33:33',
            ),
            31 => 
            array (
                'id' => 102,
                'name' => 'Tidak Aktif',
                'int_text' => 'Tidak Aktif',
                'ext_text' => 'Tidak Aktif',
                'desc' => 'Pengguna Tidak Aktif',
                'badge' => 'label-light-grey',
                'created_at' => '2020-11-27 18:33:33',
            ),
            32 => 
            array (
                'id' => 103,
                'name' => 'Belum Disahkan',
                'int_text' => 'Belum Disahkan',
                'ext_text' => 'Belum Disahkan',
                'desc' => 'Pengguna Belum Disahkan',
                'badge' => 'label-light-danger',
                'created_at' => '2020-11-27 18:33:33',
            ),
            33 => 
            array (
                'id' => 104,
                'name' => 'Disekat',
                'int_text' => 'Disekat',
                'ext_text' => 'Disekat',
                'desc' => 'Pengguna telah Disekat',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            34 => 
            array (
                'id' => 105,
                'name' => 'Tidak Aktif',
                'int_text' => 'Tidak Aktif',
                'ext_text' => 'Tidak Aktif',
                'desc' => NULL,
                'badge' => 'label-light-grey',
                'created_at' => '2020-11-27 18:33:33',
            ),
            35 => 
            array (
                'id' => 106,
            'name' => 'Pengesahan Penyiasat ( Nyah Aktif )',
            'int_text' => 'Pengesahan Penyiasat ( Nyah Aktif )',
            'ext_text' => 'Pengesahan Penyiasat ( Nyah Aktif )',
            'desc' => 'Pengguna dalam Pengesahan Penyiasat ( Nyah Aktif )',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            36 => 
            array (
                'id' => 107,
            'name' => 'Pengesahan Penyiasat ( Aktif )',
            'int_text' => 'Pengesahan Penyiasat ( Aktif )',
            'ext_text' => 'Pengesahan Penyiasat ( Aktif )',
            'desc' => 'Pengguna dalam Pengesahan Penyiasat ( Aktif )',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            37 => 
            array (
                'id' => 108,
                'name' => 'Kemaskini Makmal Akreditasi',
                'int_text' => 'Kemaskini Makmal Akreditasi',
                'ext_text' => 'Kemaskini Makmal Akreditasi',
                'desc' => 'Pengguna Kemaskini Makmal Akreditasi',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            38 => 
            array (
                'id' => 109,
                'name' => 'Deraf',
                'int_text' => 'Deraf',
                'ext_text' => 'Deraf',
                'desc' => 'Permohonan belum dihantar',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            39 => 
            array (
                'id' => 110,
                'name' => 'Permohonan Ditolak',
                'int_text' => 'Permohonan Ditolak',
                'ext_text' => 'Permohonan Ditolak',
                'desc' => 'Permohonan pengguna ditolak',
                'badge' => 'label-light-danger',
                'created_at' => '2020-11-27 18:33:33',
            ),
            40 => 
            array (
                'id' => 111,
                'name' => 'Penukaran EO',
                'int_text' => 'Penukaran EO',
                'ext_text' => 'Penukaran EO',
                'desc' => 'Penukaran Environmental Officer',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            41 => 
            array (
                'id' => 112,
                'name' => 'Penukaran EMC',
                'int_text' => 'Penukaran EMC',
                'ext_text' => 'Penukaran EMC',
                'desc' => 'Penukaran Environmental Monitoring Consultant',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            42 => 
            array (
                'id' => 113,
                'name' => 'Penukaran PP',
                'int_text' => 'Penukaran PP',
                'ext_text' => 'Penukaran PP',
                'desc' => 'Penukaran Penggerak Projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            43 => 
            array (
                'id' => 200,
                'name' => 'Projek Aktif',
                'int_text' => 'Projek Aktif',
                'ext_text' => 'Projek Aktif',
                'desc' => 'Projek sedang dijalankan',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            44 => 
            array (
                'id' => 201,
                'name' => 'Projek Selesai',
                'int_text' => 'Projek Selesai',
                'ext_text' => 'Projek Selesai',
                'desc' => 'Projek sudah tamat',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            45 => 
            array (
                'id' => 203,
                'name' => 'Projek Tangguh',
                'int_text' => 'Projek Tangguh',
                'ext_text' => 'Projek Tangguh',
                'desc' => 'Projek telah ditunda',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            46 => 
            array (
                'id' => 204,
                'name' => 'Projek Terbengkalai',
                'int_text' => 'Projek Terbengkalai',
                'ext_text' => 'Projek Terbengkalai',
                'desc' => 'Projek terbiar dan tidak dijalankan',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            47 => 
            array (
                'id' => 205,
                'name' => 'Penukaran PP',
                'int_text' => 'Penukaran PP',
                'ext_text' => 'Penukaran PP',
                'desc' => 'Projek dalam proses penukaran penggerak projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            48 => 
            array (
                'id' => 206,
                'name' => 'Penukaran EO',
                'int_text' => 'Penukaran EO',
                'ext_text' => 'Penukaran EO',
                'desc' => 'Projek dalam proses penukaran enviromental officer',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            49 => 
            array (
                'id' => 207,
                'name' => 'Penukaran EMC',
                'int_text' => 'Penukaran EMC',
                'ext_text' => 'Penukaran EMC',
                'desc' => 'Projek dalam proses penukaran environmental monitoring consultant',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            50 => 
            array (
                'id' => 208,
                'name' => 'Projek Tidak Aktif',
                'int_text' => 'Projek Tidak Aktif',
                'ext_text' => 'Projek Tidak Aktif',
                'desc' => 'Projek tidak lagi dijalankan',
                'badge' => 'label-light-grey',
                'created_at' => '2020-11-27 18:33:33',
            ),
            51 => 
            array (
                'id' => 209,
                'name' => 'Pendaftaran Projek',
                'int_text' => 'Pendaftaran Projek',
                'ext_text' => 'Pendaftaran Projek',
                'desc' => NULL,
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            52 => 
            array (
                'id' => 210,
                'name' => 'Projek Dipinda',
                'int_text' => 'Projek Dipinda',
                'ext_text' => 'Projek Dipinda',
                'desc' => 'Projek dalam proses kemaskini ',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            53 => 
            array (
                'id' => 211,
                'name' => 'Penyediaan Laporan Bulanan',
                'int_text' => 'Penyediaan Laporan Bulanan',
                'ext_text' => 'Penyediaan Laporan Bulanan',
                'desc' => 'Projek dalam proses penyediaan laporan bulanan',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-02 14:51:16',
            ),
            54 => 
            array (
                'id' => 212,
                'name' => 'Projek Siap',
                'int_text' => 'Projek Siap',
                'ext_text' => 'Projek Siap',
                'desc' => 'Projek sudah tamat',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-06 02:41:12',
            ),
            55 => 
            array (
                'id' => 301,
                'name' => 'Draf',
                'int_text' => 'Draf',
                'ext_text' => 'Draf',
                'desc' => 'Borang baru diisi dan belum dihantar',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            56 => 
            array (
                'id' => 302,
                'name' => 'Pendaftaran EO & EMC',
                'int_text' => 'Pendaftaran EO & EMC',
                'ext_text' => 'Pendaftaran EO & EMC',
                'desc' => 'Pendaftaran Environmental Officer and Environmental Monitoring Consultant',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            57 => 
            array (
                'id' => 500,
                'name' => 'L. Bulanan Belum Diisi',
                'int_text' => 'L. Bulanan Belum Diisi',
                'ext_text' => 'L. Bulanan Belum Diisi',
                'desc' => 'Laporan bulanan belum diisi',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            58 => 
            array (
                'id' => 501,
                'name' => 'L. Bulanan Tidak Lengkap',
                'int_text' => 'L. Bulanan Tidak Lengkap',
                'ext_text' => 'L. Bulanan Tidak Lengkap',
                'desc' => 'Laporan bulan tidak lengkap',
                'badge' => 'label-light-warning',
                'created_at' => '2020-11-27 18:33:33',
            ),
            59 => 
            array (
                'id' => 502,
                'name' => 'L. Bulanan  Lengkap',
                'int_text' => 'L. Bulanan  Lengkap',
                'ext_text' => 'L. Bulanan  Lengkap',
                'desc' => 'Laporan bulanan telah lengkap ',
                'badge' => 'label-light-success',
                'created_at' => '2020-11-27 18:33:33',
            ),
            60 => 
            array (
                'id' => 503,
                'name' => 'Kuiri',
                'int_text' => 'Kuiri',
                'ext_text' => 'Kuiri',
                'desc' => 'Laporan bulanan dikuiri',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            61 => 
            array (
                'id' => 504,
                'name' => 'Hantar laporan bulanan',
                'int_text' => 'Hantar laporan bulanan',
                'ext_text' => 'Hantar laporan bulanan',
                'desc' => 'Laporan bulanan telah dihantar',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-04 14:37:11',
            ),
            62 => 
            array (
                'id' => 505,
                'name' => 'Laporan bulanan belum dihantar',
                'int_text' => 'Laporan bulanan belum dihantar',
                'ext_text' => 'Laporan bulanan belum dihantar',
                'desc' => 'Laporan bulanan belum dihantar',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-07 04:27:24',
            ),
            63 => 
            array (
                'id' => 506,
                'name' => 'Kuiri telah dijawab',
                'int_text' => 'Kuiri telah dijawab',
                'ext_text' => 'Kuiri telah dijawab',
                'desc' => 'Kuiri laporan bulanan telah dijawab',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-07 04:27:36',
            ),
            64 => 
            array (
                'id' => 507,
                'name' => 'Permakahan Pematuhan',
                'int_text' => 'Permakahan Pematuhan',
                'ext_text' => 'Permakahan Pematuhan',
                'desc' => 'Pengiraan permarkahan pematuhan laporan bulanan',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-07 04:27:54',
            ),
            65 => 
            array (
                'id' => 508,
                'name' => 'Penyediaan Lap. Siasatan',
                'int_text' => 'Penyediaan Lap. Siasatan',
                'ext_text' => 'Penyediaan Lap. Siasatan',
                'desc' => '',
                'badge' => 'label-light-blue',
                'created_at' => '2020-12-07 04:28:09',
            ),
            66 => 
            array (
                'id' => 509,
                'name' => 'L. Bulanan Telah Disahkan',
                'int_text' => 'L. Bulanan Telah Disahkan',
                'ext_text' => 'L. Bulanan Telah Disahkan',
                'desc' => 'Laporan bulan telah disahkan',
                'badge' => 'label-light-success',
                'created_at' => '2020-12-15 05:26:30',
            ),
            67 => 
            array (
                'id' => 600,
                'name' => 'Belum Bermula',
                'int_text' => 'Belum Bermula',
                'ext_text' => 'Belum Bermula',
                'desc' => 'Laporan belum dimulakan',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            68 => 
            array (
                'id' => 601,
                'name' => 'Tidak Lengkap',
                'int_text' => 'Tidak Lengkap',
                'ext_text' => 'Tidak Lengkap',
                'desc' => 'Laporan tidak lengkap',
                'badge' => 'label-light-warning',
                'created_at' => '2020-11-27 18:33:33',
            ),
            69 => 
            array (
                'id' => 602,
                'name' => 'Lengkap',
                'int_text' => 'Lengkap',
                'ext_text' => 'Lengkap',
                'desc' => 'Laporan telah lengkap',
                'badge' => 'label-light-success',
                'created_at' => '2020-11-27 18:33:33',
            ),
            70 => 
            array (
                'id' => 603,
                'name' => 'Pendaftaran Station',
                'int_text' => 'Pendaftaran Station',
                'ext_text' => 'Pendaftaran Station',
                'desc' => 'Laporan dalam pendaftaran stesen',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            71 => 
            array (
                'id' => 604,
                'name' => 'Kuiri',
                'int_text' => 'Kuiri',
                'ext_text' => 'Kuiri',
                'desc' => 'Laporan telah dikuiri',
                'badge' => 'label-light-warning blink',
                'created_at' => '2020-11-27 18:33:33',
            ),
            72 => 
            array (
                'id' => 605,
                'name' => 'Penukaran PP',
                'int_text' => 'Penukaran PP',
                'ext_text' => 'Penukaran PP',
                'desc' => 'Laporan dalam proses penukaran penggerak projek',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            73 => 
            array (
                'id' => 606,
                'name' => 'Tambah Station Baru',
                'int_text' => 'Tambah Station Baru',
                'ext_text' => 'Tambah Station Baru',
                'desc' => 'Tambahan stesen baru',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            74 => 
            array (
                'id' => 607,
                'name' => 'Stesen Aktif',
                'int_text' => 'Stesen Aktif',
                'ext_text' => 'Stesen Aktif',
                'desc' => 'Stesen aktif',
                'badge' => 'label-light-success',
                'created_at' => '2020-12-04 14:42:35',
            ),
            75 => 
            array (
                'id' => 701,
                'name' => 'Fasa belum Diisi',
                'int_text' => 'Fasa belum Diisi',
                'ext_text' => 'Fasa belum Diisi',
                'desc' => 'Laporan fasa belum diisi',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            76 => 
            array (
                'id' => 702,
                'name' => 'Fasa Tidak Lengkap',
                'int_text' => 'Fasa Tidak Lengkap',
                'ext_text' => 'Fasa Tidak Lengkap',
                'desc' => 'Laporan fasa tidak lengkap',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            77 => 
            array (
                'id' => 703,
                'name' => 'Fasa Lengkap',
                'int_text' => 'Fasa Lengkap',
                'ext_text' => 'Fasa Lengkap',
                'desc' => 'Laporan fasa telah lengkap',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            78 => 
            array (
                'id' => 704,
                'name' => 'Kuiri',
                'int_text' => 'Kuiri',
                'ext_text' => 'Kuiri',
                'desc' => 'Laporan fasa telah dikuiri',
                'badge' => 'label-light-blue',
                'created_at' => '2020-11-27 18:33:33',
            ),
            79 => 
            array (
                'id' => 705,
                'name' => 'Fasa Tidak Aktif',
                'int_text' => 'Fasa Tidak Aktif',
                'ext_text' => 'Fasa Tidak Aktif',
                'desc' => 'Laporan fasa tidak aktif',
                'badge' => 'label-light-warning',
                'created_at' => '2020-12-04 14:43:11',
            ),
        ));
        
        
    }
}