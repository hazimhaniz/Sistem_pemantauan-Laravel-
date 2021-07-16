<?php

use Illuminate\Database\Seeder;

class MasterBmpPematuhanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_bmp_pematuhan')->delete();
        
        \DB::table('master_bmp_pematuhan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'master_bmp_id' => 1,
                'name' => 'BAN TANAH DIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'master_bmp_id' => 1,
                'name' => 'BAN DIMAMPATKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'master_bmp_id' => 1,
                'name' => ' LINER MENGIKUT SPESIFIKASSEPATUTNYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'master_bmp_id' => 2,
                'name' => 'PERPARITAN LECONGAN DIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'master_bmp_id' => 2,
            'name' => 'PERPARITAN LENCONGAN DISAMBUNGKAN KE KOMPONEN KAWALAN SEDIMEN (KOLAM SEDIMEN)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'master_bmp_id' => 2,
                'name' => 'PERPARITAN LENCONGAN ADA KAWALAN HAKISAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'master_bmp_id' => 3,
                'name' => ' ADA LINER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'master_bmp_id' => 3,
                'name' => 'KEPADATAN AGREGAT YANG SESUADAN MENCUKUPI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'master_bmp_id' => 3,
                'name' => ' LINER MENGIKUT SPESIFIKASSEPATUTNYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'master_bmp_id' => 4,
                'name' => ' ADA DIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'master_bmp_id' => 4,
                'name' => 'DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'master_bmp_id' => 5,
                'name' => ' ADA DIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'master_bmp_id' => 5,
                'name' => 'DIBINA BERTINGKAT-TINGKAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'master_bmp_id' => 6,
                'name' => ' SAIZ BATU SESUAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'master_bmp_id' => 6,
                'name' => 'DENSITY MENCUKUPI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'master_bmp_id' => 6,
                'name' => 'TIADA LINER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'master_bmp_id' => 7,
                'name' => ' ADA DIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'master_bmp_id' => 7,
                'name' => 'JARAK SELA CD BETUL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'master_bmp_id' => 7,
                'name' => 'ICD MENGIKUT SPESIFIKASI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'master_bmp_id' => 7,
                'name' => 'DIBINA DILOKASYANG TEPAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'master_bmp_id' => 7,
                'name' => ' ALIRAN AIR BEJALAN DENGAN LANCAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'master_bmp_id' => 7,
                'name' => 'DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'master_bmp_id' => 8,
                'name' => ' ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'master_bmp_id' => 8,
                'name' => 'ALIRAN DISALIRKAN KE KAWALAN SEDIMEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'master_bmp_id' => 9,
                'name' => ' DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'master_bmp_id' => 9,
            'name' => 'MENGGUNAKAN BED PROTECTION YANG SESUA(*ROCK/MAT/GRASS)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'master_bmp_id' => 10,
                'name' => ' ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'master_bmp_id' => 10,
                'name' => 'DIBINA SUMP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'master_bmp_id' => 10,
                'name' => 'PENYAMBUNGAN KEMAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'master_bmp_id' => 10,
                'name' => 'ADA OUTLET PROTECTION',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'master_bmp_id' => 11,
                'name' => ' ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'master_bmp_id' => 11,
                'name' => 'BAHAN BATUAN MENGIKUT SPESIFIKASI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'master_bmp_id' => 12,
                'name' => 'ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'master_bmp_id' => 12,
                'name' => 'LOKASTEPAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'master_bmp_id' => 13,
                'name' => ' ADA KAWALAN SEPERTBATU/SAND BAG/ ROCK BAG/COIR LOG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'master_bmp_id' => 14,
                'name' => 'BAN TANAH DIBINA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'master_bmp_id' => 14,
                'name' => 'BAN DIMAMPATKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'master_bmp_id' => 14,
                'name' => 'LINER MENGIKUT SPESIFIKASSEPATUTNYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'master_bmp_id' => 15,
                'name' => ' PERATUSAN PENUTUPAN LEBIH DARIPADA 75% KAWASAN YANG DITANAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'master_bmp_id' => 15,
                'name' => 'MENGGUNAKAN TANAMAN YANG SESUAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'master_bmp_id' => 15,
                'name' => 'MELAKSANAKAN KAEDAH TURFING YANG BETUL TANAMAN DISIRAM SECARA BERKALA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'master_bmp_id' => 15,
                'name' => 'TANAMAN YANG MATI/ROSAK DIGANTI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'master_bmp_id' => 16,
                'name' => ' DIJALANKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'master_bmp_id' => 16,
                'name' => 'DIBAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'master_bmp_id' => 16,
                'name' => 'MENJALANKAN SUNGKUPAN/MATTING KE ATAS HYDROSEED YANG LAMBAT TUMBUH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'master_bmp_id' => 17,
                'name' => ' ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'master_bmp_id' => 17,
                'name' => 'SAIZ BATUAN YANG SESUAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'master_bmp_id' => 17,
                'name' => 'DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'master_bmp_id' => 17,
                'name' => 'ADA LINER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'master_bmp_id' => 18,
                'name' => 'MENGGUNAKAN PLASTIC SHEET MENGIKUT SPESIFIKASI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'master_bmp_id' => 18,
                'name' => 'MENGGUNAKAN SECARA KEKAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'master_bmp_id' => 18,
                'name' => 'PERMUKAAN DITUTUP DENGAN MENYELURUH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'master_bmp_id' => 18,
                'name' => 'DITINDIH DENGAN PEMBERAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'master_bmp_id' => 19,
                'name' => ' ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'master_bmp_id' => 19,
                'name' => 'PEMASANGAN SEMPURNA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'master_bmp_id' => 19,
                'name' => 'ADA PERTINDIHAN DHUJUNG PENYAMBUNGAN BLANKET',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'master_bmp_id' => 20,
                'name' => ' DIJALANKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'master_bmp_id' => 20,
                'name' => 'DIBUAT DENGAN CARA YANG BETUL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'master_bmp_id' => 21,
                'name' => ' DIPASANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'master_bmp_id' => 21,
                'name' => 'SEMPURNA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'master_bmp_id' => 22,
                'name' => ' DITANDA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'master_bmp_id' => 22,
                'name' => 'ADA PENANDAAN SEMPADAN TAPAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'master_bmp_id' => 23,
                'name' => ' SISA KONKRIT DITAKUNG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'master_bmp_id' => 23,
                'name' => 'EFLUEN DINEUTRALKAN DENGAN ASID',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'master_bmp_id' => 24,
                'name' => ' ADA BENTENG DSKID TANK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'master_bmp_id' => 24,
            'name' => 'ADA COLLECTION SUMP DAN PERANGKAP MINYAK (OIL SEPARATOR) UNTUK TUMPAHAN MINYAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'master_bmp_id' => 24,
                'name' => 'LOKASI TAPAK PENSTORAN MENGIKUT PELAN ESC',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'master_bmp_id' => 24,
                'name' => 'TIADA TUMPAHAN MINYAK, BAHAN KIMIA/BAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'master_bmp_id' => 24,
                'name' => ' ADA PERALATAN UNTUK KAWALAN TUMPAHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'master_bmp_id' => 25,
                'name' => ' TAPAK BERDEKATAN DENGAN ALUR AIR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'master_bmp_id' => 25,
                'name' => 'LOKASMENGIKUT PELAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'master_bmp_id' => 25,
                'name' => 'TIADA PEMBAKARAN TERBUKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'master_bmp_id' => 25,
                'name' => 'MENYEDIAKAN TONG SAMPAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'master_bmp_id' => 26,
                'name' => ' TAPAK BERJAUHAN DARIPADA LAUR AIR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'master_bmp_id' => 26,
                'name' => 'LOKASI MENGIKUT PELAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'master_bmp_id' => 26,
                'name' => 'TIADA PERMBAKARAN TERBUKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'master_bmp_id' => 26,
                'name' => 'OVERBURDEN DISTABILAKN/DIMAMPATKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'master_bmp_id' => 26,
                'name' => ' ADA KAWALAN PERIMETER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'master_bmp_id' => 27,
                'name' => ' STABILISASI DIBUAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'master_bmp_id' => 28,
                'name' => ' TEMPAT PENSTORAN SELAMAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'master_bmp_id' => 28,
                'name' => 'INVENTORI DIKEMASKINI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'master_bmp_id' => 28,
                'name' => 'ADA PELABELAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'master_bmp_id' => 29,
                'name' => ' TAPAK PENSTORAN DISTABILKAN DENGAN AGREGAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'master_bmp_id' => 29,
                'name' => 'ADA BENTENG DISKID TANK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'master_bmp_id' => 29,
            'name' => 'ADA COLLECTION SUMP DAN PERANGKAP MINYAK (OIL SEPARATOR) UNTUK TUMPAHAN MINYAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'master_bmp_id' => 29,
                'name' => 'LOKASI TAPAK PENSTORAN MENGIKUT PELAN ESC',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'master_bmp_id' => 29,
                'name' => ' TIADA TUMPAHAN MINYAK, BAHAN KIMIA/BAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'master_bmp_id' => 29,
                'name' => 'ADA PERLATAN UNTUK KAWALAN TUMPAHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'master_bmp_id' => 30,
                'name' => ' ADA TANDAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'master_bmp_id' => 30,
                'name' => 'TANDAS SEMPURNA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'master_bmp_id' => 30,
                'name' => 'ADA SISTEM RAWATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'master_bmp_id' => 30,
                'name' => 'SULAJ TIDAK DIRAWAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'master_bmp_id' => 31,
                'name' => ' TIADA TUMPAHAN MINYAK, BAHAN KIMIA/BAJA ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'master_bmp_id' => 31,
                'name' => 'ADA PERALATAN UNTUK KAWALAN TUMPAHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'master_bmp_id' => 32,
                'name' => ' ADA KEMUDAHAN PERALATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'master_bmp_id' => 33,
                'name' => 'INLET/OUTLET PROTECTION SEMPURNA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'master_bmp_id' => 33,
                'name' => 'AKSES KE KOLAM SEDIMEN DISEDIAKAN/SELAMAT UNTUK PENGSAMPELAN DAN PENYELENGGARAAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'master_bmp_id' => 33,
                'name' => 'PELEPASAN MELALUI OUTLET KOLAM SEDIMEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'master_bmp_id' => 33,
                'name' => 'RISER/WEIR BERFUNGSI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'master_bmp_id' => 33,
                'name' => 'PENANDA KEDALAMAN SEDIMEN DISEDIAKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'master_bmp_id' => 33,
                'name' => 'PLATFORM UNTUK PEMERIKSAAN DAN PENYELENGGARAN DISEDIAKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'master_bmp_id' => 33,
            'name' => 'KOLAM SEDIMEN DISELENGGARA (DESILTING)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'master_bmp_id' => 33,
            'name' => 'ADA PENSTABILAN TEBING KOLAM (EMBANKMENT)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'master_bmp_id' => 33,
                'name' => 'SAIZ, LOKASI DAN BILANGAN KOLAM MENGIKUT REKABENTUK/PELAN ESC',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'master_bmp_id' => 33,
                'name' => 'DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'master_bmp_id' => 33,
                'name' => 'BUANGAN SEDIMEN DILETAK SELAIN DARI DI TEPI KOLAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'master_bmp_id' => 34,
                'name' => 'ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'master_bmp_id' => 34,
                'name' => 'MENGIKUT SPESIFIKASI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'master_bmp_id' => 34,
                'name' => 'DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'master_bmp_id' => 35,
            'name' => 'DIJALANKAN DI KAWASAN TANAH LEMBUT (SOFT SOIL)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'master_bmp_id' => 35,
                'name' => 'DIPADATKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'master_bmp_id' => 36,
            'name' => 'DIPASANG DI KAWASAN SEKELILING KAWASAN KERJA(WORKING AREA)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'master_bmp_id' => 36,
                'name' => 'DIREBAR/STAKING KE TANAH YANG BAIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'master_bmp_id' => 37,
            'name' => 'DIGUNAKAN DI KAWASAN CERUN MENDATAR YANG PANJANG (HORIZONTAL SLOPE LENGTH > 5M DAN SLOPE ANGLE > 450)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'master_bmp_id' => 37,
                'name' => 'DIREBAR/STAKING KE TANAH YANG BAIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'master_bmp_id' => 38,
                'name' => 'ADA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'master_bmp_id' => 38,
            'name' => 'APLIKASI YANG BETUL (MENGGUNAKAN SEBAGAI PENAPIS, DIPASANG DI ATAS CERUN, DIPASANG DALAM CHANNEL)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'master_bmp_id' => 38,
                'name' => 'MENGIKUT KONTUR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'master_bmp_id' => 38,
                'name' => 'ADA TRENCHES PA KAKI SILT FENCE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'master_bmp_id' => 38,
                'name' => 'PEMASANGAN MENGIKUT KAEDAH YANG BETUL/MANUAL PEMBEKAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'master_bmp_id' => 38,
                'name' => 'DISELENGGARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}