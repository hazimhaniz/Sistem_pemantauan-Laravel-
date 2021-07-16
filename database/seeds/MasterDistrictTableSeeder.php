<?php

use Illuminate\Database\Seeder;

class MasterDistrictTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_district')->delete();
        
        \DB::table('master_district')->insert(array (
            0 => 
            array (
                'id' => 5,
                'state_id' => '8',
                'district_id' => '801',
                'name' => 'KINTA',
                'created_at' => '2020-05-28 05:03:36',
            ),
            1 => 
            array (
                'id' => 6,
                'state_id' => '8',
                'district_id' => '802',
                'name' => 'KERIAN',
                'created_at' => '2020-05-28 05:03:36',
            ),
            2 => 
            array (
                'id' => 7,
                'state_id' => '8',
                'district_id' => '809',
                'name' => 'MANJUNG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            3 => 
            array (
                'id' => 8,
                'state_id' => '8',
                'district_id' => '803',
                'name' => 'KUALA KANGSAR',
                'created_at' => '2020-05-28 05:03:36',
            ),
            4 => 
            array (
                'id' => 9,
                'state_id' => '8',
                'district_id' => '804',
                'name' => 'LARUT,MATANG DAN SELAMA',
                'created_at' => '2020-05-28 05:03:36',
            ),
            5 => 
            array (
                'id' => 10,
                'state_id' => '8',
                'district_id' => '805',
                'name' => 'HILIR PERAK',
                'created_at' => '2020-05-28 05:03:36',
            ),
            6 => 
            array (
                'id' => 11,
                'state_id' => '10',
                'district_id' => '1003',
                'name' => 'KUALA LANGAT',
                'created_at' => '2020-05-28 05:03:36',
            ),
            7 => 
            array (
                'id' => 12,
                'state_id' => '8',
                'district_id' => '806',
                'name' => 'HULU PERAK',
                'created_at' => '2020-05-28 05:03:36',
            ),
            8 => 
            array (
                'id' => 13,
                'state_id' => '8',
                'district_id' => '807',
                'name' => 'PERAK TENGAH',
                'created_at' => '2020-05-28 05:03:36',
            ),
            9 => 
            array (
                'id' => 14,
                'state_id' => '8',
                'district_id' => '808',
                'name' => 'BATANG PADANG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            10 => 
            array (
                'id' => 15,
                'state_id' => '10',
                'district_id' => '1001',
                'name' => 'GOMBAK',
                'created_at' => '2020-05-28 05:03:36',
            ),
            11 => 
            array (
                'id' => 16,
                'state_id' => '10',
                'district_id' => '1002',
                'name' => 'KLANG ',
                'created_at' => '2020-05-28 05:03:36',
            ),
            12 => 
            array (
                'id' => 17,
                'state_id' => '10',
                'district_id' => '1005',
                'name' => 'PETALING',
                'created_at' => '2020-05-28 05:03:36',
            ),
            13 => 
            array (
                'id' => 18,
                'state_id' => '10',
                'district_id' => '1006',
                'name' => 'SABAK BERNAM',
                'created_at' => '2020-05-28 05:03:36',
            ),
            14 => 
            array (
                'id' => 19,
                'state_id' => '10',
                'district_id' => '1004',
                'name' => 'KUALA SELANGOR',
                'created_at' => '2020-05-28 05:03:36',
            ),
            15 => 
            array (
                'id' => 20,
                'state_id' => '10',
                'district_id' => '1007',
                'name' => 'SEPANG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            16 => 
            array (
                'id' => 21,
                'state_id' => '10',
                'district_id' => '1008',
                'name' => 'HULU LANGAT',
                'created_at' => '2020-05-28 05:03:36',
            ),
            17 => 
            array (
                'id' => 22,
                'state_id' => '10',
                'district_id' => '1009',
                'name' => 'HULU SELANGOR',
                'created_at' => '2020-05-28 05:03:36',
            ),
            18 => 
            array (
                'id' => 23,
                'state_id' => '6',
                'district_id' => '601',
                'name' => 'BENTONG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            19 => 
            array (
                'id' => 24,
                'state_id' => '6',
                'district_id' => '602',
                'name' => 'CAMERON HIGHLANDS',
                'created_at' => '2020-05-28 05:03:36',
            ),
            20 => 
            array (
                'id' => 25,
                'state_id' => '6',
                'district_id' => '603',
                'name' => 'JERANTUT',
                'created_at' => '2020-05-28 05:03:36',
            ),
            21 => 
            array (
                'id' => 26,
                'state_id' => '6',
                'district_id' => '604',
                'name' => 'KUANTAN',
                'created_at' => '2020-05-28 05:03:36',
            ),
            22 => 
            array (
                'id' => 27,
                'state_id' => '6',
                'district_id' => '605',
                'name' => 'LIPIS',
                'created_at' => '2020-05-28 05:03:36',
            ),
            23 => 
            array (
                'id' => 28,
                'state_id' => '6',
                'district_id' => '606',
                'name' => 'PEKAN',
                'created_at' => '2020-05-28 05:03:36',
            ),
            24 => 
            array (
                'id' => 29,
                'state_id' => '6',
                'district_id' => '607',
                'name' => 'RAUB',
                'created_at' => '2020-05-28 05:03:36',
            ),
            25 => 
            array (
                'id' => 30,
                'state_id' => '6',
                'district_id' => '608',
                'name' => 'TEMERLOH',
                'created_at' => '2020-05-28 05:03:36',
            ),
            26 => 
            array (
                'id' => 31,
                'state_id' => '6',
                'district_id' => '609',
                'name' => 'ROMPIN',
                'created_at' => '2020-05-28 05:03:36',
            ),
            27 => 
            array (
                'id' => 32,
                'state_id' => '6',
                'district_id' => '610',
                'name' => 'MARAN',
                'created_at' => '2020-05-28 05:03:36',
            ),
            28 => 
            array (
                'id' => 33,
                'state_id' => '3',
                'district_id' => '301',
                'name' => 'BACHOK',
                'created_at' => '2020-05-28 05:03:36',
            ),
            29 => 
            array (
                'id' => 34,
                'state_id' => '3',
                'district_id' => '302',
                'name' => 'KOTA BHARU',
                'created_at' => '2020-05-28 05:03:36',
            ),
            30 => 
            array (
                'id' => 35,
                'state_id' => '3',
                'district_id' => '303',
                'name' => 'MACHANG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            31 => 
            array (
                'id' => 36,
                'state_id' => '3',
                'district_id' => '304',
                'name' => 'PASIR MAS',
                'created_at' => '2020-05-28 05:03:36',
            ),
            32 => 
            array (
                'id' => 37,
                'state_id' => '3',
                'district_id' => '305',
                'name' => 'PASIR PUTEH',
                'created_at' => '2020-05-28 05:03:36',
            ),
            33 => 
            array (
                'id' => 38,
                'state_id' => '3',
                'district_id' => '306',
                'name' => 'TANAH MERAH',
                'created_at' => '2020-05-28 05:03:36',
            ),
            34 => 
            array (
                'id' => 39,
                'state_id' => '3',
                'district_id' => '307',
                'name' => 'TUMPAT',
                'created_at' => '2020-05-28 05:03:36',
            ),
            35 => 
            array (
                'id' => 40,
                'state_id' => '3',
                'district_id' => '308',
                'name' => 'JELI',
                'created_at' => '2020-05-28 05:03:36',
            ),
            36 => 
            array (
                'id' => 41,
                'state_id' => '3',
                'district_id' => '309',
                'name' => 'KUALA KRAI',
                'created_at' => '2020-05-28 05:03:36',
            ),
            37 => 
            array (
                'id' => 42,
                'state_id' => '3',
                'district_id' => '310',
                'name' => 'GUA MUSANG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            38 => 
            array (
                'id' => 43,
                'state_id' => '14',
                'district_id' => '1401',
                'name' => 'KUALA LUMPUR',
                'created_at' => '2020-05-28 05:03:36',
            ),
            39 => 
            array (
                'id' => 44,
                'state_id' => '12',
                'district_id' => '1201',
                'name' => 'KOTA KINABALU',
                'created_at' => '2020-05-28 05:03:36',
            ),
            40 => 
            array (
                'id' => 45,
                'state_id' => '12',
                'district_id' => '1202',
                'name' => 'KOTA BELUD',
                'created_at' => '2020-05-28 05:03:36',
            ),
            41 => 
            array (
                'id' => 46,
                'state_id' => '12',
                'district_id' => '1203',
                'name' => 'PENAMPANG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            42 => 
            array (
                'id' => 47,
                'state_id' => '12',
                'district_id' => '1204',
                'name' => 'PAPAR',
                'created_at' => '2020-05-28 05:03:36',
            ),
            43 => 
            array (
                'id' => 48,
                'state_id' => '12',
                'district_id' => '1205',
                'name' => 'RANAU',
                'created_at' => '2020-05-28 05:03:36',
            ),
            44 => 
            array (
                'id' => 49,
                'state_id' => '12',
                'district_id' => '1206',
                'name' => 'TUARAN',
                'created_at' => '2020-05-28 05:03:36',
            ),
            45 => 
            array (
                'id' => 50,
                'state_id' => '12',
                'district_id' => '1207',
                'name' => 'KUALA PENYU',
                'created_at' => '2020-05-28 05:03:36',
            ),
            46 => 
            array (
                'id' => 51,
                'state_id' => '12',
                'district_id' => '1209',
                'name' => 'BEAUFORT',
                'created_at' => '2020-05-28 05:03:36',
            ),
            47 => 
            array (
                'id' => 52,
                'state_id' => '12',
                'district_id' => '1210',
                'name' => 'TENOM',
                'created_at' => '2020-05-28 05:03:36',
            ),
            48 => 
            array (
                'id' => 53,
                'state_id' => '12',
                'district_id' => '1211',
                'name' => 'SIPITANG',
                'created_at' => '2020-05-28 05:03:36',
            ),
            49 => 
            array (
                'id' => 54,
                'state_id' => '12',
                'district_id' => '1213',
                'name' => 'KUDAT',
                'created_at' => '2020-05-28 05:03:36',
            ),
            50 => 
            array (
                'id' => 55,
                'state_id' => '12',
                'district_id' => '1214',
                'name' => 'KOTA MARUDU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            51 => 
            array (
                'id' => 56,
                'state_id' => '12',
                'district_id' => '1215',
                'name' => 'PITAS',
                'created_at' => '2020-05-28 05:03:37',
            ),
            52 => 
            array (
                'id' => 57,
                'state_id' => '12',
                'district_id' => '1216',
                'name' => 'KENINGAU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            53 => 
            array (
                'id' => 58,
                'state_id' => '12',
                'district_id' => '1218',
                'name' => 'TAMBUNAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            54 => 
            array (
                'id' => 59,
                'state_id' => '12',
                'district_id' => '1219',
                'name' => 'KINABATANGAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            55 => 
            array (
                'id' => 60,
                'state_id' => '12',
                'district_id' => '1221',
                'name' => 'SANDAKAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            56 => 
            array (
                'id' => 61,
                'state_id' => '12',
                'district_id' => '1222',
                'name' => 'KUNAK',
                'created_at' => '2020-05-28 05:03:37',
            ),
            57 => 
            array (
                'id' => 62,
                'state_id' => '12',
                'district_id' => '1223',
                'name' => 'LAHAD DATU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            58 => 
            array (
                'id' => 63,
                'state_id' => '12',
                'district_id' => '1224',
                'name' => 'SEMPORNA',
                'created_at' => '2020-05-28 05:03:37',
            ),
            59 => 
            array (
                'id' => 64,
                'state_id' => '12',
                'district_id' => '1225',
                'name' => 'TAWAU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            60 => 
            array (
                'id' => 65,
                'state_id' => '1',
                'district_id' => '102',
                'name' => 'JOHOR BAHRU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            61 => 
            array (
                'id' => 66,
                'state_id' => '1',
                'district_id' => '103',
                'name' => 'KLUANG',
                'created_at' => '2020-05-28 05:03:37',
            ),
            62 => 
            array (
                'id' => 67,
                'state_id' => '1',
                'district_id' => '104',
                'name' => 'KOTA TINGGI',
                'created_at' => '2020-05-28 05:03:37',
            ),
            63 => 
            array (
                'id' => 68,
                'state_id' => '1',
                'district_id' => '105',
                'name' => 'MERSING',
                'created_at' => '2020-05-28 05:03:37',
            ),
            64 => 
            array (
                'id' => 69,
                'state_id' => '1',
                'district_id' => '106',
                'name' => 'MUAR',
                'created_at' => '2020-05-28 05:03:37',
            ),
            65 => 
            array (
                'id' => 70,
                'state_id' => '1',
                'district_id' => '107',
                'name' => 'PONTIAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            66 => 
            array (
                'id' => 71,
                'state_id' => '1',
                'district_id' => '108',
                'name' => 'SEGAMAT',
                'created_at' => '2020-05-28 05:03:37',
            ),
            67 => 
            array (
                'id' => 72,
                'state_id' => '2',
                'district_id' => '201',
                'name' => 'BALING',
                'created_at' => '2020-05-28 05:03:37',
            ),
            68 => 
            array (
                'id' => 73,
                'state_id' => '2',
                'district_id' => '202',
                'name' => 'BANDAR BAHARU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            69 => 
            array (
                'id' => 74,
                'state_id' => '2',
                'district_id' => '203',
                'name' => 'KOTA SETAR',
                'created_at' => '2020-05-28 05:03:37',
            ),
            70 => 
            array (
                'id' => 75,
                'state_id' => '2',
                'district_id' => '204',
                'name' => 'KUALA MUDA',
                'created_at' => '2020-05-28 05:03:37',
            ),
            71 => 
            array (
                'id' => 76,
                'state_id' => '2',
                'district_id' => '205',
                'name' => 'KUBANG PASU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            72 => 
            array (
                'id' => 77,
                'state_id' => '2',
                'district_id' => '206',
                'name' => 'KULIM',
                'created_at' => '2020-05-28 05:03:37',
            ),
            73 => 
            array (
                'id' => 78,
                'state_id' => '2',
                'district_id' => '207',
                'name' => 'LANGKAWI',
                'created_at' => '2020-05-28 05:03:37',
            ),
            74 => 
            array (
                'id' => 79,
                'state_id' => '2',
                'district_id' => '208',
                'name' => 'PADANG TERAP',
                'created_at' => '2020-05-28 05:03:37',
            ),
            75 => 
            array (
                'id' => 80,
                'state_id' => '2',
                'district_id' => '209',
                'name' => 'SIK',
                'created_at' => '2020-05-28 05:03:37',
            ),
            76 => 
            array (
                'id' => 81,
                'state_id' => '2',
                'district_id' => '210',
                'name' => 'YAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            77 => 
            array (
                'id' => 82,
                'state_id' => '2',
                'district_id' => '211',
                'name' => 'PENDANG',
                'created_at' => '2020-05-28 05:03:37',
            ),
            78 => 
            array (
                'id' => 83,
                'state_id' => '4',
                'district_id' => '401',
                'name' => 'ALOR GAJAH',
                'created_at' => '2020-05-28 05:03:37',
            ),
            79 => 
            array (
                'id' => 84,
                'state_id' => '4',
                'district_id' => '402',
                'name' => 'MELAKA TENGAH',
                'created_at' => '2020-05-28 05:03:37',
            ),
            80 => 
            array (
                'id' => 85,
                'state_id' => '4',
                'district_id' => '403',
                'name' => 'JASIN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            81 => 
            array (
                'id' => 86,
                'state_id' => '5',
                'district_id' => '501',
                'name' => 'JELEBU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            82 => 
            array (
                'id' => 87,
                'state_id' => '5',
                'district_id' => '502',
                'name' => 'KUALA PILAH',
                'created_at' => '2020-05-28 05:03:37',
            ),
            83 => 
            array (
                'id' => 88,
                'state_id' => '5',
                'district_id' => '503',
                'name' => 'PORT DICKSON',
                'created_at' => '2020-05-28 05:03:37',
            ),
            84 => 
            array (
                'id' => 89,
                'state_id' => '5',
                'district_id' => '504',
                'name' => 'REMBAU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            85 => 
            array (
                'id' => 90,
                'state_id' => '5',
                'district_id' => '505',
                'name' => 'SEREMBAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            86 => 
            array (
                'id' => 91,
                'state_id' => '5',
                'district_id' => '506',
                'name' => 'TAMPIN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            87 => 
            array (
                'id' => 92,
                'state_id' => '5',
                'district_id' => '507',
                'name' => 'JEMPOL',
                'created_at' => '2020-05-28 05:03:37',
            ),
            88 => 
            array (
                'id' => 93,
                'state_id' => '7',
                'district_id' => '701',
                'name' => 'BARAT DAYA',
                'created_at' => '2020-05-28 05:03:37',
            ),
            89 => 
            array (
                'id' => 94,
                'state_id' => '7',
                'district_id' => '702',
                'name' => 'SEB PRAI TENGAH',
                'created_at' => '2020-05-28 05:03:37',
            ),
            90 => 
            array (
                'id' => 95,
                'state_id' => '7',
                'district_id' => '703',
                'name' => 'SEB PRAI UTARA',
                'created_at' => '2020-05-28 05:03:37',
            ),
            91 => 
            array (
                'id' => 96,
                'state_id' => '7',
                'district_id' => '704',
                'name' => 'SEB PRAI SELATAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            92 => 
            array (
                'id' => 97,
                'state_id' => '7',
                'district_id' => '705',
                'name' => 'TIMUR LAUT',
                'created_at' => '2020-05-28 05:03:37',
            ),
            93 => 
            array (
                'id' => 98,
                'state_id' => '9',
                'district_id' => '901',
                'name' => 'PERLIS',
                'created_at' => '2020-05-28 05:03:37',
            ),
            94 => 
            array (
                'id' => 99,
                'state_id' => '11',
                'district_id' => '1101',
                'name' => 'BESUT',
                'created_at' => '2020-05-28 05:03:37',
            ),
            95 => 
            array (
                'id' => 100,
                'state_id' => '11',
                'district_id' => '1102',
                'name' => 'DUNGUN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            96 => 
            array (
                'id' => 101,
                'state_id' => '11',
                'district_id' => '1103',
                'name' => 'KEMAMAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            97 => 
            array (
                'id' => 102,
                'state_id' => '11',
                'district_id' => '1104',
                'name' => 'KUALA TERENGGANU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            98 => 
            array (
                'id' => 103,
                'state_id' => '11',
                'district_id' => '1105',
                'name' => 'MARANG',
                'created_at' => '2020-05-28 05:03:37',
            ),
            99 => 
            array (
                'id' => 104,
                'state_id' => '11',
                'district_id' => '1106',
                'name' => 'HULU TERENGGANU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            100 => 
            array (
                'id' => 105,
                'state_id' => '11',
                'district_id' => '1107',
                'name' => 'SETIU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            101 => 
            array (
                'id' => 106,
                'state_id' => '13',
                'district_id' => '1301',
                'name' => 'BAU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            102 => 
            array (
                'id' => 107,
                'state_id' => '13',
                'district_id' => '1302',
                'name' => 'KUCHING',
                'created_at' => '2020-05-28 05:03:37',
            ),
            103 => 
            array (
                'id' => 108,
                'state_id' => '13',
                'district_id' => '1303',
                'name' => 'LUNDU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            104 => 
            array (
                'id' => 109,
                'state_id' => '13',
                'district_id' => '1304',
                'name' => 'SERIAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            105 => 
            array (
                'id' => 110,
                'state_id' => '13',
                'district_id' => '1305',
                'name' => 'SIMUNJAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            106 => 
            array (
                'id' => 111,
                'state_id' => '13',
                'district_id' => '1306',
                'name' => 'MUARA TUANG',
                'created_at' => '2020-05-28 05:03:37',
            ),
            107 => 
            array (
                'id' => 112,
                'state_id' => '13',
                'district_id' => '1307',
            'name' => 'SEBUYAU (SAMARAHAN)',
                'created_at' => '2020-05-28 05:03:37',
            ),
            108 => 
            array (
                'id' => 113,
                'state_id' => '13',
                'district_id' => '1308',
                'name' => 'ENGKILILI',
                'created_at' => '2020-05-28 05:03:37',
            ),
            109 => 
            array (
                'id' => 114,
                'state_id' => '13',
                'district_id' => '1309',
                'name' => 'LUBOK ANTU',
                'created_at' => '2020-05-28 05:03:37',
            ),
            110 => 
            array (
                'id' => 115,
                'state_id' => '13',
                'district_id' => '1310',
                'name' => 'KABONG',
                'created_at' => '2020-05-28 05:03:37',
            ),
            111 => 
            array (
                'id' => 116,
                'state_id' => '13',
                'district_id' => '1311',
                'name' => 'ROBAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            112 => 
            array (
                'id' => 117,
                'state_id' => '13',
                'district_id' => '1312',
                'name' => 'SARATOK',
                'created_at' => '2020-05-28 05:03:37',
            ),
            113 => 
            array (
                'id' => 118,
                'state_id' => '13',
                'district_id' => '1313',
                'name' => 'BETONG',
                'created_at' => '2020-05-28 05:03:37',
            ),
            114 => 
            array (
                'id' => 119,
                'state_id' => '13',
                'district_id' => '1314',
                'name' => 'DEBAK',
                'created_at' => '2020-05-28 05:03:37',
            ),
            115 => 
            array (
                'id' => 120,
                'state_id' => '13',
                'district_id' => '1315',
                'name' => 'PUSA',
                'created_at' => '2020-05-28 05:03:37',
            ),
            116 => 
            array (
                'id' => 121,
                'state_id' => '13',
                'district_id' => '1316',
                'name' => 'SPAOH',
                'created_at' => '2020-05-28 05:03:37',
            ),
            117 => 
            array (
                'id' => 122,
                'state_id' => '13',
                'district_id' => '1317',
                'name' => 'LINGGA',
                'created_at' => '2020-05-28 05:03:37',
            ),
            118 => 
            array (
                'id' => 123,
                'state_id' => '13',
                'district_id' => '1318',
            'name' => 'SEBUYAU (SRI AMAN)',
                'created_at' => '2020-05-28 05:03:37',
            ),
            119 => 
            array (
                'id' => 124,
                'state_id' => '13',
                'district_id' => '1319',
                'name' => 'SRI AMAN',
                'created_at' => '2020-05-28 05:03:37',
            ),
            120 => 
            array (
                'id' => 125,
                'state_id' => '13',
                'district_id' => '1320',
                'name' => 'BINTANGOR',
                'created_at' => '2020-05-28 05:03:38',
            ),
            121 => 
            array (
                'id' => 126,
                'state_id' => '13',
                'district_id' => '1321',
                'name' => 'DARO',
                'created_at' => '2020-05-28 05:03:38',
            ),
            122 => 
            array (
                'id' => 127,
                'state_id' => '13',
                'district_id' => '1322',
                'name' => 'JULAU',
                'created_at' => '2020-05-28 05:03:38',
            ),
            123 => 
            array (
                'id' => 128,
                'state_id' => '13',
                'district_id' => '1323',
                'name' => 'MATU',
                'created_at' => '2020-05-28 05:03:38',
            ),
            124 => 
            array (
                'id' => 129,
                'state_id' => '13',
                'district_id' => '1324',
                'name' => 'SARIKEI',
                'created_at' => '2020-05-28 05:03:38',
            ),
            125 => 
            array (
                'id' => 130,
                'state_id' => '13',
                'district_id' => '1325',
                'name' => 'BELAGA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            126 => 
            array (
                'id' => 131,
                'state_id' => '13',
                'district_id' => '1326',
                'name' => 'KAPIT',
                'created_at' => '2020-05-28 05:03:38',
            ),
            127 => 
            array (
                'id' => 132,
                'state_id' => '13',
                'district_id' => '1327',
                'name' => 'SONG',
                'created_at' => '2020-05-28 05:03:38',
            ),
            128 => 
            array (
                'id' => 133,
                'state_id' => '13',
                'district_id' => '1328',
                'name' => 'BALINGIAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            129 => 
            array (
                'id' => 134,
                'state_id' => '13',
                'district_id' => '1329',
                'name' => 'DALAT',
                'created_at' => '2020-05-28 05:03:38',
            ),
            130 => 
            array (
                'id' => 135,
                'state_id' => '13',
                'district_id' => '1330',
                'name' => 'KANOWIT',
                'created_at' => '2020-05-28 05:03:38',
            ),
            131 => 
            array (
                'id' => 136,
                'state_id' => '13',
                'district_id' => '1331',
                'name' => 'MUKAH',
                'created_at' => '2020-05-28 05:03:38',
            ),
            132 => 
            array (
                'id' => 137,
                'state_id' => '13',
                'district_id' => '1332',
                'name' => 'OYA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            133 => 
            array (
                'id' => 138,
                'state_id' => '13',
                'district_id' => '1333',
                'name' => 'SIBU',
                'created_at' => '2020-05-28 05:03:38',
            ),
            134 => 
            array (
                'id' => 139,
                'state_id' => '13',
                'district_id' => '1334',
                'name' => 'BINTULU',
                'created_at' => '2020-05-28 05:03:38',
            ),
            135 => 
            array (
                'id' => 140,
                'state_id' => '13',
                'district_id' => '1335',
                'name' => 'SEBAUH',
                'created_at' => '2020-05-28 05:03:38',
            ),
            136 => 
            array (
                'id' => 141,
                'state_id' => '13',
                'district_id' => '1336',
                'name' => 'TATAU',
                'created_at' => '2020-05-28 05:03:38',
            ),
            137 => 
            array (
                'id' => 142,
                'state_id' => '13',
                'district_id' => '1337',
                'name' => 'BARAM',
                'created_at' => '2020-05-28 05:03:38',
            ),
            138 => 
            array (
                'id' => 143,
                'state_id' => '13',
                'district_id' => '1338',
                'name' => 'MIRI',
                'created_at' => '2020-05-28 05:03:38',
            ),
            139 => 
            array (
                'id' => 144,
                'state_id' => '13',
                'district_id' => '1339',
                'name' => 'NIAH',
                'created_at' => '2020-05-28 05:03:38',
            ),
            140 => 
            array (
                'id' => 145,
                'state_id' => '13',
                'district_id' => '1340',
                'name' => 'SIBUTI',
                'created_at' => '2020-05-28 05:03:38',
            ),
            141 => 
            array (
                'id' => 146,
                'state_id' => '13',
                'district_id' => '1341',
                'name' => 'SUAI',
                'created_at' => '2020-05-28 05:03:38',
            ),
            142 => 
            array (
                'id' => 147,
                'state_id' => '13',
                'district_id' => '1342',
                'name' => 'LAWAS',
                'created_at' => '2020-05-28 05:03:38',
            ),
            143 => 
            array (
                'id' => 148,
                'state_id' => '13',
                'district_id' => '1343',
                'name' => 'LIMBANG',
                'created_at' => '2020-05-28 05:03:38',
            ),
            144 => 
            array (
                'id' => 149,
                'state_id' => '6',
                'district_id' => '611',
                'name' => 'BERA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            145 => 
            array (
                'id' => 150,
                'state_id' => '15',
                'district_id' => '1501',
                'name' => 'LABUAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            146 => 
            array (
                'id' => 151,
                'state_id' => '1',
                'district_id' => '101',
                'name' => 'BATU PAHAT',
                'created_at' => '2020-05-28 05:03:38',
            ),
            147 => 
            array (
                'id' => 152,
                'state_id' => '12',
                'district_id' => '1226',
                'name' => 'MENGGATAL',
                'created_at' => '2020-05-28 05:03:38',
            ),
            148 => 
            array (
                'id' => 153,
                'state_id' => '16',
                'district_id' => '1601',
                'name' => 'PUTRAJAYA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            149 => 
            array (
                'id' => 154,
                'state_id' => '13',
                'district_id' => '1346',
                'name' => 'KOTA SAMARAHAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            150 => 
            array (
                'id' => 155,
                'state_id' => '1',
                'district_id' => '110',
                'name' => 'LEDANG',
                'created_at' => '2020-05-28 05:03:38',
            ),
            151 => 
            array (
                'id' => 156,
                'state_id' => '2',
                'district_id' => '212',
                'name' => 'POKOK SENA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            152 => 
            array (
                'id' => 157,
                'state_id' => '1',
                'district_id' => '109',
                'name' => 'KULAIJAYA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            153 => 
            array (
                'id' => 158,
                'state_id' => '6',
                'district_id' => '612',
                'name' => 'KUANTAN TENGAH',
                'created_at' => '2020-05-28 05:03:38',
            ),
            154 => 
            array (
                'id' => 159,
                'state_id' => '6',
                'district_id' => '613',
                'name' => 'KUANTAN UTARA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            155 => 
            array (
                'id' => 160,
                'state_id' => '12',
                'district_id' => '1227',
                'name' => 'NABAWAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            156 => 
            array (
                'id' => 161,
                'state_id' => '12',
                'district_id' => '1228',
                'name' => 'BELURAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            157 => 
            array (
                'id' => 162,
                'state_id' => '12',
                'district_id' => '1229',
                'name' => 'TONGOD',
                'created_at' => '2020-05-28 05:03:38',
            ),
            158 => 
            array (
                'id' => 163,
                'state_id' => '12',
                'district_id' => '1230',
                'name' => 'PUTATAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            159 => 
            array (
                'id' => 164,
                'state_id' => '6',
                'district_id' => '614',
                'name' => 'KUANTAN SELATAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            160 => 
            array (
                'id' => 165,
                'state_id' => '13',
                'district_id' => '1344',
                'name' => 'SIBURAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            161 => 
            array (
                'id' => 166,
                'state_id' => '13',
                'district_id' => '1345',
                'name' => 'PADAWAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            162 => 
            array (
                'id' => 167,
                'state_id' => '12',
                'district_id' => '1231',
                'name' => 'LABUK & SUGUT',
                'created_at' => '2020-05-28 05:03:38',
            ),
            163 => 
            array (
                'id' => 168,
                'state_id' => '12',
                'district_id' => '1232',
                'name' => 'PENSIANGAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            164 => 
            array (
                'id' => 169,
                'state_id' => '13',
                'district_id' => '1347',
                'name' => 'ASAJAYA',
                'created_at' => '2020-05-28 05:03:38',
            ),
            165 => 
            array (
                'id' => 170,
                'state_id' => '13',
                'district_id' => '1348',
                'name' => 'MARADONG',
                'created_at' => '2020-05-28 05:03:38',
            ),
            166 => 
            array (
                'id' => 171,
                'state_id' => '13',
                'district_id' => '1349',
                'name' => 'MARUDI',
                'created_at' => '2020-05-28 05:03:38',
            ),
            167 => 
            array (
                'id' => 172,
                'state_id' => '13',
                'district_id' => '1350',
                'name' => 'PAKAN',
                'created_at' => '2020-05-28 05:03:38',
            ),
            168 => 
            array (
                'id' => 173,
                'state_id' => '13',
                'district_id' => '1351',
                'name' => 'SELANGAU',
                'created_at' => '2020-05-28 05:03:38',
            ),
            169 => 
            array (
                'id' => 174,
                'state_id' => 'SG',
                'district_id' => 'SG01',
                'name' => 'JURONG
',
                'created_at' => '2020-05-28 05:05:47',
            ),
        ));
        
        
    }
}