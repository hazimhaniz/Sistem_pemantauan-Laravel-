<?php

use Illuminate\Database\Seeder;

class MasterCityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_city')->delete();
        
        \DB::table('master_city')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F01',
                'name' => 'KUALA LUMPUR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A01',
                'name' => 'AYER TAWAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A02',
                'name' => 'BAGAN DATOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A03',
                'name' => 'BAGAN SERAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A04',
                'name' => 'BATU GAJAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A05',
                'name' => 'BATU KURAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A06',
                'name' => 'BERUAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A07',
                'name' => 'BIDOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A09',
                'name' => 'CHANGKAT KERUING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A10',
                'name' => 'CHEMOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A11',
                'name' => 'CHENDERIANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A12',
                'name' => 'CHENDERONG BALAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A13',
                'name' => 'ENGGOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A14',
                'name' => 'GERIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A15',
                'name' => 'GOPENG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A16',
                'name' => 'HUTAN MELINTANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A17',
                'name' => 'INTAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A18',
                'name' => 'IPOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A19',
                'name' => 'KAMPAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A20',
                'name' => 'KAMPUNG GAJAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A21',
                'name' => 'KAMPUNG KEPAYANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A22',
                'name' => 'KAMUNTING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A23',
                'name' => 'KUALA KANGSAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A24',
                'name' => 'KUALA SEPETANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A25',
                'name' => 'LAHAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A26',
                'name' => 'LANGKAP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A27',
                'name' => 'LENGGONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A28',
                'name' => 'LUMUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A29',
                'name' => 'MALIM NAWAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A30',
                'name' => 'MAMBANG DI AWAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A31',
                'name' => 'MANONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A32',
                'name' => 'MATANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A33',
                'name' => 'MENGLEMBU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A34',
                'name' => 'PADANG RENGAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A35',
                'name' => 'PANGKOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A37',
                'name' => 'PARIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A40',
                'name' => 'PUSING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A43',
                'name' => 'SELEKOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A46',
                'name' => 'SITIAWAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A48',
            'name' => 'SUNGAI SIPUT(A)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A51',
                'name' => 'TAIPING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A54',
                'name' => 'TANJUNG RAMBUTAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A57',
                'name' => 'TRONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A60',
                'name' => 'ULU KINTA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A63',
                'name' => 'PENGKALAN TLDM LUMUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A66',
                'name' => 'TELUK INTAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'kod_negeri' => '10',
                'kod_daerah' => '1003',
                'kod_bandar' => 'B02',
                'name' => 'BANTING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B05',
                'name' => 'BATU 9 CHERAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B08',
                'name' => 'BERANANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'kod_negeri' => '10',
                'kod_daerah' => '1007',
                'kod_bandar' => 'B10',
                'name' => 'DENGKIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'kod_negeri' => '10',
                'kod_daerah' => '1004',
                'kod_bandar' => 'B13',
                'name' => 'JERAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'kod_negeri' => '10',
                'kod_daerah' => '1009',
                'kod_bandar' => 'B18',
                'name' => 'KUALA KUBU BAHARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B22',
                'name' => 'PELABUHAN KELANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B25',
            'name' => 'RANTAU PANJANG(S)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'kod_negeri' => '10',
                'kod_daerah' => '1006',
                'kod_bandar' => 'B29',
                'name' => 'SEKINCHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'kod_negeri' => '10',
                'kod_daerah' => '1009',
                'kod_bandar' => 'B32',
                'name' => 'SERENDAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'kod_negeri' => '10',
                'kod_daerah' => '1006',
                'kod_bandar' => 'B35',
                'name' => 'SUNGAI AYER TAWAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'kod_negeri' => '10',
                'kod_daerah' => '1007',
                'kod_bandar' => 'B38',
                'name' => 'SUNGAI PELEK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'kod_negeri' => '10',
                'kod_daerah' => '1003',
                'kod_bandar' => 'B40',
                'name' => 'TANJONG SEPAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B42',
                'name' => 'UKM BANGI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'kod_negeri' => '10',
                'kod_daerah' => '1003',
                'kod_bandar' => 'B45',
                'name' => 'PULAU CAREY',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C01',
                'name' => 'BANDAR PUSAT JENGKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C05',
                'name' => 'BUKIT FRASER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C09',
                'name' => 'GENTING HIGHLANDS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C12',
                'name' => 'KEMAYAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C15',
                'name' => 'KUALA ROMPIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C19',
                'name' => 'MARAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C21',
                'name' => 'MENTAKAB',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C26',
                'name' => 'RINGLET',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C30',
                'name' => 'TEMERLOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C33',
                'name' => 'MUADZAM SHAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'kod_negeri' => '03',
                'kod_daerah' => '0308',
                'kod_bandar' => 'D01',
                'name' => 'AYER LANAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'kod_negeri' => '03',
                'kod_daerah' => '0309',
                'kod_bandar' => 'D04',
                'name' => 'DABONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'kod_negeri' => '03',
                'kod_daerah' => '0302',
                'kod_bandar' => 'D07',
                'name' => 'KEM DESA PAHLAWAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'kod_negeri' => '03',
                'kod_daerah' => '0309',
                'kod_bandar' => 'D10',
                'name' => 'KUALA KRAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'kod_negeri' => '03',
                'kod_daerah' => '0305',
                'kod_bandar' => 'D14',
                'name' => 'PASIR PUTEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'kod_negeri' => '03',
                'kod_daerah' => '0306',
                'kod_bandar' => 'D18',
                'name' => 'TANAH MERAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'kod_negeri' => '03',
                'kod_daerah' => '0307',
                'kod_bandar' => 'D20',
                'name' => 'TUMPAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H01',
                'name' => 'BEAUFORT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H05',
                'name' => 'KENINGAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H08',
                'name' => 'KOTA MARUDU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H11',
                'name' => 'KUNAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H14',
                'name' => 'LIKAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H18',
                'name' => 'PAPAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'kod_negeri' => '12',
                'kod_daerah' => '1221',
                'kod_bandar' => 'H21',
                'name' => 'SANDAKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H24',
                'name' => 'TAMBUNAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H27',
                'name' => 'TAWAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J02',
                'name' => 'AYER HITAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J05',
                'name' => 'BATU PAHAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J09',
                'name' => 'BUKIT PASIR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J14',
            'name' => 'GEMAS(J)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J16',
                'name' => 'GUGUSAN TAIB ANDAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J20',
                'name' => 'KLUANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J23',
                'name' => 'KULAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J26',
                'name' => 'LAYANG-LAYANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J31',
                'name' => 'PAGOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J34',
                'name' => 'PARIT RAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J37',
                'name' => 'PENGERANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J40',
                'name' => 'RENGIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J43',
                'name' => 'SEMERAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J46',
                'name' => 'SUNGAI MATI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J49',
                'name' => 'SENGGARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K01',
                'name' => 'ALOR SETAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K05',
                'name' => 'GURUN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K08',
            'name' => 'KEPALA BATAS(K)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K11',
                'name' => 'KUALA KEDAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K14',
                'name' => 'KULIM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K17',
                'name' => 'LANGKAWI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K21',
                'name' => 'PENDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K24',
                'name' => 'SIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K27',
                'name' => 'KOTA SARANG SEMUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M04',
                'name' => 'BEMBAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M06',
            'name' => 'GEMAS(M)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M09',
            'name' => 'LUBOK CHINA(M)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M11',
                'name' => 'MELAKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M14',
                'name' => 'SUNGAI UDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N02',
                'name' => 'BAHAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N06',
            'name' => 'GEMAS(N)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N09',
                'name' => 'KOTA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N12',
                'name' => 'LABU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N15',
            'name' => 'LUBOK CHINA(N)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N19',
                'name' => 'PEDAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N21',
                'name' => 'REMBAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N25',
                'name' => 'SILIAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N27',
                'name' => 'SI RUSA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N29',
                'name' => 'TAMPIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N33',
                'name' => 'SIMPANG DURIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P03',
                'name' => 'BATU FERINGGHI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P06',
                'name' => 'BUTTERWORTH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P09',
            'name' => 'KEPALA BATAS(P)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P10',
                'name' => 'NIBONG TEBAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P11',
                'name' => 'PENAGA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P12',
                'name' => 'PENANG HILL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P13',
                'name' => 'PERAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P14',
                'name' => 'PERMATANG PAUH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P15',
            'name' => 'SIMPANG AMPAT(P)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P16',
                'name' => 'SUNGAI JAWI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P17',
                'name' => 'TANJONG BUNGAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P18',
                'name' => 'TASEK GELUGOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P19',
                'name' => 'USM PULAU PINANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P20',
                'name' => 'BAYAN BARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P21',
                'name' => 'KUBANG SEMAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'kod_negeri' => '09',
                'kod_daerah' => NULL,
                'kod_bandar' => 'R01',
                'name' => 'ARAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'kod_negeri' => '09',
                'kod_daerah' => NULL,
                'kod_bandar' => 'R02',
                'name' => 'KAKI BUKIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'kod_negeri' => '09',
                'kod_daerah' => NULL,
                'kod_bandar' => 'R03',
                'name' => 'KANGAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'kod_negeri' => '09',
                'kod_daerah' => NULL,
                'kod_bandar' => 'R04',
                'name' => 'KUALA PERLIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'kod_negeri' => '09',
                'kod_daerah' => NULL,
                'kod_bandar' => 'R05',
                'name' => 'PADANG BESAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'kod_negeri' => '09',
                'kod_daerah' => '0901',
                'kod_bandar' => 'R06',
            'name' => 'SIMPANG EMPAT(R)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T01',
                'name' => 'AJIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T02',
                'name' => 'KAMPUNG RAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T03',
                'name' => 'BUKIT BESI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T04',
                'name' => 'DUNGUN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T05',
                'name' => 'JERTEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T06',
                'name' => 'KAMPONG BULUH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T07',
                'name' => 'CHUKAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T08',
                'name' => 'KEMASIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T09',
                'name' => 'KIJAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T10',
                'name' => 'KUALA BERANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T11',
                'name' => 'KUALA BESUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T12',
                'name' => 'KUALA TERENGGANU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T13',
                'name' => 'MARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T14',
                'name' => 'PAKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T15',
                'name' => 'PERMAISURI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T16',
                'name' => 'AL MUKTAFI BILLAH SHAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T17',
                'name' => 'KERTEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W01',
                'name' => 'ASAJAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W02',
                'name' => 'BALINGIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W03',
                'name' => 'BARAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W07',
                'name' => 'BELAWAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W11',
                'name' => 'DALAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W15',
                'name' => 'JULAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W18',
                'name' => 'KAPIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W21',
                'name' => 'LAWAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W25',
                'name' => 'LUNDU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W28',
                'name' => 'MATU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W32',
                'name' => 'NIAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W35',
                'name' => 'SARATOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W39',
                'name' => 'SRI AMAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W42',
                'name' => 'SONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W47',
                'name' => 'BINATANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'kod_negeri' => 'SG',
                'kod_daerah' => NULL,
                'kod_bandar' => 'E01',
                'name' => 'JURONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C35',
                'name' => 'TANJUNG GELANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F05',
                'name' => 'SETAPAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K28',
                'name' => 'PULAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H31',
                'name' => 'TELUPID',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K29',
                'name' => 'PADANG MATSIRAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P23',
                'name' => 'SEBERANG JAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M18',
                'name' => 'BUKIT RAMBAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M21',
                'name' => 'BUKIT BARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M25',
                'name' => 'TANGGA BATU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T19',
                'name' => 'SETIU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N37',
                'name' => 'BANDAR BARU SERTING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M27',
                'name' => 'PAYA RUMPUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J54',
                'name' => 'SERI GADING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A72',
                'name' => 'BUKIT GANTANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A73',
                'name' => 'SALAK UTARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M28',
                'name' => 'SEMABUK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'kod_negeri' => '16',
                'kod_daerah' => NULL,
                'kod_bandar' => 'Z01',
                'name' => 'PUTRAJAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'D',
                'name' => 'SG. ANTU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F11',
                'name' => 'SALAK SELATAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'R',
                'name' => 'SIBURAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'kod_negeri' => '03',
                'kod_daerah' => '0302',
                'kod_bandar' => 'D22',
                'name' => 'KUBANG KERIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F16',
                'name' => 'DESA TUN RAZAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F19',
                'name' => 'DAMANSARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F22',
                'name' => 'SRI PETALING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F24',
                'name' => 'DESA PETALING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A36',
                'name' => 'PANTAI REMIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'kod_negeri' => '10',
                'kod_daerah' => '1003',
                'kod_bandar' => 'B41',
                'name' => 'TELOK PANGLIMA GARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A38',
                'name' => 'PARIT BUNTAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A39',
                'name' => 'PENGKALAN HULU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A41',
                'name' => 'SAUK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A42',
                'name' => 'SELAMA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A44',
                'name' => 'SIMPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A45',
                'name' => 'SIMPANG AMPAT SEMANGGOL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A47',
                'name' => 'SLIM RIVER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A49',
                'name' => 'SUNGAI SUMUN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A50',
                'name' => 'SUNGKAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A52',
                'name' => 'TANJUNG TUALANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A53',
                'name' => 'TANJONG MALIM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A55',
                'name' => 'TAPAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A56',
                'name' => 'TAPAH ROAD',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A58',
                'name' => 'TROLAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A59',
                'name' => 'ULU BERNAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A61',
                'name' => 'BRINCHANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A62',
                'name' => 'KUALA KURAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A64',
                'name' => 'TEMOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A65',
                'name' => 'TANJUNG PIANDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A67',
                'name' => 'TRONOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'kod_negeri' => '10',
                'kod_daerah' => '1001',
                'kod_bandar' => 'B01',
                'name' => 'AMPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'kod_negeri' => '10',
                'kod_daerah' => '1004',
                'kod_bandar' => 'B03',
                'name' => 'BATANG BERJUNTAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'kod_negeri' => '10',
                'kod_daerah' => '1009',
                'kod_bandar' => 'B04',
                'name' => 'BATANG KALI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'kod_negeri' => '10',
                'kod_daerah' => '1001',
                'kod_bandar' => 'B06',
                'name' => 'BATU ARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'kod_negeri' => '10',
                'kod_daerah' => '1001',
                'kod_bandar' => 'B07',
                'name' => 'BATU CAVES',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'kod_negeri' => '10',
                'kod_daerah' => '1004',
                'kod_bandar' => 'B09',
                'name' => 'BUKIT ROTAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B11',
                'name' => 'HULU LANGAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'kod_negeri' => '10',
                'kod_daerah' => '1003',
                'kod_bandar' => 'B12',
                'name' => 'JENJAROM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B14',
                'name' => 'KAJANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B15',
                'name' => 'KAPAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B16',
                'name' => 'KLANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'kod_negeri' => '10',
                'kod_daerah' => '1009',
                'kod_bandar' => 'B17',
                'name' => 'KERLING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'kod_negeri' => '10',
                'kod_daerah' => '1004',
                'kod_bandar' => 'B19',
                'name' => 'KUALA SELANGOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B23',
                'name' => 'PETALING JAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B24',
                'name' => 'PUCHONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'kod_negeri' => '10',
                'kod_daerah' => '1009',
                'kod_bandar' => 'B26',
                'name' => 'RASA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'kod_negeri' => '10',
                'kod_daerah' => '1009',
                'kod_bandar' => 'B27',
                'name' => 'RAWANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'kod_negeri' => '10',
                'kod_daerah' => '1006',
                'kod_bandar' => 'B28',
                'name' => 'SABAK BERNAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B30',
                'name' => 'SEMENYIH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'kod_negeri' => '10',
                'kod_daerah' => '1007',
                'kod_bandar' => 'B31',
                'name' => 'SEPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B33',
                'name' => 'SERI KEMBANGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B34',
                'name' => 'SHAH ALAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'kod_negeri' => '10',
                'kod_daerah' => '1006',
                'kod_bandar' => 'B36',
                'name' => 'SUNGAI BESAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B37',
                'name' => 'SUNGAI BULOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'kod_negeri' => '10',
                'kod_daerah' => '1004',
                'kod_bandar' => 'B39',
                'name' => 'TANJUNG KARANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B43',
                'name' => 'UPM SERDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B44',
                'name' => 'SUBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B46',
                'name' => 'PULAU KETAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B47',
                'name' => 'PULAU LUMUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C03',
                'name' => 'BENTA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C04',
                'name' => 'BENTONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C06',
                'name' => 'CHENOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C07',
                'name' => 'DONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C08',
                'name' => 'GAMBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C10',
                'name' => 'JERANTUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C11',
                'name' => 'KUANTAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C13',
                'name' => 'KUALA KRAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C14',
                'name' => 'KUALA LIPIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C17',
                'name' => 'LANCHANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C16',
                'name' => 'KARAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C18',
                'name' => 'LURAH BILUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C20',
                'name' => 'MENGKARAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C23',
                'name' => 'PEKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C24',
                'name' => 'PADANG TENGKU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C25',
                'name' => 'RAUB',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C28',
                'name' => 'SUNGAI LEMBING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C29',
                'name' => 'SUNGAI RUAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C31',
                'name' => 'TRIANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C32',
                'name' => 'TANAH RATA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C34',
                'name' => 'BANDAR TUN ABDUL RAZAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'kod_negeri' => '03',
                'kod_daerah' => '0301',
                'kod_bandar' => 'D02',
                'name' => 'BACHOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'kod_negeri' => '03',
                'kod_daerah' => '0305',
                'kod_bandar' => 'D03',
                'name' => 'CHERANG RUKU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'kod_negeri' => '03',
                'kod_daerah' => '0310',
                'kod_bandar' => 'D05',
                'name' => 'GUA MUSANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'kod_negeri' => '03',
                'kod_daerah' => '0308',
                'kod_bandar' => 'D06',
                'name' => 'JELI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'kod_negeri' => '03',
                'kod_daerah' => '0302',
                'kod_bandar' => 'D08',
                'name' => 'KETEREH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'kod_negeri' => '03',
                'kod_daerah' => '0302',
                'kod_bandar' => 'D09',
                'name' => 'KOTA BHARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'kod_negeri' => '03',
                'kod_daerah' => '0303',
                'kod_bandar' => 'D11',
                'name' => 'MACHANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'kod_negeri' => '03',
                'kod_daerah' => '0302',
                'kod_bandar' => 'D12',
                'name' => 'MELOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'kod_negeri' => '03',
                'kod_daerah' => '0304',
                'kod_bandar' => 'D13',
                'name' => 'PASIR MAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'kod_negeri' => '03',
                'kod_daerah' => '0303',
                'kod_bandar' => 'D15',
                'name' => 'PULAI CHONDONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'kod_negeri' => '03',
                'kod_daerah' => '0304',
                'kod_bandar' => 'D16',
                'name' => 'RANTAU PANJANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'kod_negeri' => '03',
                'kod_daerah' => '0303',
                'kod_bandar' => 'D19',
                'name' => 'TEMANGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'kod_negeri' => '03',
                'kod_daerah' => '0307',
                'kod_bandar' => 'D21',
                'name' => 'WAKAF BARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'kod_negeri' => '15',
                'kod_daerah' => NULL,
                'kod_bandar' => 'G01',
                'name' => 'LABUAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H02',
                'name' => 'BELURAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H03',
                'name' => 'BONGAWAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H04',
                'name' => 'INANAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H06',
                'name' => 'KOTA BELUD',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H07',
                'name' => 'KOTA KINABALU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H09',
                'name' => 'KUALA PENYU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H10',
                'name' => 'KUDAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H12',
                'name' => 'LAHAD DATU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H13',
                'name' => 'LAMAG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H15',
                'name' => 'MEMBAKUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H16',
                'name' => 'MENUMBOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H17',
                'name' => 'NABAWAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H19',
                'name' => 'PENAMPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H20',
                'name' => 'RANAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H22',
                'name' => 'SEMPORNA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H23',
                'name' => 'SIPITANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H25',
                'name' => 'TAMPARULI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H26',
                'name' => 'TANJUNG ARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H28',
                'name' => 'TENOM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H29',
                'name' => 'TUARAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J01',
                'name' => 'AYER BALOI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J03',
                'name' => 'BAKRI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J04',
                'name' => 'BATU ANAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J06',
                'name' => 'BEKOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J07',
                'name' => 'BENUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J08',
                'name' => 'BUKIT GAMBIR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J11',
                'name' => 'CHAAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J12',
                'name' => 'ENDAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J13',
                'name' => 'GELANG PATAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J15',
                'name' => 'GERISIK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J17',
                'name' => 'JEMENTAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J18',
                'name' => 'JOHOR BAHRU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J19',
                'name' => 'KAHANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J21',
                'name' => 'KG. KENANGAN T. DR. ISMAIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J24',
                'name' => 'KUKUP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J25',
                'name' => 'LABIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J27',
                'name' => 'MASAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J28',
                'name' => 'MERSING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J29',
                'name' => 'MUAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J30',
                'name' => 'PALOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J32',
                'name' => 'PANCHOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J33',
                'name' => 'PARIT JAWA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J35',
                'name' => 'PARIT SULONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J36',
                'name' => 'PASIR GUDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J38',
                'name' => 'PEKAN NANAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J39',
                'name' => 'PONTIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J41',
                'name' => 'SEGAMAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J42',
                'name' => 'SEKUDAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J44',
                'name' => 'SENAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J45',
                'name' => 'SIMPANG RENGGAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K02',
                'name' => 'BALING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J47',
                'name' => 'TANGKAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J48',
                'name' => 'RENGGAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J50',
                'name' => 'ULU TIRAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J51',
                'name' => 'YONG PENG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K03',
                'name' => 'BANDAR BAHARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K04',
                'name' => 'BEDONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K06',
                'name' => 'JITRA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K07',
                'name' => 'KARANGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K09',
                'name' => 'KODIANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K10',
                'name' => 'KOTA KUALA MUDA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K12',
                'name' => 'KUALA KETIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K13',
                'name' => 'KUALA NERANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K15',
                'name' => 'KUPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K16',
                'name' => 'LANGGAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K18',
                'name' => 'LUNAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K19',
                'name' => 'MERBOK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K20',
                'name' => 'PADANG SERAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 361,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K22',
                'name' => 'POKOK SENA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 362,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K23',
                'name' => 'SERDANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 363,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K25',
                'name' => 'SUNGAI PETANI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 364,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K26',
                'name' => 'YAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 365,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M01',
                'name' => 'ASAHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 366,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M02',
                'name' => 'ALOR GAJAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 367,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M03',
                'name' => 'BATANG MELAKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 368,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M05',
                'name' => 'DURIAN TUNGGAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 369,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M07',
                'name' => 'JASIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 370,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M08',
                'name' => 'KUALA SUNGAI BARU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 371,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M10',
                'name' => 'MASJID TANAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 372,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M12',
                'name' => 'MERLIMAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 373,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M13',
                'name' => 'SUNGAI RAMBAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 374,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M15',
                'name' => 'TANJONG KELING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 375,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N01',
                'name' => 'ASAHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 376,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N03',
                'name' => 'BATANG MELAKA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 377,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N04',
                'name' => 'BATU KIKIR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 378,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N07',
                'name' => 'GEMENCHEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 379,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N08',
                'name' => 'JOHOL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 380,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N10',
                'name' => 'KUALA KLAWANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 381,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N11',
                'name' => 'KUALA PILAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 382,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N13',
                'name' => 'LENGGENG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 383,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N14',
                'name' => 'LINGGI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 384,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N16',
                'name' => 'AMPANGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 385,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N17',
                'name' => 'NILAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 386,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N18',
                'name' => 'PASIR PANJANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 387,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N20',
                'name' => 'PORT DICKSON',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 388,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N22',
                'name' => 'ROMPIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 389,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N23',
                'name' => 'SEREMBAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 390,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N24',
                'name' => 'SERI MENANTI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 391,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N26',
                'name' => 'SIMPANG PERTANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 392,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N28',
            'name' => 'SUNGAI SIPUT(N)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 393,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N30',
                'name' => 'TITI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 394,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N31',
                'name' => 'RANTAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 395,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N32',
                'name' => 'TANJONG IPOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 396,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P01',
                'name' => 'AYER ITAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 397,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P02',
                'name' => 'BALIK PULAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 398,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P04',
                'name' => 'BAYAN LEPAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 399,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P05',
                'name' => 'BUKIT MERTAJAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 400,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P07',
                'name' => 'GELUGOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 401,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P08',
                'name' => 'GEORGETOWN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 402,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W04',
                'name' => 'BAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 403,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W05',
                'name' => 'BEKENU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 404,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W06',
                'name' => 'BELAGA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 405,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W08',
                'name' => 'BETONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 406,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W09',
                'name' => 'BINTANGOR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 407,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W10',
                'name' => 'BINTULU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 408,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W12',
                'name' => 'DARO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 409,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W13',
                'name' => 'DEBAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 410,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W14',
                'name' => 'ENGKILILI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 411,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W16',
                'name' => 'KABONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 412,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W17',
                'name' => 'KANOWIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 413,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W19',
                'name' => 'KOTA SAMARAHAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 414,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W20',
                'name' => 'KUCHING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 415,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W22',
                'name' => 'LIMBANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 416,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W23',
                'name' => 'LINGGA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 417,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W24',
                'name' => 'LUBOK ANTU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 418,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W26',
                'name' => 'LUNG LAMA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 419,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W27',
                'name' => 'LUTONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 420,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W29',
                'name' => 'MIRI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 421,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W30',
                'name' => 'MUKAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 422,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W31',
                'name' => 'NANGA MEDAWIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 423,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W33',
                'name' => 'PUSA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 424,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W34',
                'name' => 'ROBAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 425,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W36',
                'name' => 'SARIKEI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 426,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W37',
                'name' => 'SEBAUH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 427,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W38',
                'name' => 'SEBUYAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 428,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W40',
                'name' => 'SERIAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 429,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W41',
                'name' => 'SIMUNJAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 430,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W43',
                'name' => 'SPAOH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 431,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W44',
                'name' => 'SUNDA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 432,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W45',
                'name' => 'TATAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 433,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W46',
                'name' => 'TEBAKANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 434,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W48',
                'name' => 'SIBU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 435,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W49',
                'name' => 'TEBEDU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 436,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M16',
                'name' => 'BATU BERENDAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 437,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N34',
                'name' => 'SUNGAI GADUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 438,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F03',
                'name' => 'KERAMAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 439,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J53',
                'name' => 'PANDAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 440,
                'kod_negeri' => '04',
                'kod_daerah' => '0402',
                'kod_bandar' => 'M17',
                'name' => 'AYER KEROH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 441,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F02',
                'name' => 'KEPONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 442,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F04',
                'name' => 'BANGSAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 443,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F06',
                'name' => 'CHERAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 444,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B48',
                'name' => 'BANDAR BARU BANGI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 445,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A68',
                'name' => 'JELAPANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 446,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H30',
                'name' => 'KINABATANGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 447,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W50',
                'name' => 'MERADONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 448,
                'kod_negeri' => '12',
                'kod_daerah' => NULL,
                'kod_bandar' => 'H32',
                'name' => 'MENGGATAL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 449,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N35',
                'name' => 'SENAWANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 450,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P22',
                'name' => 'MAK MANDIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 451,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P24',
                'name' => 'JELUTONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 452,
                'kod_negeri' => '07',
                'kod_daerah' => NULL,
                'kod_bandar' => 'P25',
                'name' => 'TELUK BAHANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 453,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M19',
                'name' => 'MALIM JAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 454,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M20',
                'name' => 'UMBAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 455,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M22',
                'name' => 'NYALAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 456,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M23',
                'name' => 'SELANDAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 457,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M24',
                'name' => 'PULAU GADONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 458,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N36',
                'name' => 'CHEMBONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 459,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A69',
                'name' => 'BOTA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 460,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C36',
                'name' => 'CAMERON HIGHLANDS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 461,
                'kod_negeri' => '01',
                'kod_daerah' => NULL,
                'kod_bandar' => 'J52',
                'name' => 'KOTA TINGGI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 462,
                'kod_negeri' => '04',
                'kod_daerah' => NULL,
                'kod_bandar' => 'M26',
                'name' => 'KERUBONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 463,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N38',
                'name' => 'JUASSEH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 464,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B49',
                'name' => 'DAMANSARA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 465,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A70',
                'name' => 'ULU SEPETANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 466,
                'kod_negeri' => '08',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A71',
                'name' => 'SERI ISKANDAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 467,
                'kod_negeri' => '10',
                'kod_daerah' => '1005',
                'kod_bandar' => 'B50',
                'name' => 'BUKIT KEMUNING',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 468,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N39',
                'name' => 'RASAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 469,
                'kod_negeri' => '05',
                'kod_daerah' => NULL,
                'kod_bandar' => 'N40',
                'name' => 'MANTIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 470,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F07',
                'name' => 'SUNGAI BESI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 471,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F08',
                'name' => 'KLANG LAMA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 472,
                'kod_negeri' => '10',
                'kod_daerah' => '1001',
                'kod_bandar' => 'B51',
                'name' => 'HULU KLANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 473,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W',
                'name' => 'MARUDI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 474,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'A',
                'name' => 'LACHAU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 475,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'B',
                'name' => 'KENYANA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 476,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C',
                'name' => 'OYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 477,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F09',
                'name' => 'JINJANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 478,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F10',
                'name' => 'KUCHAI LAMA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 479,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F12',
                'name' => 'PUCHONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 480,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F13',
                'name' => 'BATU CAVES',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 481,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F',
                'name' => 'PAKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 482,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T',
                'name' => 'TANJUNG KIDURONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 483,
                'kod_negeri' => '10',
                'kod_daerah' => '1007',
                'kod_bandar' => 'B52',
                'name' => 'CYBERJAYA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 484,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F14',
                'name' => 'SEGAMBUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 485,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F15',
                'name' => 'BANDAR TUN RAZAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 486,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F17',
                'name' => 'SENTUL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 487,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F18',
                'name' => 'GOMBAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 488,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F20',
                'name' => 'BUKIT JALIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 489,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F21',
                'name' => 'SRI HARTAMAS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 490,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F23',
                'name' => 'WANGSA MAJU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 491,
                'kod_negeri' => '14',
                'kod_daerah' => NULL,
                'kod_bandar' => 'F25',
                'name' => 'BRICKFIELDS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 492,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B53',
                'name' => 'BALAKONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 493,
                'kod_negeri' => '11',
                'kod_daerah' => NULL,
                'kod_bandar' => 'T18',
                'name' => 'CHUKAI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 494,
                'kod_negeri' => '10',
                'kod_daerah' => '1001',
                'kod_bandar' => 'B54',
                'name' => 'KEPONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 495,
                'kod_negeri' => '13',
                'kod_daerah' => NULL,
                'kod_bandar' => 'W51',
                'name' => 'TANJUNG MANIS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 496,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => '31',
                'name' => 'KG. RAJA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 497,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C37',
                'name' => 'BRINCHANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 498,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C38',
                'name' => 'KUALA TERLA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 499,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C39',
                'name' => 'BLUE VALLEY',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 500,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C40',
                'name' => 'KEA FARM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('master_city')->insert(array (
            0 => 
            array (
                'id' => 501,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C41',
                'name' => 'LEMBAH BERTAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C42',
                'name' => 'HABU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'kod_negeri' => '06',
                'kod_daerah' => NULL,
                'kod_bandar' => 'C43',
                'name' => 'TRINGKAP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K30',
                'name' => 'CHANGLOON',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K31',
                'name' => 'BUKIT KAYU HITAM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'kod_negeri' => '02',
                'kod_daerah' => NULL,
                'kod_bandar' => 'K32',
                'name' => 'KUAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'kod_negeri' => '12',
                'kod_daerah' => '1225',
                'kod_bandar' => 'H33',
                'name' => 'KALABAKAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'kod_negeri' => '12',
                'kod_daerah' => '1207',
                'kod_bandar' => 'H30',
                'name' => 'PENSIANGAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'kod_negeri' => '12',
                'kod_daerah' => '1201',
                'kod_bandar' => 'H30',
                'name' => 'LABUK SUGUT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B55',
                'name' => 'PULAU INDAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B56',
                'name' => 'PANDAMARAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'kod_negeri' => '10',
                'kod_daerah' => '1002',
                'kod_bandar' => 'B57',
                'name' => 'TELOK GONG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'kod_negeri' => '07',
                'kod_daerah' => '0704',
                'kod_bandar' => 'P26',
                'name' => 'BATU KAWAN ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'kod_negeri' => '07',
                'kod_daerah' => '0702',
                'kod_bandar' => 'P27',
                'name' => 'PENANG SCIENCE PARK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'kod_negeri' => '10',
                'kod_daerah' => '1001',
                'kod_bandar' => 'B27',
                'name' => 'RAWANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'kod_negeri' => '04',
                'kod_daerah' => '0402',
                'kod_bandar' => 'M21',
                'name' => 'TANJUNG MINYAK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'kod_negeri' => '04',
                'kod_daerah' => '0402',
                'kod_bandar' => 'M22',
                'name' => 'CHENG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'kod_negeri' => '10',
                'kod_daerah' => '1008',
                'kod_bandar' => 'B57',
                'name' => 'BANDAR TEKNOLOGI KAJANG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}