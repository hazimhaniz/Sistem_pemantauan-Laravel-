<?php

use Illuminate\Database\Seeder;

class MasterAktivitiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_aktiviti')->delete();
        
        \DB::table('master_aktiviti')->insert(array (
            0 => 
            array (
                'id' => 1,
            'aktiviti' => 'Jadual 1 - 1(a)',
                'keterangan' => 'Pertanian',
            ),
            1 => 
            array (
                'id' => 2,
            'aktiviti' => 'Jadual 1 - 1(b)',
                'keterangan' => 'Pertanian',
            ),
            2 => 
            array (
                'id' => 3,
                'aktiviti' => 'Jadual 1 - 2',
                'keterangan' => 'Aerodrom',
            ),
            3 => 
            array (
                'id' => 4,
            'aktiviti' => 'Jadual 1 - 3(a)',
                'keterangan' => 'Saliran dan Pengairan',
            ),
            4 => 
            array (
                'id' => 5,
            'aktiviti' => 'Jadual 1 - 3(b)',
                'keterangan' => 'Saliran dan Pengairan',
            ),
            5 => 
            array (
                'id' => 6,
                'aktiviti' => 'Jadual 1 - 4',
                'keterangan' => 'Perikanan',
            ),
            6 => 
            array (
                'id' => 7,
            'aktiviti' => 'Jadual 1 - 5(a)',
                'keterangan' => 'Perhutanan',
            ),
            7 => 
            array (
                'id' => 8,
            'aktiviti' => 'Jadual 1 - 5(b)',
                'keterangan' => 'Perhutanan',
            ),
            8 => 
            array (
                'id' => 9,
            'aktiviti' => 'Jadual 1 - 5(c)',
                'keterangan' => 'Perhutanan',
            ),
            9 => 
            array (
                'id' => 10,
            'aktiviti' => 'Jadual 1 - 5(d)(i)',
                'keterangan' => 'Perhutanan',
            ),
            10 => 
            array (
                'id' => 11,
            'aktiviti' => 'Jadual 1 - 5(d)(ii)',
                'keterangan' => 'Perhutanan',
            ),
            11 => 
            array (
                'id' => 12,
            'aktiviti' => 'Jadual 1 - 5(d)(iii)',
                'keterangan' => 'Perhutanan',
            ),
            12 => 
            array (
                'id' => 13,
            'aktiviti' => 'Jadual 1 - 5(e)',
                'keterangan' => 'Perhutanan',
            ),
            13 => 
            array (
                'id' => 14,
            'aktiviti' => 'Jadual 1 - 6(a)',
                'keterangan' => 'Industri',
            ),
            14 => 
            array (
                'id' => 15,
            'aktiviti' => 'Jadual 1 - 6(b)',
                'keterangan' => 'Industri',
            ),
            15 => 
            array (
                'id' => 16,
            'aktiviti' => 'Jadual 1 - 6(c)',
                'keterangan' => 'Industri',
            ),
            16 => 
            array (
                'id' => 17,
            'aktiviti' => 'Jadual 1 - 6(d)',
                'keterangan' => 'Industri',
            ),
            17 => 
            array (
                'id' => 18,
            'aktiviti' => 'Jadual 1 - 6(e)',
                'keterangan' => 'Industri',
            ),
            18 => 
            array (
                'id' => 19,
                'aktiviti' => 'Jadual 1 - 7',
                'keterangan' => 'Penebusgunaan Tanah',
            ),
            19 => 
            array (
                'id' => 20,
            'aktiviti' => 'Jadual 1 - 8(a)',
                'keterangan' => 'Perlombongan',
            ),
            20 => 
            array (
                'id' => 21,
            'aktiviti' => 'Jadual 1 - 8(b)',
                'keterangan' => 'Perlombongan',
            ),
            21 => 
            array (
                'id' => 22,
            'aktiviti' => 'Jadual 1 - 8(c)',
                'keterangan' => 'Perlombongan',
            ),
            22 => 
            array (
                'id' => 23,
            'aktiviti' => 'Jadual 1 - 9(a)(i)',
                'keterangan' => 'Petroleum',
            ),
            23 => 
            array (
                'id' => 24,
            'aktiviti' => 'Jadual 1 - 9(a)(ii)',
                'keterangan' => 'Petroleum',
            ),
            24 => 
            array (
                'id' => 25,
            'aktiviti' => 'Jadual 1 - 9(a)(iii)',
                'keterangan' => 'Petroleum',
            ),
            25 => 
            array (
                'id' => 26,
            'aktiviti' => 'Jadual 1 - 9(b)(i)',
                'keterangan' => 'Petroleum',
            ),
            26 => 
            array (
                'id' => 27,
            'aktiviti' => 'Jadual 1 - 9(b)(ii)',
                'keterangan' => 'Petroleum',
            ),
            27 => 
            array (
                'id' => 28,
            'aktiviti' => 'Jadual 1 - 9(b)(iii)',
                'keterangan' => 'Petroleum',
            ),
            28 => 
            array (
                'id' => 29,
            'aktiviti' => 'Jadual 1 - 9(c)(i)',
                'keterangan' => 'Petroleum',
            ),
            29 => 
            array (
                'id' => 30,
            'aktiviti' => 'Jadual 1 - 9(c)(ii)',
                'keterangan' => 'Petroleum',
            ),
            30 => 
            array (
                'id' => 31,
            'aktiviti' => 'Jadual 1 - 9(c)(iii)',
                'keterangan' => 'Petroleum',
            ),
            31 => 
            array (
                'id' => 32,
            'aktiviti' => 'Jadual 1 - 9(d)',
                'keterangan' => 'Petroleum',
            ),
            32 => 
            array (
                'id' => 33,
            'aktiviti' => 'Jadual 1 - 10(a)',
                'keterangan' => 'Pelabuhan',
            ),
            33 => 
            array (
                'id' => 34,
            'aktiviti' => 'Jadual 1 - 10(b)',
                'keterangan' => 'Pelabuhan',
            ),
            34 => 
            array (
                'id' => 35,
            'aktiviti' => 'Jadual 1 - 11(a)',
                'keterangan' => 'Penjanaan dan Pemancaran Kuasa',
            ),
            35 => 
            array (
                'id' => 36,
            'aktiviti' => 'Jadual 1 - 11(b)',
                'keterangan' => 'Penjanaan dan Pemancaran Kuasa',
            ),
            36 => 
            array (
                'id' => 37,
            'aktiviti' => 'Jadual 1 - 11(c)',
                'keterangan' => 'Penjanaan dan Pemancaran Kuasa',
            ),
            37 => 
            array (
                'id' => 38,
            'aktiviti' => 'Jadual 1 - 12(a)',
                'keterangan' => 'Pembangunan di Kawasan Pantai dan Bukit',
            ),
            38 => 
            array (
                'id' => 39,
            'aktiviti' => 'Jadual 1 - 12(b)',
                'keterangan' => 'Pembangunan di Kawasan Pantai dan Bukit',
            ),
            39 => 
            array (
                'id' => 40,
                'aktiviti' => 'Jadual 1 - 13',
                'keterangan' => 'Pembangunan di Kawasan Cerun',
            ),
            40 => 
            array (
                'id' => 41,
            'aktiviti' => 'Jadual 1 - 14(a)(i)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            41 => 
            array (
                'id' => 42,
            'aktiviti' => 'Jadual 1 - 14(a)(ii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            42 => 
            array (
                'id' => 43,
            'aktiviti' => 'Jadual 1 - 14(a)(iii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            43 => 
            array (
                'id' => 44,
            'aktiviti' => 'Jadual 1 - 14(b)(i)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            44 => 
            array (
                'id' => 45,
            'aktiviti' => 'Jadual 1 - 14(b)(ii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            45 => 
            array (
                'id' => 46,
            'aktiviti' => 'Jadual 1 - 14(c)(i)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            46 => 
            array (
                'id' => 47,
            'aktiviti' => 'Jadual 1 - 14(c)(ii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            47 => 
            array (
                'id' => 48,
            'aktiviti' => 'Jadual 1 - 15(a)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            48 => 
            array (
                'id' => 49,
            'aktiviti' => 'Jadual 1 - 15(b)',
                'keterangan' => 'Pengorekan',
            ),
            49 => 
            array (
                'id' => 50,
                'aktiviti' => 'Jadual 1 - 16',
                'keterangan' => 'Perumahan',
            ),
            50 => 
            array (
                'id' => 51,
                'aktiviti' => 'Jadual 1 - 17',
                'keterangan' => 'Pembangunan Estet Industri',
            ),
            51 => 
            array (
                'id' => 52,
                'aktiviti' => 'Jadual 1 - 18',
                'keterangan' => 'Bandar Baharu',
            ),
            52 => 
            array (
                'id' => 53,
                'aktiviti' => 'Jadual 1 - 19',
                'keterangan' => 'Kuari',
            ),
            53 => 
            array (
                'id' => 54,
            'aktiviti' => 'Jadual 1 - 20(a)',
                'keterangan' => 'Jalan',
            ),
            54 => 
            array (
                'id' => 55,
            'aktiviti' => 'Jadual 1 - 20(b)',
                'keterangan' => 'Jalan',
            ),
            55 => 
            array (
                'id' => 56,
            'aktiviti' => 'Jadual 1 - 20(c)',
                'keterangan' => 'Jalan',
            ),
            56 => 
            array (
                'id' => 57,
                'aktiviti' => 'Jadual 1 - 21',
                'keterangan' => 'Bekalan Air',
            ),
            57 => 
            array (
                'id' => 58,
            'aktiviti' => 'Jadual 2 - 1(a)',
                'keterangan' => 'Pertanian',
            ),
            58 => 
            array (
                'id' => 59,
            'aktiviti' => 'Jadual 2 - 1(b)',
                'keterangan' => 'Pertanian',
            ),
            59 => 
            array (
                'id' => 60,
            'aktiviti' => 'Jadual 2 - 2(a)',
                'keterangan' => 'Aerodrom',
            ),
            60 => 
            array (
                'id' => 61,
            'aktiviti' => 'Jadual 2 - 2(b)',
                'keterangan' => 'Aerodrom',
            ),
            61 => 
            array (
                'id' => 62,
            'aktiviti' => 'Jadual 2 - 3(a)',
                'keterangan' => 'Saliran dan Pengairan',
            ),
            62 => 
            array (
                'id' => 63,
            'aktiviti' => 'Jadual 2 - 3(b)',
                'keterangan' => 'Saliran dan Pengairan',
            ),
            63 => 
            array (
                'id' => 64,
                'aktiviti' => 'Jadual 2 - 4',
                'keterangan' => 'Perikanan',
            ),
            64 => 
            array (
                'id' => 65,
            'aktiviti' => 'Jadual 2 - 5(a)',
                'keterangan' => 'Perhutanan',
            ),
            65 => 
            array (
                'id' => 66,
            'aktiviti' => 'Jadual 2 - 5(b)(i)',
                'keterangan' => 'Perhutanan',
            ),
            66 => 
            array (
                'id' => 67,
            'aktiviti' => 'Jadual 2 - 5(b)(ii)',
                'keterangan' => 'Perhutanan',
            ),
            67 => 
            array (
                'id' => 68,
            'aktiviti' => 'Jadual 2 - 5(b)(iii)',
                'keterangan' => 'Perhutanan',
            ),
            68 => 
            array (
                'id' => 69,
            'aktiviti' => 'Jadual 2 - 5(b)(iv)',
                'keterangan' => 'Perhutanan',
            ),
            69 => 
            array (
                'id' => 70,
            'aktiviti' => 'Jadual 2 - 5(c)',
                'keterangan' => 'Perhutanan',
            ),
            70 => 
            array (
                'id' => 71,
            'aktiviti' => 'Jadual 2 - 5(d)',
                'keterangan' => 'Perhutanan',
            ),
            71 => 
            array (
                'id' => 72,
            'aktiviti' => 'Jadual 2 - 5(e)',
                'keterangan' => 'Perhutanan',
            ),
            72 => 
            array (
                'id' => 73,
            'aktiviti' => 'Jadual 2 - 5(f)(i)',
                'keterangan' => 'Perhutanan',
            ),
            73 => 
            array (
                'id' => 74,
            'aktiviti' => 'Jadual 2 - 5(f)(ii)',
                'keterangan' => 'Perhutanan',
            ),
            74 => 
            array (
                'id' => 75,
            'aktiviti' => 'Jadual 2 - 5(f)(iii)',
                'keterangan' => 'Perhutanan',
            ),
            75 => 
            array (
                'id' => 76,
            'aktiviti' => 'Jadual 2 - 5(g)',
                'keterangan' => 'Perhutanan',
            ),
            76 => 
            array (
                'id' => 77,
            'aktiviti' => 'Jadual 2 - 6(a)(i)',
                'keterangan' => 'Industri',
            ),
            77 => 
            array (
                'id' => 78,
            'aktiviti' => 'Jadual 2 - 6(a)(ii)',
                'keterangan' => 'Industri',
            ),
            78 => 
            array (
                'id' => 79,
            'aktiviti' => 'Jadual 2 - 6(a)(iii)',
                'keterangan' => 'Industri',
            ),
            79 => 
            array (
                'id' => 80,
            'aktiviti' => 'Jadual 2 - 6(b)',
                'keterangan' => 'Industri',
            ),
            80 => 
            array (
                'id' => 81,
            'aktiviti' => 'Jadual 2 - 6(c)(i)',
                'keterangan' => 'Industri',
            ),
            81 => 
            array (
                'id' => 82,
            'aktiviti' => 'Jadual 2 - 6(c)(ii)',
                'keterangan' => 'Industri',
            ),
            82 => 
            array (
                'id' => 83,
            'aktiviti' => 'Jadual 2 - 6(d)',
                'keterangan' => 'Industri',
            ),
            83 => 
            array (
                'id' => 84,
            'aktiviti' => 'Jadual 2 - 6(e)',
                'keterangan' => 'Industri',
            ),
            84 => 
            array (
                'id' => 85,
            'aktiviti' => 'Jadual 2 - 6(f)',
                'keterangan' => 'Industri',
            ),
            85 => 
            array (
                'id' => 86,
            'aktiviti' => 'Jadual 2 - 7(a)',
                'keterangan' => 'Penebusgunaan Tanah',
            ),
            86 => 
            array (
                'id' => 87,
            'aktiviti' => 'Jadual 2 - 7(b)',
                'keterangan' => 'Penebusgunaan Tanah',
            ),
            87 => 
            array (
                'id' => 88,
            'aktiviti' => 'Jadual 2 - 7(c)',
                'keterangan' => 'Penebusgunaan Tanah',
            ),
            88 => 
            array (
                'id' => 89,
            'aktiviti' => 'Jadual 2 - 8(a)',
                'keterangan' => 'Perlombongan',
            ),
            89 => 
            array (
                'id' => 90,
            'aktiviti' => 'Jadual 2 - 8(b)',
                'keterangan' => 'Perlombongan',
            ),
            90 => 
            array (
                'id' => 91,
            'aktiviti' => 'Jadual 2 - 9(a)',
                'keterangan' => 'Petroleum',
            ),
            91 => 
            array (
                'id' => 92,
            'aktiviti' => 'Jadual 2 - 9(b)',
                'keterangan' => 'Petroleum',
            ),
            92 => 
            array (
                'id' => 93,
            'aktiviti' => 'Jadual 2 - 9(c)',
                'keterangan' => 'Petroleum',
            ),
            93 => 
            array (
                'id' => 94,
            'aktiviti' => 'Jadual 2 - 10(a)',
                'keterangan' => 'Pelabuhan',
            ),
            94 => 
            array (
                'id' => 95,
            'aktiviti' => 'Jadual 2 - 10(b)',
                'keterangan' => 'Pelabuhan',
            ),
            95 => 
            array (
                'id' => 96,
            'aktiviti' => 'Jadual 2 - 11(a)',
                'keterangan' => 'Penjanaan dan Pemancaran Kuasa',
            ),
            96 => 
            array (
                'id' => 97,
            'aktiviti' => 'Jadual 2 - 11(b)',
                'keterangan' => 'Penjanaan dan Pemancaran Kuasa',
            ),
            97 => 
            array (
                'id' => 98,
            'aktiviti' => 'Jadual 2 - 12(a)',
                'keterangan' => 'Pembangunan di Kawasan Pantai, Taman Negara dan Taman Negeri',
            ),
            98 => 
            array (
                'id' => 99,
            'aktiviti' => 'Jadual 2 - 12(b)',
                'keterangan' => 'Pembangunan di Kawasan Pantai, Taman Negara dan Taman Negeri',
            ),
            99 => 
            array (
                'id' => 100,
            'aktiviti' => 'Jadual 2 - 13(a)',
                'keterangan' => 'Pembangunan di Kawasan Cerun',
            ),
            100 => 
            array (
                'id' => 101,
            'aktiviti' => 'Jadual 2 - 13(b)',
                'keterangan' => 'Pembangunan di Kawasan Cerun',
            ),
            101 => 
            array (
                'id' => 102,
            'aktiviti' => 'Jadual 2 - 14(a)(i)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            102 => 
            array (
                'id' => 103,
            'aktiviti' => 'Jadual 2 - 14(a)(ii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            103 => 
            array (
                'id' => 104,
            'aktiviti' => 'Jadual 2 - 14(a)(iii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            104 => 
            array (
                'id' => 105,
            'aktiviti' => 'Jadual 2 - 14(a)(iv)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            105 => 
            array (
                'id' => 106,
            'aktiviti' => 'Jadual 2 - 14(b)(i)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            106 => 
            array (
                'id' => 107,
            'aktiviti' => 'Jadual 2 - 14(b)(ii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            107 => 
            array (
                'id' => 108,
            'aktiviti' => 'Jadual 2 - 14(b)(iii)',
                'keterangan' => 'Pengolahan Dan Pelupusan Buangan',
            ),
            108 => 
            array (
                'id' => 109,
            'aktiviti' => 'Jadual 2 - 15(a)',
                'keterangan' => 'Pembinaan Empangan',
            ),
            109 => 
            array (
                'id' => 110,
            'aktiviti' => 'Jadual 2 - 15(b)(i)',
                'keterangan' => 'Pembinaan Empangan',
            ),
            110 => 
            array (
                'id' => 111,
            'aktiviti' => 'Jadual 2 - 15(b)(ii)',
                'keterangan' => 'Pembinaan Empangan',
            ),
            111 => 
            array (
                'id' => 112,
            'aktiviti' => 'Jadual 2 - 16(a)',
                'keterangan' => 'Pengangkutan',
            ),
            112 => 
            array (
                'id' => 113,
            'aktiviti' => 'Jadual 2 - 16(b)',
                'keterangan' => 'Pengangkutan',
            ),
            113 => 
            array (
                'id' => 114,
                'aktiviti' => 'Jadual 2 - 17',
                'keterangan' => 'Bahan Radioaktif dan Buangan Radioaktif',
            ),
        ));
        
        
    }
}