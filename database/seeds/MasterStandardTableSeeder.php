<?php

use Illuminate\Database\Seeder;

class MasterStandardTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_standard')->delete();
        
        \DB::table('master_standard')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jenis_parameter' => '1',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'jenis_parameter' => '1',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'jenis_parameter' => '1',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'jenis_parameter' => '1',
                'class' => 'III',
                'parameter' => '0.06',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'jenis_parameter' => '1',
                'class' => 'IV',
                'parameter' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'jenis_parameter' => '1',
                'class' => 'V',
                'parameter' => '> 0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'jenis_parameter' => '2',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'jenis_parameter' => '2',
                'class' => 'IIA',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'jenis_parameter' => '2',
                'class' => 'IIB',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'jenis_parameter' => '2',
                'class' => 'III',
            'parameter' => '0.4 (0.05)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'jenis_parameter' => '2',
                'class' => 'IV',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'jenis_parameter' => '2',
                'class' => 'V',
                'parameter' => '> 0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'jenis_parameter' => '3',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'jenis_parameter' => '3',
                'class' => 'IIA',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'jenis_parameter' => '3',
                'class' => 'IIB',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'jenis_parameter' => '3',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'jenis_parameter' => '3',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'jenis_parameter' => '3',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'jenis_parameter' => '4',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'jenis_parameter' => '4',
                'class' => 'IIA',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'jenis_parameter' => '4',
                'class' => 'IIB',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'jenis_parameter' => '4',
                'class' => 'III',
            'parameter' => '0.01* (0.001)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'jenis_parameter' => '4',
                'class' => 'IV',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'jenis_parameter' => '4',
                'class' => 'V',
                'parameter' => '> 0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'jenis_parameter' => '5',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'jenis_parameter' => '5',
                'class' => 'IIA',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'jenis_parameter' => '5',
                'class' => 'IIB',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'jenis_parameter' => '5',
                'class' => 'III',
            'parameter' => '1.4 (0.05)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'jenis_parameter' => '5',
                'class' => 'IV',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'jenis_parameter' => '5',
                'class' => 'V',
                'parameter' => '> 0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'jenis_parameter' => '6',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'jenis_parameter' => '6',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'jenis_parameter' => '6',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'jenis_parameter' => '6',
                'class' => 'III',
                'parameter' => '2.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'jenis_parameter' => '6',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'jenis_parameter' => '6',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'jenis_parameter' => '7',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'jenis_parameter' => '7',
                'class' => 'IIA',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'jenis_parameter' => '7',
                'class' => 'IIB',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'jenis_parameter' => '7',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'jenis_parameter' => '7',
                'class' => 'IV',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'jenis_parameter' => '7',
                'class' => 'V',
                'parameter' => '> 0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'jenis_parameter' => '8',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'jenis_parameter' => '8',
                'class' => 'IIA',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'jenis_parameter' => '8',
                'class' => 'IIB',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'jenis_parameter' => '8',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'jenis_parameter' => '8',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'jenis_parameter' => '8',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'jenis_parameter' => '9',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'jenis_parameter' => '9',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'jenis_parameter' => '9',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'jenis_parameter' => '9',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'jenis_parameter' => '9',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'jenis_parameter' => '9',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'jenis_parameter' => '10',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'jenis_parameter' => '10',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'jenis_parameter' => '10',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'jenis_parameter' => '10',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'jenis_parameter' => '10',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'jenis_parameter' => '10',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'jenis_parameter' => '11',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'jenis_parameter' => '11',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'jenis_parameter' => '11',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'jenis_parameter' => '11',
                'class' => 'III',
                'parameter' => '0.06',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'jenis_parameter' => '11',
                'class' => 'IV',
                'parameter' => '3 SAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'jenis_parameter' => '11',
                'class' => 'V',
                'parameter' => '> 3 SAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'jenis_parameter' => '12',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'jenis_parameter' => '12',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'jenis_parameter' => '12',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'jenis_parameter' => '12',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'jenis_parameter' => '12',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'jenis_parameter' => '12',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'jenis_parameter' => '13',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'jenis_parameter' => '13',
                'class' => 'IIA',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'jenis_parameter' => '13',
                'class' => 'IIB',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'jenis_parameter' => '13',
                'class' => 'III',
                'parameter' => '0.06',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'jenis_parameter' => '13',
                'class' => 'IV',
            'parameter' => '1 (Leaf) 5 (Others)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'jenis_parameter' => '13',
                'class' => 'V',
            'parameter' => '> 1 (Leaf) 5 (Others)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'jenis_parameter' => '14',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'jenis_parameter' => '14',
                'class' => 'IIA',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'jenis_parameter' => '14',
                'class' => 'IIB',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'jenis_parameter' => '14',
                'class' => 'III',
            'parameter' => '0.02* (0.01)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'jenis_parameter' => '14',
                'class' => 'IV',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'jenis_parameter' => '14',
                'class' => 'V',
                'parameter' => '> 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'jenis_parameter' => '15',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'jenis_parameter' => '15',
                'class' => 'IIA',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'jenis_parameter' => '15',
                'class' => 'IIB',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'jenis_parameter' => '15',
                'class' => 'III',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'jenis_parameter' => '15',
                'class' => 'IV',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'jenis_parameter' => '15',
                'class' => 'V',
                'parameter' => '> 0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'jenis_parameter' => '16',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'jenis_parameter' => '16',
                'class' => 'IIA',
                'parameter' => '0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'jenis_parameter' => '16',
                'class' => 'IIB',
                'parameter' => '0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'jenis_parameter' => '16',
                'class' => 'III',
            'parameter' => '0.004 (0.0001)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'jenis_parameter' => '16',
                'class' => 'IV',
                'parameter' => '0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'jenis_parameter' => '16',
                'class' => 'V',
                'parameter' => '> 0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'jenis_parameter' => '17',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'jenis_parameter' => '17',
                'class' => 'IIA',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'jenis_parameter' => '17',
                'class' => 'IIB',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'jenis_parameter' => '17',
                'class' => 'III',
                'parameter' => '0.9*',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'jenis_parameter' => '17',
                'class' => 'IV',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'jenis_parameter' => '17',
                'class' => 'V',
                'parameter' => '> 0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'jenis_parameter' => '18',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'jenis_parameter' => '18',
                'class' => 'IIA',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'jenis_parameter' => '18',
                'class' => 'IIB',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'jenis_parameter' => '18',
                'class' => 'III',
            'parameter' => '0.25 (0.04)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'jenis_parameter' => '18',
                'class' => 'IV',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'jenis_parameter' => '18',
                'class' => 'V',
                'parameter' => '> 0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'jenis_parameter' => '19',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'jenis_parameter' => '19',
                'class' => 'IIA',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'jenis_parameter' => '19',
                'class' => 'IIB',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'jenis_parameter' => '19',
                'class' => 'III',
            'parameter' => '0.0002 (0.0001)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'jenis_parameter' => '19',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'jenis_parameter' => '19',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'jenis_parameter' => '20',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'jenis_parameter' => '20',
                'class' => 'IIA',
                'parameter' => '0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'jenis_parameter' => '20',
                'class' => 'IIB',
                'parameter' => '0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'jenis_parameter' => '20',
                'class' => 'III',
                'parameter' => '0.004',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'jenis_parameter' => '20',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'jenis_parameter' => '20',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'jenis_parameter' => '21',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'jenis_parameter' => '21',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'jenis_parameter' => '21',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'jenis_parameter' => '21',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'jenis_parameter' => '21',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'jenis_parameter' => '21',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'jenis_parameter' => '22',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'jenis_parameter' => '22',
                'class' => 'IIA',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'jenis_parameter' => '22',
                'class' => 'IIB',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'jenis_parameter' => '22',
                'class' => 'III',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'jenis_parameter' => '22',
                'class' => 'IV',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'jenis_parameter' => '22',
                'class' => 'V',
                'parameter' => '> 2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'jenis_parameter' => '23',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'jenis_parameter' => '23',
                'class' => 'IIA',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'jenis_parameter' => '23',
                'class' => 'IIB',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'jenis_parameter' => '23',
                'class' => 'III',
            'parameter' => '(3.4)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'jenis_parameter' => '23',
                'class' => 'IV',
                'parameter' => '0.8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'jenis_parameter' => '23',
                'class' => 'V',
                'parameter' => '> 0.8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'jenis_parameter' => '24',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'jenis_parameter' => '24',
                'class' => 'IIA',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'jenis_parameter' => '24',
                'class' => 'IIB',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'jenis_parameter' => '24',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'jenis_parameter' => '24',
                'class' => 'IV',
                'parameter' => '80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'jenis_parameter' => '24',
                'class' => 'V',
                'parameter' => '> 80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'jenis_parameter' => '25',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'jenis_parameter' => '25',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'jenis_parameter' => '25',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'jenis_parameter' => '25',
                'class' => 'III',
            'parameter' => '(0.02)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'jenis_parameter' => '25',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'jenis_parameter' => '25',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'jenis_parameter' => '26',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'jenis_parameter' => '26',
                'class' => 'IIA',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'jenis_parameter' => '26',
                'class' => 'IIB',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'jenis_parameter' => '26',
                'class' => 'III',
            'parameter' => '0.06 (0.02)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'jenis_parameter' => '26',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'jenis_parameter' => '26',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'jenis_parameter' => '27',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'jenis_parameter' => '27',
                'class' => 'IIA',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'jenis_parameter' => '27',
                'class' => 'IIB',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'jenis_parameter' => '27',
                'class' => 'III',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'jenis_parameter' => '27',
                'class' => 'IV',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'jenis_parameter' => '27',
                'class' => 'V',
                'parameter' => '> 1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'jenis_parameter' => '28',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'jenis_parameter' => '28',
                'class' => 'IIA',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'jenis_parameter' => '28',
                'class' => 'IIB',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'jenis_parameter' => '28',
                'class' => 'III',
            'parameter' => '0.4 (0.03)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'jenis_parameter' => '28',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'jenis_parameter' => '28',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'jenis_parameter' => '29',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'jenis_parameter' => '29',
                'class' => 'IIA',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'jenis_parameter' => '29',
                'class' => 'IIB',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'jenis_parameter' => '29',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'jenis_parameter' => '29',
                'class' => 'IV',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'jenis_parameter' => '29',
                'class' => 'V',
                'parameter' => '> 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'jenis_parameter' => '30',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'jenis_parameter' => '30',
                'class' => 'IIA',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'jenis_parameter' => '30',
                'class' => 'IIB',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'jenis_parameter' => '30',
                'class' => 'III',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'jenis_parameter' => '30',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'jenis_parameter' => '30',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'jenis_parameter' => '31',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'jenis_parameter' => '31',
                'class' => 'IIA',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'jenis_parameter' => '31',
                'class' => 'IIB',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'jenis_parameter' => '31',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'jenis_parameter' => '31',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'jenis_parameter' => '31',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'jenis_parameter' => '32',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'jenis_parameter' => '32',
                'class' => 'IIA',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'jenis_parameter' => '32',
                'class' => 'IIB',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'jenis_parameter' => '32',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'jenis_parameter' => '32',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'jenis_parameter' => '32',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'jenis_parameter' => '33',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'jenis_parameter' => '33',
                'class' => 'IIA',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'jenis_parameter' => '33',
                'class' => 'IIB',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'jenis_parameter' => '33',
                'class' => 'III',
            'parameter' => '(0.001)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'jenis_parameter' => '33',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'jenis_parameter' => '33',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'jenis_parameter' => '34',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'jenis_parameter' => '34',
                'class' => 'IIA',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'jenis_parameter' => '34',
                'class' => 'IIB',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'jenis_parameter' => '34',
                'class' => 'III',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'jenis_parameter' => '34',
                'class' => 'IV',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'jenis_parameter' => '34',
                'class' => 'V',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'jenis_parameter' => '35',
                'class' => 'I',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'jenis_parameter' => '35',
                'class' => 'IIA',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'jenis_parameter' => '35',
                'class' => 'IIB',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'jenis_parameter' => '35',
                'class' => 'III',
            'parameter' => '-)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        208 => 
        array (
            'id' => 209,
            'jenis_parameter' => '35',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        209 => 
        array (
            'id' => 210,
            'jenis_parameter' => '35',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        210 => 
        array (
            'id' => 211,
            'jenis_parameter' => '36',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        211 => 
        array (
            'id' => 212,
            'jenis_parameter' => '36',
            'class' => 'IIA',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        212 => 
        array (
            'id' => 213,
            'jenis_parameter' => '36',
            'class' => 'IIB',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        213 => 
        array (
            'id' => 214,
            'jenis_parameter' => '36',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        214 => 
        array (
            'id' => 215,
            'jenis_parameter' => '36',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        215 => 
        array (
            'id' => 216,
            'jenis_parameter' => '36',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        216 => 
        array (
            'id' => 217,
            'jenis_parameter' => '37',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        217 => 
        array (
            'id' => 218,
            'jenis_parameter' => '37',
            'class' => 'IIA',
            'parameter' => '< 0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        218 => 
        array (
            'id' => 219,
            'jenis_parameter' => '37',
            'class' => 'IIB',
            'parameter' => '< 0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        219 => 
        array (
            'id' => 220,
            'jenis_parameter' => '37',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        220 => 
        array (
            'id' => 221,
            'jenis_parameter' => '37',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        221 => 
        array (
            'id' => 222,
            'jenis_parameter' => '37',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        222 => 
        array (
            'id' => 223,
            'jenis_parameter' => '38',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        223 => 
        array (
            'id' => 224,
            'jenis_parameter' => '38',
            'class' => 'IIA',
            'parameter' => '< 1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        224 => 
        array (
            'id' => 225,
            'jenis_parameter' => '38',
            'class' => 'IIB',
            'parameter' => '< 1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        225 => 
        array (
            'id' => 226,
            'jenis_parameter' => '38',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        226 => 
        array (
            'id' => 227,
            'jenis_parameter' => '38',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        227 => 
        array (
            'id' => 228,
            'jenis_parameter' => '38',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        228 => 
        array (
            'id' => 229,
            'jenis_parameter' => '39',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        229 => 
        array (
            'id' => 230,
            'jenis_parameter' => '39',
            'class' => 'IIA',
            'parameter' => '500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        230 => 
        array (
            'id' => 231,
            'jenis_parameter' => '39',
            'class' => 'IIB',
            'parameter' => '500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        231 => 
        array (
            'id' => 232,
            'jenis_parameter' => '39',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        232 => 
        array (
            'id' => 233,
            'jenis_parameter' => '39',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        233 => 
        array (
            'id' => 234,
            'jenis_parameter' => '39',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        234 => 
        array (
            'id' => 235,
            'jenis_parameter' => '40',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        235 => 
        array (
            'id' => 236,
            'jenis_parameter' => '40',
            'class' => 'IIA',
            'parameter' => '500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        236 => 
        array (
            'id' => 237,
            'jenis_parameter' => '40',
            'class' => 'IIB',
            'parameter' => '500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        237 => 
        array (
            'id' => 238,
            'jenis_parameter' => '40',
            'class' => 'III',
        'parameter' => '5000 (200)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        238 => 
        array (
            'id' => 239,
            'jenis_parameter' => '40',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        239 => 
        array (
            'id' => 240,
            'jenis_parameter' => '40',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        240 => 
        array (
            'id' => 241,
            'jenis_parameter' => '41',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        241 => 
        array (
            'id' => 242,
            'jenis_parameter' => '41',
            'class' => 'IIA',
            'parameter' => '40;N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        242 => 
        array (
            'id' => 243,
            'jenis_parameter' => '41',
            'class' => 'IIB',
            'parameter' => '40;N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        243 => 
        array (
            'id' => 244,
            'jenis_parameter' => '41',
            'class' => 'III',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        244 => 
        array (
            'id' => 245,
            'jenis_parameter' => '41',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        245 => 
        array (
            'id' => 246,
            'jenis_parameter' => '41',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        246 => 
        array (
            'id' => 247,
            'jenis_parameter' => '42',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        247 => 
        array (
            'id' => 248,
            'jenis_parameter' => '42',
            'class' => 'IIA',
            'parameter' => '7000;N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        248 => 
        array (
            'id' => 249,
            'jenis_parameter' => '42',
            'class' => 'IIB',
            'parameter' => '7000;N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        249 => 
        array (
            'id' => 250,
            'jenis_parameter' => '42',
            'class' => 'III',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        250 => 
        array (
            'id' => 251,
            'jenis_parameter' => '42',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        251 => 
        array (
            'id' => 252,
            'jenis_parameter' => '42',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        252 => 
        array (
            'id' => 253,
            'jenis_parameter' => '43',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        253 => 
        array (
            'id' => 254,
            'jenis_parameter' => '43',
            'class' => 'IIA',
            'parameter' => '0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        254 => 
        array (
            'id' => 255,
            'jenis_parameter' => '43',
            'class' => 'IIB',
            'parameter' => '0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        255 => 
        array (
            'id' => 256,
            'jenis_parameter' => '43',
            'class' => 'III',
        'parameter' => '6 (0.05)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        256 => 
        array (
            'id' => 257,
            'jenis_parameter' => '43',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        257 => 
        array (
            'id' => 258,
            'jenis_parameter' => '43',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        258 => 
        array (
            'id' => 259,
            'jenis_parameter' => '44',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        259 => 
        array (
            'id' => 260,
            'jenis_parameter' => '44',
            'class' => 'IIA',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        260 => 
        array (
            'id' => 261,
            'jenis_parameter' => '44',
            'class' => 'IIB',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        261 => 
        array (
            'id' => 262,
            'jenis_parameter' => '44',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        262 => 
        array (
            'id' => 263,
            'jenis_parameter' => '44',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        263 => 
        array (
            'id' => 264,
            'jenis_parameter' => '44',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        264 => 
        array (
            'id' => 265,
            'jenis_parameter' => '45',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        265 => 
        array (
            'id' => 266,
            'jenis_parameter' => '45',
            'class' => 'IIA',
            'parameter' => '0.02',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        266 => 
        array (
            'id' => 267,
            'jenis_parameter' => '45',
            'class' => 'IIB',
            'parameter' => '0.02',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        267 => 
        array (
            'id' => 268,
            'jenis_parameter' => '45',
            'class' => 'III',
        'parameter' => '0.2 (0.01)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        268 => 
        array (
            'id' => 269,
            'jenis_parameter' => '45',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        269 => 
        array (
            'id' => 270,
            'jenis_parameter' => '45',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        270 => 
        array (
            'id' => 271,
            'jenis_parameter' => '46',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        271 => 
        array (
            'id' => 272,
            'jenis_parameter' => '46',
            'class' => 'IIA',
            'parameter' => '2',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        272 => 
        array (
            'id' => 273,
            'jenis_parameter' => '46',
            'class' => 'IIB',
            'parameter' => '2',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        273 => 
        array (
            'id' => 274,
            'jenis_parameter' => '46',
            'class' => 'III',
        'parameter' => '9 (0.1)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        274 => 
        array (
            'id' => 275,
            'jenis_parameter' => '46',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        275 => 
        array (
            'id' => 276,
            'jenis_parameter' => '46',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        276 => 
        array (
            'id' => 277,
            'jenis_parameter' => '47',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        277 => 
        array (
            'id' => 278,
            'jenis_parameter' => '47',
            'class' => 'IIA',
            'parameter' => '0.08',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        278 => 
        array (
            'id' => 279,
            'jenis_parameter' => '47',
            'class' => 'IIB',
            'parameter' => '0.08',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        279 => 
        array (
            'id' => 280,
            'jenis_parameter' => '47',
            'class' => 'III',
        'parameter' => '2 (0.02)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        280 => 
        array (
            'id' => 281,
            'jenis_parameter' => '47',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        281 => 
        array (
            'id' => 282,
            'jenis_parameter' => '47',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        282 => 
        array (
            'id' => 283,
            'jenis_parameter' => '48',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        283 => 
        array (
            'id' => 284,
            'jenis_parameter' => '48',
            'class' => 'IIA',
            'parameter' => '0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        284 => 
        array (
            'id' => 285,
            'jenis_parameter' => '48',
            'class' => 'IIB',
            'parameter' => '0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        285 => 
        array (
            'id' => 286,
            'jenis_parameter' => '48',
            'class' => 'III',
        'parameter' => '(1)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        286 => 
        array (
            'id' => 287,
            'jenis_parameter' => '48',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        287 => 
        array (
            'id' => 288,
            'jenis_parameter' => '48',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        288 => 
        array (
            'id' => 289,
            'jenis_parameter' => '49',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        289 => 
        array (
            'id' => 290,
            'jenis_parameter' => '49',
            'class' => 'IIA',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        290 => 
        array (
            'id' => 291,
            'jenis_parameter' => '49',
            'class' => 'IIB',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        291 => 
        array (
            'id' => 292,
            'jenis_parameter' => '49',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        292 => 
        array (
            'id' => 293,
            'jenis_parameter' => '49',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        293 => 
        array (
            'id' => 294,
            'jenis_parameter' => '49',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        294 => 
        array (
            'id' => 295,
            'jenis_parameter' => '50',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        295 => 
        array (
            'id' => 296,
            'jenis_parameter' => '50',
            'class' => 'IIA',
            'parameter' => '0.05',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        296 => 
        array (
            'id' => 297,
            'jenis_parameter' => '50',
            'class' => 'IIB',
            'parameter' => '0.05',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        297 => 
        array (
            'id' => 298,
            'jenis_parameter' => '50',
            'class' => 'III',
        'parameter' => '0.9 (0.06)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        298 => 
        array (
            'id' => 299,
            'jenis_parameter' => '50',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        299 => 
        array (
            'id' => 300,
            'jenis_parameter' => '50',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        300 => 
        array (
            'id' => 301,
            'jenis_parameter' => '51',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        301 => 
        array (
            'id' => 302,
            'jenis_parameter' => '51',
            'class' => 'IIA',
            'parameter' => '2',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        302 => 
        array (
            'id' => 303,
            'jenis_parameter' => '51',
            'class' => 'IIB',
            'parameter' => '2',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        303 => 
        array (
            'id' => 304,
            'jenis_parameter' => '51',
            'class' => 'III',
        'parameter' => '3 (0.4)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        304 => 
        array (
            'id' => 305,
            'jenis_parameter' => '51',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        305 => 
        array (
            'id' => 306,
            'jenis_parameter' => '51',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        306 => 
        array (
            'id' => 307,
            'jenis_parameter' => '52',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        307 => 
        array (
            'id' => 308,
            'jenis_parameter' => '52',
            'class' => 'IIA',
            'parameter' => '70',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        308 => 
        array (
            'id' => 309,
            'jenis_parameter' => '52',
            'class' => 'IIB',
            'parameter' => '70',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        309 => 
        array (
            'id' => 310,
            'jenis_parameter' => '52',
            'class' => 'III',
            'parameter' => '450',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        310 => 
        array (
            'id' => 311,
            'jenis_parameter' => '52',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        311 => 
        array (
            'id' => 312,
            'jenis_parameter' => '52',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        312 => 
        array (
            'id' => 313,
            'jenis_parameter' => '53',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        313 => 
        array (
            'id' => 314,
            'jenis_parameter' => '53',
            'class' => 'IIA',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        314 => 
        array (
            'id' => 315,
            'jenis_parameter' => '53',
            'class' => 'IIB',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        315 => 
        array (
            'id' => 316,
            'jenis_parameter' => '53',
            'class' => 'III',
            'parameter' => '160',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        316 => 
        array (
            'id' => 317,
            'jenis_parameter' => '53',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        317 => 
        array (
            'id' => 318,
            'jenis_parameter' => '53',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        318 => 
        array (
            'id' => 319,
            'jenis_parameter' => '54',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        319 => 
        array (
            'id' => 320,
            'jenis_parameter' => '54',
            'class' => 'IIA',
            'parameter' => '4',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        320 => 
        array (
            'id' => 321,
            'jenis_parameter' => '54',
            'class' => 'IIB',
            'parameter' => '4',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        321 => 
        array (
            'id' => 322,
            'jenis_parameter' => '54',
            'class' => 'III',
            'parameter' => '850',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        322 => 
        array (
            'id' => 323,
            'jenis_parameter' => '54',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        323 => 
        array (
            'id' => 324,
            'jenis_parameter' => '54',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        324 => 
        array (
            'id' => 325,
            'jenis_parameter' => '55',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        325 => 
        array (
            'id' => 326,
            'jenis_parameter' => '55',
            'class' => 'IIA',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        326 => 
        array (
            'id' => 327,
            'jenis_parameter' => '55',
            'class' => 'IIB',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        327 => 
        array (
            'id' => 328,
            'jenis_parameter' => '55',
            'class' => 'III',
            'parameter' => '1800',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        328 => 
        array (
            'id' => 329,
            'jenis_parameter' => '55',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        329 => 
        array (
            'id' => 330,
            'jenis_parameter' => '55',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        330 => 
        array (
            'id' => 331,
            'jenis_parameter' => '56',
            'class' => 'I',
            'parameter' => '0.1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        331 => 
        array (
            'id' => 332,
            'jenis_parameter' => '56',
            'class' => 'IIA',
            'parameter' => '0.3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        332 => 
        array (
            'id' => 333,
            'jenis_parameter' => '56',
            'class' => 'IIB',
            'parameter' => '0.3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        333 => 
        array (
            'id' => 334,
            'jenis_parameter' => '56',
            'class' => 'III',
            'parameter' => '0.9',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        334 => 
        array (
            'id' => 335,
            'jenis_parameter' => '56',
            'class' => 'IV',
            'parameter' => '2.7',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        335 => 
        array (
            'id' => 336,
            'jenis_parameter' => '56',
            'class' => 'V',
            'parameter' => '> 2.7',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        336 => 
        array (
            'id' => 337,
            'jenis_parameter' => '57',
            'class' => 'I',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        337 => 
        array (
            'id' => 338,
            'jenis_parameter' => '57',
            'class' => 'IIA',
            'parameter' => '3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        338 => 
        array (
            'id' => 339,
            'jenis_parameter' => '57',
            'class' => 'IIB',
            'parameter' => '3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        339 => 
        array (
            'id' => 340,
            'jenis_parameter' => '57',
            'class' => 'III',
            'parameter' => '6',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        340 => 
        array (
            'id' => 341,
            'jenis_parameter' => '57',
            'class' => 'IV',
            'parameter' => '12',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        341 => 
        array (
            'id' => 342,
            'jenis_parameter' => '57',
            'class' => 'V',
            'parameter' => '> 12',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        342 => 
        array (
            'id' => 343,
            'jenis_parameter' => '58',
            'class' => 'I',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        343 => 
        array (
            'id' => 344,
            'jenis_parameter' => '58',
            'class' => 'IIA',
            'parameter' => '25',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        344 => 
        array (
            'id' => 345,
            'jenis_parameter' => '58',
            'class' => 'IIB',
            'parameter' => '25',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        345 => 
        array (
            'id' => 346,
            'jenis_parameter' => '58',
            'class' => 'III',
            'parameter' => '50',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        346 => 
        array (
            'id' => 347,
            'jenis_parameter' => '58',
            'class' => 'IV',
            'parameter' => '100',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        347 => 
        array (
            'id' => 348,
            'jenis_parameter' => '58',
            'class' => 'V',
            'parameter' => '> 100',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        348 => 
        array (
            'id' => 349,
            'jenis_parameter' => '59',
            'class' => 'I',
            'parameter' => '7',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        349 => 
        array (
            'id' => 350,
            'jenis_parameter' => '59',
            'class' => 'IIA',
            'parameter' => '5 - 7',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        350 => 
        array (
            'id' => 351,
            'jenis_parameter' => '59',
            'class' => 'IIB',
            'parameter' => '5 - 7',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        351 => 
        array (
            'id' => 352,
            'jenis_parameter' => '59',
            'class' => 'III',
            'parameter' => '3 - 5',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        352 => 
        array (
            'id' => 353,
            'jenis_parameter' => '59',
            'class' => 'IV',
            'parameter' => '< 3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        353 => 
        array (
            'id' => 354,
            'jenis_parameter' => '59',
            'class' => 'V',
            'parameter' => '< 1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        354 => 
        array (
            'id' => 355,
            'jenis_parameter' => '60',
            'class' => 'I',
            'parameter' => '6.5 - 8.5',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        355 => 
        array (
            'id' => 356,
            'jenis_parameter' => '60',
            'class' => 'IIA',
            'parameter' => '6 - 9',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        356 => 
        array (
            'id' => 357,
            'jenis_parameter' => '60',
            'class' => 'IIB',
            'parameter' => '6 - 9',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        357 => 
        array (
            'id' => 358,
            'jenis_parameter' => '60',
            'class' => 'III',
            'parameter' => '5 - 9',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        358 => 
        array (
            'id' => 359,
            'jenis_parameter' => '60',
            'class' => 'IV',
            'parameter' => '5 - 9',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        359 => 
        array (
            'id' => 360,
            'jenis_parameter' => '60',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        360 => 
        array (
            'id' => 361,
            'jenis_parameter' => '61',
            'class' => 'I',
            'parameter' => '15',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        361 => 
        array (
            'id' => 362,
            'jenis_parameter' => '61',
            'class' => 'IIA',
            'parameter' => '150',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        362 => 
        array (
            'id' => 363,
            'jenis_parameter' => '61',
            'class' => 'IIB',
            'parameter' => '150',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        363 => 
        array (
            'id' => 364,
            'jenis_parameter' => '61',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        364 => 
        array (
            'id' => 365,
            'jenis_parameter' => '61',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        365 => 
        array (
            'id' => 366,
            'jenis_parameter' => '61',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        366 => 
        array (
            'id' => 367,
            'jenis_parameter' => '62',
            'class' => 'I',
            'parameter' => '1000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        367 => 
        array (
            'id' => 368,
            'jenis_parameter' => '62',
            'class' => 'IIA',
            'parameter' => '1000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        368 => 
        array (
            'id' => 369,
            'jenis_parameter' => '62',
            'class' => 'IIB',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        369 => 
        array (
            'id' => 370,
            'jenis_parameter' => '62',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        370 => 
        array (
            'id' => 371,
            'jenis_parameter' => '62',
            'class' => 'IV',
            'parameter' => '6000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        371 => 
        array (
            'id' => 372,
            'jenis_parameter' => '62',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        372 => 
        array (
            'id' => 373,
            'jenis_parameter' => '63',
            'class' => 'I',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        373 => 
        array (
            'id' => 374,
            'jenis_parameter' => '63',
            'class' => 'IIA',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        374 => 
        array (
            'id' => 375,
            'jenis_parameter' => '63',
            'class' => 'IIB',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        375 => 
        array (
            'id' => 376,
            'jenis_parameter' => '63',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        376 => 
        array (
            'id' => 377,
            'jenis_parameter' => '63',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        377 => 
        array (
            'id' => 378,
            'jenis_parameter' => '63',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        378 => 
        array (
            'id' => 379,
            'jenis_parameter' => '64',
            'class' => 'I',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        379 => 
        array (
            'id' => 380,
            'jenis_parameter' => '64',
            'class' => 'IIA',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        380 => 
        array (
            'id' => 381,
            'jenis_parameter' => '64',
            'class' => 'IIB',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        381 => 
        array (
            'id' => 382,
            'jenis_parameter' => '64',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        382 => 
        array (
            'id' => 383,
            'jenis_parameter' => '64',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        383 => 
        array (
            'id' => 384,
            'jenis_parameter' => '64',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        384 => 
        array (
            'id' => 385,
            'jenis_parameter' => '65',
            'class' => 'I',
            'parameter' => '0.5',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        385 => 
        array (
            'id' => 386,
            'jenis_parameter' => '65',
            'class' => 'IIA',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        386 => 
        array (
            'id' => 387,
            'jenis_parameter' => '65',
            'class' => 'IIB',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        387 => 
        array (
            'id' => 388,
            'jenis_parameter' => '65',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        388 => 
        array (
            'id' => 389,
            'jenis_parameter' => '65',
            'class' => 'IV',
            'parameter' => '2',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        389 => 
        array (
            'id' => 390,
            'jenis_parameter' => '65',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        390 => 
        array (
            'id' => 391,
            'jenis_parameter' => '66',
            'class' => 'I',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        391 => 
        array (
            'id' => 392,
            'jenis_parameter' => '66',
            'class' => 'IIA',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        392 => 
        array (
            'id' => 393,
            'jenis_parameter' => '66',
            'class' => 'IIB',
            'parameter' => 'N',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        393 => 
        array (
            'id' => 394,
            'jenis_parameter' => '66',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        394 => 
        array (
            'id' => 395,
            'jenis_parameter' => '66',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        395 => 
        array (
            'id' => 396,
            'jenis_parameter' => '66',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        396 => 
        array (
            'id' => 397,
            'jenis_parameter' => '67',
            'class' => 'I',
            'parameter' => '500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        397 => 
        array (
            'id' => 398,
            'jenis_parameter' => '67',
            'class' => 'IIA',
            'parameter' => '1000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        398 => 
        array (
            'id' => 399,
            'jenis_parameter' => '67',
            'class' => 'IIB',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        399 => 
        array (
            'id' => 400,
            'jenis_parameter' => '67',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        400 => 
        array (
            'id' => 401,
            'jenis_parameter' => '67',
            'class' => 'IV',
            'parameter' => '4000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        401 => 
        array (
            'id' => 402,
            'jenis_parameter' => '67',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        402 => 
        array (
            'id' => 403,
            'jenis_parameter' => '68',
            'class' => 'I',
            'parameter' => '25',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        403 => 
        array (
            'id' => 404,
            'jenis_parameter' => '68',
            'class' => 'IIA',
            'parameter' => '50',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        404 => 
        array (
            'id' => 405,
            'jenis_parameter' => '68',
            'class' => 'IIB',
            'parameter' => '50',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        405 => 
        array (
            'id' => 406,
            'jenis_parameter' => '68',
            'class' => 'III',
            'parameter' => '150',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        406 => 
        array (
            'id' => 407,
            'jenis_parameter' => '68',
            'class' => 'IV',
            'parameter' => '300',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        407 => 
        array (
            'id' => 408,
            'jenis_parameter' => '68',
            'class' => 'V',
            'parameter' => '300',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        408 => 
        array (
            'id' => 409,
            'jenis_parameter' => '69',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        409 => 
        array (
            'id' => 410,
            'jenis_parameter' => '69',
            'class' => 'IIA',
            'parameter' => 'Normal + 2 C',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        410 => 
        array (
            'id' => 411,
            'jenis_parameter' => '69',
            'class' => 'IIB',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        411 => 
        array (
            'id' => 412,
            'jenis_parameter' => '69',
            'class' => 'III',
            'parameter' => 'Normal + 2 C',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        412 => 
        array (
            'id' => 413,
            'jenis_parameter' => '69',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        413 => 
        array (
            'id' => 414,
            'jenis_parameter' => '69',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        414 => 
        array (
            'id' => 415,
            'jenis_parameter' => '70',
            'class' => 'I',
            'parameter' => '5',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        415 => 
        array (
            'id' => 416,
            'jenis_parameter' => '70',
            'class' => 'IIA',
            'parameter' => '50',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        416 => 
        array (
            'id' => 417,
            'jenis_parameter' => '70',
            'class' => 'IIB',
            'parameter' => '50',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        417 => 
        array (
            'id' => 418,
            'jenis_parameter' => '70',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        418 => 
        array (
            'id' => 419,
            'jenis_parameter' => '70',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        419 => 
        array (
            'id' => 420,
            'jenis_parameter' => '70',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        420 => 
        array (
            'id' => 421,
            'jenis_parameter' => '71',
            'class' => 'I',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        421 => 
        array (
            'id' => 422,
            'jenis_parameter' => '71',
            'class' => 'IIA',
            'parameter' => '100',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        422 => 
        array (
            'id' => 423,
            'jenis_parameter' => '71',
            'class' => 'IIB',
            'parameter' => '400',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        423 => 
        array (
            'id' => 424,
            'jenis_parameter' => '71',
            'class' => 'III',
        'parameter' => '5000 (20000)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        424 => 
        array (
            'id' => 425,
            'jenis_parameter' => '71',
            'class' => 'IV',
        'parameter' => '5000 (20000)',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        425 => 
        array (
            'id' => 426,
            'jenis_parameter' => '71',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        426 => 
        array (
            'id' => 427,
            'jenis_parameter' => '72',
            'class' => 'I',
            'parameter' => '100',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        427 => 
        array (
            'id' => 428,
            'jenis_parameter' => '72',
            'class' => 'IIA',
            'parameter' => '5000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        428 => 
        array (
            'id' => 429,
            'jenis_parameter' => '72',
            'class' => 'IIB',
            'parameter' => '5000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        429 => 
        array (
            'id' => 430,
            'jenis_parameter' => '72',
            'class' => 'III',
            'parameter' => '50000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        430 => 
        array (
            'id' => 431,
            'jenis_parameter' => '72',
            'class' => 'IV',
            'parameter' => '50000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        431 => 
        array (
            'id' => 432,
            'jenis_parameter' => '72',
            'class' => 'V',
            'parameter' => '> 50000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        432 => 
        array (
            'id' => 433,
            'jenis_parameter' => '500',
            'class' => 'I',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        433 => 
        array (
            'id' => 434,
            'jenis_parameter' => '500',
            'class' => 'IIA',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        434 => 
        array (
            'id' => 435,
            'jenis_parameter' => '500',
            'class' => 'IIB',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        435 => 
        array (
            'id' => 436,
            'jenis_parameter' => '500',
            'class' => 'III',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        436 => 
        array (
            'id' => 437,
            'jenis_parameter' => '500',
            'class' => 'IV',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        437 => 
        array (
            'id' => 438,
            'jenis_parameter' => '500',
            'class' => 'V',
            'parameter' => '-',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        438 => 
        array (
            'id' => 439,
            'jenis_parameter' => '168',
            'class' => 'Air Minuman',
            'parameter' => '5000 MPN/100',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        439 => 
        array (
            'id' => 440,
            'jenis_parameter' => '169',
            'class' => 'Air Minuman',
            'parameter' => '5000 MPN/100',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        440 => 
        array (
            'id' => 441,
            'jenis_parameter' => '170',
            'class' => 'Air Minuman',
            'parameter' => '1000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        441 => 
        array (
            'id' => 442,
            'jenis_parameter' => '171',
            'class' => 'Air Minuman',
            'parameter' => '300',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        442 => 
        array (
            'id' => 443,
            'jenis_parameter' => '172',
            'class' => 'Air Minuman',
            'parameter' => '5.5-9.0',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        443 => 
        array (
            'id' => 444,
            'jenis_parameter' => '173',
            'class' => 'Air Minuman',
            'parameter' => 'Normal + 2 C',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        444 => 
        array (
            'id' => 445,
            'jenis_parameter' => '174',
            'class' => 'Air Minuman',
            'parameter' => '1000',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        445 => 
        array (
            'id' => 446,
            'jenis_parameter' => '175',
            'class' => 'Air Minuman',
            'parameter' => '1500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        446 => 
        array (
            'id' => 447,
            'jenis_parameter' => '176',
            'class' => 'Air Minuman',
            'parameter' => '250',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        447 => 
        array (
            'id' => 448,
            'jenis_parameter' => '177',
            'class' => 'Air Minuman',
            'parameter' => '1.5',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        448 => 
        array (
            'id' => 449,
            'jenis_parameter' => '178',
            'class' => 'Air Minuman',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        449 => 
        array (
            'id' => 450,
            'jenis_parameter' => '179',
            'class' => 'Air Minuman',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        450 => 
        array (
            'id' => 451,
            'jenis_parameter' => '180',
            'class' => 'Air Minuman',
            'parameter' => '1.5',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        451 => 
        array (
            'id' => 452,
            'jenis_parameter' => '181',
            'class' => 'Air Minuman',
            'parameter' => '500',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        452 => 
        array (
            'id' => 453,
            'jenis_parameter' => '182',
            'class' => 'Air Minuman',
            'parameter' => '0.2',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        453 => 
        array (
            'id' => 454,
            'jenis_parameter' => '183',
            'class' => 'Air Minuman',
            'parameter' => '10',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        454 => 
        array (
            'id' => 455,
            'jenis_parameter' => '184',
            'class' => 'Air Minuman',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        455 => 
        array (
            'id' => 456,
            'jenis_parameter' => '185',
            'class' => 'Air Minuman',
            'parameter' => '6',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        456 => 
        array (
            'id' => 457,
            'jenis_parameter' => '186',
            'class' => 'Air Minuman',
            'parameter' => '0.4',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        457 => 
        array (
            'id' => 458,
            'jenis_parameter' => '187',
            'class' => 'Air Minuman',
            'parameter' => '0.001',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        458 => 
        array (
            'id' => 459,
            'jenis_parameter' => '188',
            'class' => 'Air Minuman',
            'parameter' => '0.003',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        459 => 
        array (
            'id' => 460,
            'jenis_parameter' => '189',
            'class' => 'Air Minuman',
            'parameter' => '0.01',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        460 => 
        array (
            'id' => 461,
            'jenis_parameter' => '190',
            'class' => 'Air Minuman',
            'parameter' => '0.07',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        461 => 
        array (
            'id' => 462,
            'jenis_parameter' => '191',
            'class' => 'Air Minuman',
            'parameter' => '0.05',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        462 => 
        array (
            'id' => 463,
            'jenis_parameter' => '192',
            'class' => 'Air Minuman',
            'parameter' => '0.05',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        463 => 
        array (
            'id' => 464,
            'jenis_parameter' => '193',
            'class' => 'Air Minuman',
            'parameter' => '1',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        464 => 
        array (
            'id' => 465,
            'jenis_parameter' => '194',
            'class' => 'Air Minuman',
            'parameter' => '3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        465 => 
        array (
            'id' => 466,
            'jenis_parameter' => '195',
            'class' => 'Air Minuman',
            'parameter' => '200',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        466 => 
        array (
            'id' => 467,
            'jenis_parameter' => '196',
            'class' => 'Air Minuman',
            'parameter' => '250',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        467 => 
        array (
            'id' => 468,
            'jenis_parameter' => '197',
            'class' => 'Air Minuman',
            'parameter' => '0.01',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        468 => 
        array (
            'id' => 469,
            'jenis_parameter' => '198',
            'class' => 'Air Minuman',
            'parameter' => '0.01',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        469 => 
        array (
            'id' => 470,
            'jenis_parameter' => '199',
            'class' => 'Air Minuman',
            'parameter' => '150',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        470 => 
        array (
            'id' => 471,
            'jenis_parameter' => '200',
            'class' => 'Air Minuman',
            'parameter' => '0.3',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        471 => 
        array (
            'id' => 472,
            'jenis_parameter' => '201',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        472 => 
        array (
            'id' => 473,
            'jenis_parameter' => '202',
            'class' => 'Air Minuman',
            'parameter' => '0.002',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        473 => 
        array (
            'id' => 474,
            'jenis_parameter' => '203',
            'class' => 'Air Minuman',
            'parameter' => '0.05',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        474 => 
        array (
            'id' => 475,
            'jenis_parameter' => '204',
            'class' => 'Air Minuman',
            'parameter' => '0.1 Bq/l',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        475 => 
        array (
            'id' => 476,
            'jenis_parameter' => '205',
            'class' => 'Air Minuman',
            'parameter' => '1.0',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        476 => 
        array (
            'id' => 477,
            'jenis_parameter' => '452',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        477 => 
        array (
            'id' => 478,
            'jenis_parameter' => '453',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        478 => 
        array (
            'id' => 479,
            'jenis_parameter' => '454',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        479 => 
        array (
            'id' => 480,
            'jenis_parameter' => '455',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        480 => 
        array (
            'id' => 481,
            'jenis_parameter' => '456',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        481 => 
        array (
            'id' => 482,
            'jenis_parameter' => '457',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        482 => 
        array (
            'id' => 483,
            'jenis_parameter' => '458',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        483 => 
        array (
            'id' => 484,
            'jenis_parameter' => '459',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        484 => 
        array (
            'id' => 485,
            'jenis_parameter' => '460',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        485 => 
        array (
            'id' => 486,
            'jenis_parameter' => '461',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        486 => 
        array (
            'id' => 487,
            'jenis_parameter' => '462',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        487 => 
        array (
            'id' => 488,
            'jenis_parameter' => '463',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        488 => 
        array (
            'id' => 489,
            'jenis_parameter' => '464',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        489 => 
        array (
            'id' => 490,
            'jenis_parameter' => '465',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        490 => 
        array (
            'id' => 491,
            'jenis_parameter' => '466',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        491 => 
        array (
            'id' => 492,
            'jenis_parameter' => '467',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        492 => 
        array (
            'id' => 493,
            'jenis_parameter' => '468',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        493 => 
        array (
            'id' => 494,
            'jenis_parameter' => '469',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        494 => 
        array (
            'id' => 495,
            'jenis_parameter' => '470',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        495 => 
        array (
            'id' => 496,
            'jenis_parameter' => '471',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        496 => 
        array (
            'id' => 497,
            'jenis_parameter' => '472',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        497 => 
        array (
            'id' => 498,
            'jenis_parameter' => '473',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        498 => 
        array (
            'id' => 499,
            'jenis_parameter' => '474',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
        499 => 
        array (
            'id' => 500,
            'jenis_parameter' => '475',
            'class' => 'Air Minuman',
            'parameter' => '0.00003-0.03',
            'created_at' => NULL,
            'updated_at' => NULL,
        ),
    ));
        \DB::table('master_standard')->insert(array (
            0 => 
            array (
                'id' => 501,
                'jenis_parameter' => '476',
                'class' => 'Air Minuman',
                'parameter' => '0.00003-0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'jenis_parameter' => '477',
                'class' => 'Air Minuman',
                'parameter' => '0.00003-0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'jenis_parameter' => '478',
                'class' => 'Air Minuman',
                'parameter' => '0.00003-0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'jenis_parameter' => '479',
                'class' => 'Air Minuman',
                'parameter' => '0.00003-0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'jenis_parameter' => '480',
                'class' => 'Air Minuman',
                'parameter' => '0.00003-0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'jenis_parameter' => '480',
                'class' => 'Air Minuman',
                'parameter' => '0.00003-0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'jenis_parameter' => '481',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'jenis_parameter' => '482',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'jenis_parameter' => '483',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'jenis_parameter' => '484',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'jenis_parameter' => '485',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'jenis_parameter' => '486',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'jenis_parameter' => '487',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'jenis_parameter' => '488',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'jenis_parameter' => '489',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'jenis_parameter' => '490',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'jenis_parameter' => '491',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'jenis_parameter' => '492',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 519,
                'jenis_parameter' => '493',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 520,
                'jenis_parameter' => '501',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 521,
                'jenis_parameter' => '502',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 522,
                'jenis_parameter' => '503',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 523,
                'jenis_parameter' => '504',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 524,
                'jenis_parameter' => '505',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 525,
                'jenis_parameter' => '506',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 526,
                'jenis_parameter' => '507',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 527,
                'jenis_parameter' => '508',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 528,
                'jenis_parameter' => '509',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 529,
                'jenis_parameter' => '510',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 530,
                'jenis_parameter' => '511',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 531,
                'jenis_parameter' => '512',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 532,
                'jenis_parameter' => '513',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 533,
                'jenis_parameter' => '514',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 534,
                'jenis_parameter' => '515',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 535,
                'jenis_parameter' => '516',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 536,
                'jenis_parameter' => '517',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 537,
                'jenis_parameter' => '518',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 538,
                'jenis_parameter' => '519',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 539,
                'jenis_parameter' => '520',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 540,
                'jenis_parameter' => '521',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 541,
                'jenis_parameter' => '522',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 542,
                'jenis_parameter' => '523',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 543,
                'jenis_parameter' => '524',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 544,
                'jenis_parameter' => '525',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 545,
                'jenis_parameter' => '526',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 546,
                'jenis_parameter' => '527',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 547,
                'jenis_parameter' => '528',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 548,
                'jenis_parameter' => '529',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 549,
                'jenis_parameter' => '530',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 550,
                'jenis_parameter' => '531',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 551,
                'jenis_parameter' => '532',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 552,
                'jenis_parameter' => '533',
                'class' => 'Air Minuman',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 553,
                'jenis_parameter' => '206',
                'class' => 'Pertanian',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 554,
                'jenis_parameter' => '207',
                'class' => 'Pertanian',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 555,
                'jenis_parameter' => '208',
                'class' => 'Pertanian',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 556,
                'jenis_parameter' => '209',
                'class' => 'Pertanian',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 557,
                'jenis_parameter' => '210',
                'class' => 'Pertanian',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 558,
                'jenis_parameter' => '211',
                'class' => 'Pertanian',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 559,
                'jenis_parameter' => '212',
                'class' => 'Pertanian',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 560,
                'jenis_parameter' => '213',
                'class' => 'Pertanian',
                'parameter' => '3.0 me/L',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 561,
                'jenis_parameter' => '214',
                'class' => 'Pertanian',
                'parameter' => '4.0 me/L',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 562,
                'jenis_parameter' => '215',
                'class' => 'Pertanian',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 563,
                'jenis_parameter' => '216',
                'class' => 'Pertanian',
                'parameter' => '0.7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 564,
                'jenis_parameter' => '217',
                'class' => 'Pertanian',
                'parameter' => '700 ÃƒÆ’Ã‚Æ’ÃƒÂ¢Ã‚â‚¬Ã‚Å¡ÃƒÆ’Ã‚â€šÃƒâ€šÃ‚ÂµS/cm',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 565,
                'jenis_parameter' => '218',
                'class' => 'Pertanian',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 566,
                'jenis_parameter' => '219',
                'class' => 'Pertanian',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 567,
                'jenis_parameter' => '221',
                'class' => 'Industri',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 568,
                'jenis_parameter' => '222',
                'class' => 'Industri',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 569,
                'jenis_parameter' => '223',
                'class' => 'Industri',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 570,
                'jenis_parameter' => '224',
                'class' => 'Industri',
                'parameter' => '0.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 571,
                'jenis_parameter' => '225',
                'class' => 'Industri',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 572,
                'jenis_parameter' => '226',
                'class' => 'Industri',
                'parameter' => '6.5-8.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 573,
                'jenis_parameter' => '227',
                'class' => 'Industri',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 574,
                'jenis_parameter' => '228',
                'class' => 'Industri',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 575,
                'jenis_parameter' => '229',
                'class' => 'Industri',
                'parameter' => '450',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 576,
                'jenis_parameter' => '230',
                'class' => 'Industri',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 577,
                'jenis_parameter' => '231',
                'class' => 'Industri',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 578,
                'jenis_parameter' => '232',
                'class' => '-',
                'parameter' => '50 mg/L',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 579,
                'jenis_parameter' => '233',
                'class' => '-',
                'parameter' => '250 NTU',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 580,
                'jenis_parameter' => '234',
                'class' => '1',
                'parameter' => '> 6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 581,
                'jenis_parameter' => '234',
                'class' => '2',
                'parameter' => '> 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 582,
                'jenis_parameter' => '234',
                'class' => '3',
                'parameter' => '> 3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 583,
                'jenis_parameter' => '234',
                'class' => 'E1',
                'parameter' => '> 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 584,
                'jenis_parameter' => '234',
                'class' => 'E2',
                'parameter' => '> 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 585,
                'jenis_parameter' => '234',
                'class' => 'E3',
                'parameter' => '> 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 586,
                'jenis_parameter' => '235',
                'class' => '1',
                'parameter' => '25',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 587,
                'jenis_parameter' => '235',
                'class' => '2',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 588,
                'jenis_parameter' => '235',
                'class' => '3',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 589,
                'jenis_parameter' => '235',
                'class' => 'E1',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 590,
                'jenis_parameter' => '235',
                'class' => 'E2',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 591,
                'jenis_parameter' => '235',
                'class' => 'E3',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 592,
                'jenis_parameter' => '236',
                'class' => '1',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 593,
                'jenis_parameter' => '236',
                'class' => '2',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 594,
                'jenis_parameter' => '236',
                'class' => '3',
                'parameter' => '670',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 595,
                'jenis_parameter' => '236',
                'class' => 'E1',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 596,
                'jenis_parameter' => '236',
                'class' => 'E2',
                'parameter' => '180',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 597,
                'jenis_parameter' => '236',
                'class' => 'E3',
                'parameter' => '180',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 598,
                'jenis_parameter' => '237',
                'class' => '1',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 599,
                'jenis_parameter' => '237',
                'class' => '2',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 600,
                'jenis_parameter' => '237',
                'class' => '3',
                'parameter' => '700',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 601,
                'jenis_parameter' => '237',
                'class' => 'E1',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 602,
                'jenis_parameter' => '237',
                'class' => 'E2',
                'parameter' => '570',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 603,
                'jenis_parameter' => '237',
                'class' => 'E3',
                'parameter' => '430',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 604,
                'jenis_parameter' => '238',
                'class' => '1',
                'parameter' => '35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 605,
                'jenis_parameter' => '238',
                'class' => '2',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 606,
                'jenis_parameter' => '238',
                'class' => '3',
                'parameter' => '320',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 607,
                'jenis_parameter' => '238',
                'class' => 'E1',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 608,
                'jenis_parameter' => '238',
                'class' => 'E2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 609,
                'jenis_parameter' => '238',
                'class' => 'E3',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 610,
                'jenis_parameter' => '239',
                'class' => '1',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 611,
                'jenis_parameter' => '239',
                'class' => '2',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 612,
                'jenis_parameter' => '239',
                'class' => '3',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 613,
                'jenis_parameter' => '239',
                'class' => 'E1',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 614,
                'jenis_parameter' => '239',
                'class' => 'E2',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 615,
                'jenis_parameter' => '239',
                'class' => 'E3',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 616,
                'jenis_parameter' => '240',
                'class' => '1',
                'parameter' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 617,
                'jenis_parameter' => '240',
                'class' => '2',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 618,
                'jenis_parameter' => '240',
                'class' => '3',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 619,
                'jenis_parameter' => '240',
                'class' => 'E1',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 620,
                'jenis_parameter' => '240',
                'class' => 'E2',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 621,
                'jenis_parameter' => '240',
                'class' => 'E3',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 622,
                'jenis_parameter' => '241',
                'class' => '1',
                'parameter' => '0.14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 623,
                'jenis_parameter' => '241',
                'class' => '2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 624,
                'jenis_parameter' => '241',
                'class' => '3',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 625,
                'jenis_parameter' => '241',
                'class' => 'E1',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 626,
                'jenis_parameter' => '241',
                'class' => 'E2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 627,
                'jenis_parameter' => '241',
                'class' => 'E3',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 628,
                'jenis_parameter' => '242',
                'class' => '1',
                'parameter' => '1.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 629,
                'jenis_parameter' => '242',
                'class' => '2',
                'parameter' => '2.9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 630,
                'jenis_parameter' => '242',
                'class' => '3',
                'parameter' => '8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 631,
                'jenis_parameter' => '242',
                'class' => 'E1',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 632,
                'jenis_parameter' => '242',
                'class' => 'E2',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 633,
                'jenis_parameter' => '242',
                'class' => 'E3',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 634,
                'jenis_parameter' => '243',
                'class' => '1',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 635,
                'jenis_parameter' => '243',
                'class' => '2',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 636,
                'jenis_parameter' => '243',
                'class' => '3',
                'parameter' => '14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 637,
                'jenis_parameter' => '243',
                'class' => 'E1',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 638,
                'jenis_parameter' => '243',
                'class' => 'E2',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 639,
                'jenis_parameter' => '243',
                'class' => 'E3',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 640,
                'jenis_parameter' => '244',
                'class' => '1',
                'parameter' => '2.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 641,
                'jenis_parameter' => '244',
                'class' => '2',
                'parameter' => '8.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 642,
                'jenis_parameter' => '244',
                'class' => '3',
                'parameter' => '12',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 643,
                'jenis_parameter' => '244',
                'class' => 'E1',
                'parameter' => '1.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 644,
                'jenis_parameter' => '244',
                'class' => 'E2',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 645,
                'jenis_parameter' => '244',
                'class' => 'E3',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 646,
                'jenis_parameter' => '245',
                'class' => '1',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 647,
                'jenis_parameter' => '245',
                'class' => '2',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 648,
                'jenis_parameter' => '245',
                'class' => '3',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 649,
                'jenis_parameter' => '245',
                'class' => 'E1',
                'parameter' => '16',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 650,
                'jenis_parameter' => '245',
                'class' => 'E2',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 651,
                'jenis_parameter' => '245',
                'class' => 'E3',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 652,
                'jenis_parameter' => '246',
                'class' => '1',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 653,
                'jenis_parameter' => '246',
                'class' => '2',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 654,
                'jenis_parameter' => '246',
                'class' => '3',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 655,
                'jenis_parameter' => '246',
                'class' => 'E1',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 656,
                'jenis_parameter' => '246',
                'class' => 'E2',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 657,
                'jenis_parameter' => '246',
                'class' => 'E3',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 658,
                'jenis_parameter' => '247',
                'class' => '1',
                'parameter' => '27',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 659,
                'jenis_parameter' => '247',
                'class' => '2',
                'parameter' => '27',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 660,
                'jenis_parameter' => '247',
                'class' => '3',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 661,
                'jenis_parameter' => '247',
                'class' => 'E1',
                'parameter' => '27',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 662,
                'jenis_parameter' => '247',
                'class' => 'E2',
                'parameter' => '27',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 663,
                'jenis_parameter' => '247',
                'class' => 'E3',
                'parameter' => '27',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 664,
                'jenis_parameter' => '248',
                'class' => '1',
                'parameter' => '0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 665,
                'jenis_parameter' => '248',
                'class' => '2',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 666,
                'jenis_parameter' => '248',
                'class' => '3',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 667,
                'jenis_parameter' => '248',
                'class' => 'E1',
                'parameter' => '0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 668,
                'jenis_parameter' => '248',
                'class' => 'E2',
                'parameter' => '0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 669,
                'jenis_parameter' => '248',
                'class' => 'E3',
                'parameter' => '0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 670,
                'jenis_parameter' => '249',
                'class' => '1',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 671,
                'jenis_parameter' => '249',
                'class' => '2',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 672,
                'jenis_parameter' => '249',
                'class' => '3',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 673,
                'jenis_parameter' => '249',
                'class' => 'E1',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 674,
                'jenis_parameter' => '249',
                'class' => 'E2',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 675,
                'jenis_parameter' => '249',
                'class' => 'E3',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 676,
                'jenis_parameter' => '250',
                'class' => '1',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 677,
                'jenis_parameter' => '250',
                'class' => '2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 678,
                'jenis_parameter' => '250',
                'class' => '3',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 679,
                'jenis_parameter' => '250',
                'class' => 'E1',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 680,
                'jenis_parameter' => '250',
                'class' => 'E2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 681,
                'jenis_parameter' => '250',
                'class' => 'E3',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 682,
                'jenis_parameter' => '251',
                'class' => '1',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 683,
                'jenis_parameter' => '251',
                'class' => '2',
                'parameter' => '0.14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 684,
                'jenis_parameter' => '251',
                'class' => '3',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 685,
                'jenis_parameter' => '251',
                'class' => 'E1',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 686,
                'jenis_parameter' => '251',
                'class' => 'E2',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 687,
                'jenis_parameter' => '251',
                'class' => 'E3',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 688,
                'jenis_parameter' => '252',
                'class' => '1',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 689,
                'jenis_parameter' => '252',
                'class' => '2',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 690,
                'jenis_parameter' => '252',
                'class' => '3',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 691,
                'jenis_parameter' => '252',
                'class' => 'E1',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 692,
                'jenis_parameter' => '252',
                'class' => 'E2',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 693,
                'jenis_parameter' => '252',
                'class' => 'E3',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 694,
                'jenis_parameter' => '253',
                'class' => '1',
                'parameter' => 'sama dan kurang dari 2Ã‚Â°C bertambah melebihi ambien maksimum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 695,
                'jenis_parameter' => '253',
                'class' => '2',
                'parameter' => 'sama dan kurang dari 2Ã‚Â°C bertambah melebihi ambien maksimum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 696,
                'jenis_parameter' => '253',
                'class' => '3',
                'parameter' => 'sama dan kurang dari 2Ã‚Â°C bertambah melebihi ambien maksimum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 697,
                'jenis_parameter' => '253',
                'class' => 'E1',
                'parameter' => 'sama dan kurang dari 2Ã‚Â°C bertambah melebihi ambien maksimum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 698,
                'jenis_parameter' => '253',
                'class' => 'E2',
                'parameter' => 'sama dan kurang dari 2Ã‚Â°C bertambah melebihi ambien maksimum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 699,
                'jenis_parameter' => '253',
                'class' => 'E3',
                'parameter' => 'sama dan kurang dari 2Ã‚Â°C bertambah melebihi ambien maksimum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 700,
                'jenis_parameter' => '254',
                'class' => '1',
                'parameter' => '6.5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 701,
                'jenis_parameter' => '254',
                'class' => '2',
                'parameter' => '6.5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 702,
                'jenis_parameter' => '254',
                'class' => '3',
                'parameter' => '6.5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 703,
                'jenis_parameter' => '254',
                'class' => 'E1',
                'parameter' => '6.5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 704,
                'jenis_parameter' => '254',
                'class' => 'E2',
                'parameter' => '6.5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 705,
                'jenis_parameter' => '254',
                'class' => 'E3',
                'parameter' => '6.5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 706,
                'jenis_parameter' => '255',
                'class' => '1',
                'parameter' => 'Bebas dari marine litter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 707,
                'jenis_parameter' => '255',
                'class' => '2',
                'parameter' => 'Bebas dari marine litter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 708,
                'jenis_parameter' => '255',
                'class' => '3',
                'parameter' => 'Bebas dari marine litter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 709,
                'jenis_parameter' => '255',
                'class' => 'E1',
                'parameter' => 'Bebas dari marine litter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 710,
                'jenis_parameter' => '255',
                'class' => 'E2',
                'parameter' => 'Bebas dari marine litter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 711,
                'jenis_parameter' => '255',
                'class' => 'E3',
                'parameter' => 'Bebas dari marine litter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 712,
                'jenis_parameter' => '256',
                'class' => '',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 713,
                'jenis_parameter' => '257',
                'class' => '',
                'parameter' => '5000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 714,
                'jenis_parameter' => '258',
                'class' => '',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 715,
                'jenis_parameter' => '259',
                'class' => '',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 716,
                'jenis_parameter' => '260',
                'class' => '',
                'parameter' => '0.2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 717,
                'jenis_parameter' => '261',
                'class' => '',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 718,
                'jenis_parameter' => '262',
                'class' => '',
                'parameter' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 719,
                'jenis_parameter' => '263',
                'class' => '',
                'parameter' => '5.7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 720,
                'jenis_parameter' => '264',
                'class' => '',
                'parameter' => '0.011',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 721,
                'jenis_parameter' => '265',
                'class' => '',
                'parameter' => '0.6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 722,
                'jenis_parameter' => '266',
                'class' => '',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 723,
                'jenis_parameter' => '267',
                'class' => '',
                'parameter' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 724,
                'jenis_parameter' => '268',
                'class' => '',
                'parameter' => '0.0004',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 725,
                'jenis_parameter' => '269',
                'class' => 'Sentuhan Prima',
                'parameter' => '35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 726,
                'jenis_parameter' => '539',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '230',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 727,
                'jenis_parameter' => '270',
                'class' => 'Sentuhan Prima',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 728,
                'jenis_parameter' => '540',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 729,
                'jenis_parameter' => '272',
                'class' => 'Sentuhan Prima',
                'parameter' => '15000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 730,
                'jenis_parameter' => '541',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '15000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 731,
                'jenis_parameter' => '273',
                'class' => 'Sentuhan Prima',
                'parameter' => '5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 732,
                'jenis_parameter' => '542',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '5 - 9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 733,
                'jenis_parameter' => '274',
                'class' => 'Sentuhan Prima',
                'parameter' => '15 - 35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 734,
                'jenis_parameter' => '543',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '15 - 35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 735,
                'jenis_parameter' => '278',
                'class' => 'Sentuhan Prima',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 736,
                'jenis_parameter' => '544',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 737,
                'jenis_parameter' => '279',
                'class' => 'A',
                'parameter' => '100-200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 738,
                'jenis_parameter' => '279',
                'class' => 'B',
                'parameter' => '150-300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 739,
                'jenis_parameter' => '279',
                'class' => 'C',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 740,
                'jenis_parameter' => '279',
                'class' => 'D',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 741,
                'jenis_parameter' => '280',
                'class' => 'A',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 742,
                'jenis_parameter' => '280',
                'class' => 'B',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 743,
                'jenis_parameter' => '280',
                'class' => 'C',
                'parameter' => '2000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 744,
                'jenis_parameter' => '280',
                'class' => 'D',
                'parameter' => '5000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 745,
                'jenis_parameter' => '281',
                'class' => 'A',
                'parameter' => 'No value determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 746,
                'jenis_parameter' => '281',
                'class' => 'B',
                'parameter' => 'No value determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 747,
                'jenis_parameter' => '281',
                'class' => 'C',
                'parameter' => '<1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 748,
                'jenis_parameter' => '281',
                'class' => 'D',
                'parameter' => '>1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 749,
                'jenis_parameter' => '282',
                'class' => 'A',
                'parameter' => 'Not Visible',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 750,
                'jenis_parameter' => '282',
                'class' => 'B',
                'parameter' => 'Not Visible',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 751,
                'jenis_parameter' => '282',
                'class' => 'C',
                'parameter' => 'Not Visible',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 752,
                'jenis_parameter' => '282',
                'class' => 'D',
                'parameter' => 'Not Visible',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 753,
                'jenis_parameter' => '283',
                'class' => 'A',
                'parameter' => '6.3 - 7.8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 754,
                'jenis_parameter' => '283',
                'class' => 'B',
                'parameter' => '5.5 - 8.7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 755,
                'jenis_parameter' => '283',
                'class' => 'C',
                'parameter' => '4.5 - 10.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 756,
                'jenis_parameter' => '283',
                'class' => 'D',
                'parameter' => '3.3 - 10.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 757,
                'jenis_parameter' => '284',
                'class' => 'A',
                'parameter' => '80 -100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 758,
                'jenis_parameter' => '284',
                'class' => 'B',
                'parameter' => '70 - 110',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 759,
                'jenis_parameter' => '284',
                'class' => 'C',
                'parameter' => '55 - 130',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 760,
                'jenis_parameter' => '284',
                'class' => 'D',
                'parameter' => '40 - 130',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 761,
                'jenis_parameter' => '285',
                'class' => 'A',
                'parameter' => 'No Obvious Odour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 762,
                'jenis_parameter' => '285',
                'class' => 'B',
                'parameter' => 'No Obvious Odour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 763,
                'jenis_parameter' => '285',
                'class' => 'C',
                'parameter' => 'No Obvious Odour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 764,
                'jenis_parameter' => '285',
                'class' => 'D',
                'parameter' => 'No Obvious Odour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 765,
                'jenis_parameter' => '286',
                'class' => 'A',
                'parameter' => '6.5 - 8.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 766,
                'jenis_parameter' => '286',
                'class' => 'B',
                'parameter' => '6.5 - 8.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 767,
                'jenis_parameter' => '286',
                'class' => 'C',
                'parameter' => '6.0 - 9.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 768,
                'jenis_parameter' => '286',
                'class' => 'D',
                'parameter' => '5.5 - 9.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 769,
                'jenis_parameter' => '287',
                'class' => 'A',
                'parameter' => 'No Obvious Taste',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 770,
                'jenis_parameter' => '287',
                'class' => 'B',
                'parameter' => 'No Obvious Taste',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 771,
                'jenis_parameter' => '287',
                'class' => 'C',
                'parameter' => 'No Obvious Taste',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 772,
                'jenis_parameter' => '287',
                'class' => 'D',
                'parameter' => 'No Obvious Taste',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 773,
                'jenis_parameter' => '288',
                'class' => 'A',
                'parameter' => '28',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 774,
                'jenis_parameter' => '288',
                'class' => 'B',
                'parameter' => '28',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 775,
                'jenis_parameter' => '288',
                'class' => 'C',
                'parameter' => '28',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 776,
                'jenis_parameter' => '288',
                'class' => 'D',
                'parameter' => '28',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 777,
                'jenis_parameter' => '289',
                'class' => 'A',
                'parameter' => '<100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 778,
                'jenis_parameter' => '289',
                'class' => 'B',
                'parameter' => '100 - 500',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 779,
                'jenis_parameter' => '289',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 780,
                'jenis_parameter' => '289',
                'class' => 'D',
                'parameter' => '>200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 781,
                'jenis_parameter' => '290',
                'class' => 'A',
                'parameter' => '40',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 782,
                'jenis_parameter' => '290',
                'class' => 'B',
                'parameter' => '40 - 170',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 783,
                'jenis_parameter' => '290',
                'class' => 'C',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 784,
                'jenis_parameter' => '290',
                'class' => 'D',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 785,
                'jenis_parameter' => '291',
                'class' => 'A',
                'parameter' => '0.6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 786,
                'jenis_parameter' => '291',
                'class' => 'B',
                'parameter' => '0.6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 787,
                'jenis_parameter' => '291',
                'class' => 'C',
                'parameter' => '0.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 788,
                'jenis_parameter' => '291',
                'class' => 'D',
                'parameter' => '0.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 789,
                'jenis_parameter' => '292',
                'class' => 'A',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 790,
                'jenis_parameter' => '292',
                'class' => 'B',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 791,
                'jenis_parameter' => '292',
                'class' => 'C',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 792,
                'jenis_parameter' => '292',
                'class' => 'D',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 793,
                'jenis_parameter' => '293',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 794,
                'jenis_parameter' => '293',
                'class' => 'B',
                'parameter' => '0.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 795,
                'jenis_parameter' => '293',
                'class' => 'C',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 796,
                'jenis_parameter' => '293',
                'class' => 'D',
                'parameter' => '2.7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 797,
                'jenis_parameter' => '294',
                'class' => 'A',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 798,
                'jenis_parameter' => '294',
                'class' => 'B',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 799,
                'jenis_parameter' => '294',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 800,
                'jenis_parameter' => '294',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 801,
                'jenis_parameter' => '295',
                'class' => 'A',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 802,
                'jenis_parameter' => '295',
                'class' => 'B',
                'parameter' => '0.035',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 803,
                'jenis_parameter' => '295',
                'class' => 'C',
                'parameter' => '0.035',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 804,
                'jenis_parameter' => '295',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 805,
                'jenis_parameter' => '296',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 806,
                'jenis_parameter' => '296',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 807,
                'jenis_parameter' => '296',
                'class' => 'C',
                'parameter' => '0.15',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 808,
                'jenis_parameter' => '296',
                'class' => 'D',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 809,
                'jenis_parameter' => '297',
                'class' => 'A',
                'parameter' => '0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 810,
                'jenis_parameter' => '297',
                'class' => 'B',
                'parameter' => '0.002',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 811,
                'jenis_parameter' => '297',
                'class' => 'C',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 812,
                'jenis_parameter' => '297',
                'class' => 'D',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 813,
                'jenis_parameter' => '298',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 814,
                'jenis_parameter' => '298',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 815,
                'jenis_parameter' => '298',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 816,
                'jenis_parameter' => '298',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 817,
                'jenis_parameter' => '299',
                'class' => 'A',
                'parameter' => '<0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 818,
                'jenis_parameter' => '299',
                'class' => 'B',
                'parameter' => '<0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 819,
                'jenis_parameter' => '299',
                'class' => 'C',
                'parameter' => '<0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 820,
                'jenis_parameter' => '299',
                'class' => 'D',
                'parameter' => '<0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 821,
                'jenis_parameter' => '300',
                'class' => 'A',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 822,
                'jenis_parameter' => '300',
                'class' => 'B',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 823,
                'jenis_parameter' => '300',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 824,
                'jenis_parameter' => '300',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 825,
                'jenis_parameter' => '301',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 826,
                'jenis_parameter' => '301',
                'class' => 'B',
                'parameter' => '15',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 827,
                'jenis_parameter' => '301',
                'class' => 'C',
                'parameter' => '15',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 828,
                'jenis_parameter' => '301',
                'class' => 'D',
                'parameter' => '25',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 829,
                'jenis_parameter' => '302',
                'class' => 'A',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 830,
                'jenis_parameter' => '302',
                'class' => 'B',
                'parameter' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 831,
                'jenis_parameter' => '302',
                'class' => 'C',
                'parameter' => '6',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 832,
                'jenis_parameter' => '302',
                'class' => 'D',
                'parameter' => '8',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 833,
                'jenis_parameter' => '303',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 834,
                'jenis_parameter' => '303',
                'class' => 'B',
                'parameter' => '25',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 835,
                'jenis_parameter' => '303',
                'class' => 'C',
                'parameter' => '25',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 836,
                'jenis_parameter' => '303',
                'class' => 'D',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 837,
                'jenis_parameter' => '304',
                'class' => 'A',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 838,
                'jenis_parameter' => '304',
                'class' => 'B',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 839,
                'jenis_parameter' => '304',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 840,
                'jenis_parameter' => '304',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 841,
                'jenis_parameter' => '305',
                'class' => 'A',
                'parameter' => '5000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 842,
                'jenis_parameter' => '305',
                'class' => 'B',
                'parameter' => '5000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 843,
                'jenis_parameter' => '305',
                'class' => 'C',
                'parameter' => '5000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 844,
                'jenis_parameter' => '305',
                'class' => 'D',
                'parameter' => '5000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 845,
                'jenis_parameter' => '306',
                'class' => 'A',
                'parameter' => '600',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 846,
                'jenis_parameter' => '306',
                'class' => 'B',
                'parameter' => '600',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 847,
                'jenis_parameter' => '306',
                'class' => 'C',
                'parameter' => '3000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 848,
                'jenis_parameter' => '306',
                'class' => 'D',
                'parameter' => '3000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 849,
                'jenis_parameter' => '307',
                'class' => 'A',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 850,
                'jenis_parameter' => '307',
                'class' => 'B',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 851,
                'jenis_parameter' => '307',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 852,
                'jenis_parameter' => '307',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 853,
                'jenis_parameter' => '308',
                'class' => 'A',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 854,
                'jenis_parameter' => '308',
                'class' => 'B',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 855,
                'jenis_parameter' => '308',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 856,
                'jenis_parameter' => '308',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 857,
                'jenis_parameter' => '309',
                'class' => 'A',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 858,
                'jenis_parameter' => '309',
                'class' => 'B',
                'parameter' => 'Not Detected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 859,
                'jenis_parameter' => '309',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 860,
                'jenis_parameter' => '309',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 861,
                'jenis_parameter' => '400',
                'class' => 'A',
                'parameter' => '33',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 862,
                'jenis_parameter' => '400',
                'class' => 'B',
                'parameter' => '230',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 863,
                'jenis_parameter' => '400',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 864,
                'jenis_parameter' => '400',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 865,
                'jenis_parameter' => '401',
                'class' => 'A',
                'parameter' => '15000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 866,
                'jenis_parameter' => '401',
                'class' => 'B',
                'parameter' => '15000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 867,
                'jenis_parameter' => '401',
                'class' => 'C',
                'parameter' => '15000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 868,
                'jenis_parameter' => '401',
                'class' => 'D',
                'parameter' => '15000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 869,
                'jenis_parameter' => '402',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 870,
                'jenis_parameter' => '402',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 871,
                'jenis_parameter' => '402',
                'class' => 'C',
            'parameter' => '<10 mg/L Waterbody is highly sensitive to acid inputs (<4 mg/L dissolved calcium),
10-20 mg/L Waterbody is moderately sensitive to acid inputs (4-8 mg/L dissolved calcium),
>20 mg/L Waterbody has low sensitivity to acid inputs (>8 mg/L dissolved calcium)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 872,
                'jenis_parameter' => '402',
                'class' => 'D',
            'parameter' => '<10 mg/L Waterbody is highly sensitive to acid inputs (<4 mg/L dissolved calcium),
10-20 mg/L Waterbody is moderately sensitive to acid inputs (4-8 mg/L dissolved calcium),
>20 mg/L Waterbody has low sensitivity to acid inputs (>8 mg/L dissolved calcium)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 873,
                'jenis_parameter' => '73',
                'class' => 'A',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 874,
                'jenis_parameter' => '73',
                'class' => 'B',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 875,
                'jenis_parameter' => '73',
                'class' => 'C',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 876,
                'jenis_parameter' => '73',
                'class' => 'D',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 877,
                'jenis_parameter' => '74',
                'class' => 'A',
                'parameter' => '1.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 878,
                'jenis_parameter' => '74',
                'class' => 'B',
                'parameter' => '1.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 879,
                'jenis_parameter' => '74',
                'class' => 'C',
                'parameter' => '1.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 880,
                'jenis_parameter' => '74',
                'class' => 'D',
                'parameter' => '1.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 881,
                'jenis_parameter' => '75',
                'class' => 'A',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 882,
                'jenis_parameter' => '75',
                'class' => 'B',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 883,
                'jenis_parameter' => '75',
                'class' => 'C',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 884,
                'jenis_parameter' => '75',
                'class' => 'D',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 885,
                'jenis_parameter' => '76',
                'class' => 'A',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 886,
                'jenis_parameter' => '76',
                'class' => 'B',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 887,
                'jenis_parameter' => '76',
                'class' => 'C',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 888,
                'jenis_parameter' => '76',
                'class' => 'D',
                'parameter' => '1.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 889,
                'jenis_parameter' => '77',
                'class' => 'A',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 890,
                'jenis_parameter' => '77',
                'class' => 'B',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 891,
                'jenis_parameter' => '77',
                'class' => 'C',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 892,
                'jenis_parameter' => '77',
                'class' => 'D',
                'parameter' => '0.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 893,
                'jenis_parameter' => '78',
                'class' => 'A',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 894,
                'jenis_parameter' => '78',
                'class' => 'B',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 895,
                'jenis_parameter' => '78',
                'class' => 'C',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 896,
                'jenis_parameter' => '78',
                'class' => 'D',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 897,
                'jenis_parameter' => '79',
                'class' => 'A',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 898,
                'jenis_parameter' => '79',
                'class' => 'B',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 899,
                'jenis_parameter' => '79',
                'class' => 'C',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 900,
                'jenis_parameter' => '79',
                'class' => 'D',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 901,
                'jenis_parameter' => '80',
                'class' => 'A',
                'parameter' => '0.35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 902,
                'jenis_parameter' => '80',
                'class' => 'B',
                'parameter' => '0.35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 903,
                'jenis_parameter' => '80',
                'class' => 'C',
                'parameter' => '0.35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 904,
                'jenis_parameter' => '80',
                'class' => 'D',
                'parameter' => '0.35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 905,
                'jenis_parameter' => '81',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 906,
                'jenis_parameter' => '81',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 907,
                'jenis_parameter' => '81',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 908,
                'jenis_parameter' => '81',
                'class' => 'D',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 909,
                'jenis_parameter' => '82',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 910,
                'jenis_parameter' => '82',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 911,
                'jenis_parameter' => '82',
                'class' => 'C',
            'parameter' => '<10 mg/L Waterbody is highly sensitive to acid inputs (<4 mg/L dissolved calcium),
10-20 mg/L Waterbody is moderately sensitive to acid inputs (4-8 mg/L dissolved calcium),
>20 mg/L Waterbody has low sensitivity to acid inputs (>8 mg/L dissolved calcium)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 912,
                'jenis_parameter' => '82',
                'class' => 'D',
            'parameter' => '<10 mg/L Waterbody is highly sensitive to acid inputs (<4 mg/L dissolved calcium),
10-20 mg/L Waterbody is moderately sensitive to acid inputs (4-8 mg/L dissolved calcium),
>20 mg/L Waterbody has low sensitivity to acid inputs (>8 mg/L dissolved calcium)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 913,
                'jenis_parameter' => '83',
                'class' => 'A',
                'parameter' => '150',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 914,
                'jenis_parameter' => '83',
                'class' => 'B',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 915,
                'jenis_parameter' => '83',
                'class' => 'C',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 916,
                'jenis_parameter' => '83',
                'class' => 'D',
                'parameter' => '2000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 917,
                'jenis_parameter' => '84',
                'class' => 'A',
                'parameter' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 918,
                'jenis_parameter' => '84',
                'class' => 'B',
                'parameter' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 919,
                'jenis_parameter' => '84',
                'class' => 'C',
                'parameter' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 920,
                'jenis_parameter' => '84',
                'class' => 'D',
                'parameter' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 921,
                'jenis_parameter' => '85',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 922,
                'jenis_parameter' => '85',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 923,
                'jenis_parameter' => '85',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 924,
                'jenis_parameter' => '85',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 925,
                'jenis_parameter' => '86',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 926,
                'jenis_parameter' => '86',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 927,
                'jenis_parameter' => '86',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 928,
                'jenis_parameter' => '86',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 929,
                'jenis_parameter' => '87',
                'class' => 'A',
                'parameter' => '0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 930,
                'jenis_parameter' => '87',
                'class' => 'B',
                'parameter' => '0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 931,
                'jenis_parameter' => '87',
                'class' => 'C',
                'parameter' => '0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 932,
                'jenis_parameter' => '87',
                'class' => 'D',
                'parameter' => '0.03',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 933,
                'jenis_parameter' => '88',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 934,
                'jenis_parameter' => '88',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 935,
                'jenis_parameter' => '88',
                'class' => 'C',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 936,
                'jenis_parameter' => '88',
                'class' => 'D',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 937,
                'jenis_parameter' => '89',
                'class' => 'A',
                'parameter' => '0.004',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 938,
                'jenis_parameter' => '89',
                'class' => 'B',
                'parameter' => '0.004',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 939,
                'jenis_parameter' => '89',
                'class' => 'C',
                'parameter' => '0.004',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 940,
                'jenis_parameter' => '89',
                'class' => 'D',
                'parameter' => '0.004',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 941,
                'jenis_parameter' => '90',
                'class' => 'A',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 942,
                'jenis_parameter' => '90',
                'class' => 'B',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 943,
                'jenis_parameter' => '90',
                'class' => 'C',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 944,
                'jenis_parameter' => '90',
                'class' => 'D',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 945,
                'jenis_parameter' => '91',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 946,
                'jenis_parameter' => '91',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 947,
                'jenis_parameter' => '91',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 948,
                'jenis_parameter' => '91',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 949,
                'jenis_parameter' => '92',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 950,
                'jenis_parameter' => '92',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 951,
                'jenis_parameter' => '92',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 952,
                'jenis_parameter' => '92',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 953,
                'jenis_parameter' => '93',
                'class' => 'A',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 954,
                'jenis_parameter' => '93',
                'class' => 'B',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 955,
                'jenis_parameter' => '93',
                'class' => 'C',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 956,
                'jenis_parameter' => '93',
                'class' => 'D',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 957,
                'jenis_parameter' => '94',
                'class' => 'A',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 958,
                'jenis_parameter' => '94',
                'class' => 'B',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 959,
                'jenis_parameter' => '94',
                'class' => 'C',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 960,
                'jenis_parameter' => '94',
                'class' => 'D',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 961,
                'jenis_parameter' => '95',
                'class' => 'A',
                'parameter' => '150',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 962,
                'jenis_parameter' => '95',
                'class' => 'B',
                'parameter' => '150',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 963,
                'jenis_parameter' => '95',
                'class' => 'C',
                'parameter' => '150',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 964,
                'jenis_parameter' => '95',
                'class' => 'D',
                'parameter' => '150',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 965,
                'jenis_parameter' => '96',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 966,
                'jenis_parameter' => '96',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 967,
                'jenis_parameter' => '96',
                'class' => 'C',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 968,
                'jenis_parameter' => '96',
                'class' => 'D',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 969,
                'jenis_parameter' => '97',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 970,
                'jenis_parameter' => '97',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 971,
                'jenis_parameter' => '97',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 972,
                'jenis_parameter' => '97',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 973,
                'jenis_parameter' => '98',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 974,
                'jenis_parameter' => '98',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 975,
                'jenis_parameter' => '98',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 976,
                'jenis_parameter' => '98',
                'class' => 'D',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 977,
                'jenis_parameter' => '99',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 978,
                'jenis_parameter' => '99',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 979,
                'jenis_parameter' => '99',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 980,
                'jenis_parameter' => '99',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 981,
                'jenis_parameter' => '100',
                'class' => 'A',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 982,
                'jenis_parameter' => '100',
                'class' => 'B',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 983,
                'jenis_parameter' => '100',
                'class' => 'C',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 984,
                'jenis_parameter' => '100',
                'class' => 'D',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 985,
                'jenis_parameter' => '101',
                'class' => 'A',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 986,
                'jenis_parameter' => '101',
                'class' => 'B',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 987,
                'jenis_parameter' => '101',
                'class' => 'C',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 988,
                'jenis_parameter' => '101',
                'class' => 'D',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 989,
                'jenis_parameter' => '102',
                'class' => 'A',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 990,
                'jenis_parameter' => '102',
                'class' => 'B',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 991,
                'jenis_parameter' => '102',
                'class' => 'C',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 992,
                'jenis_parameter' => '102',
                'class' => 'D',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 993,
                'jenis_parameter' => '103',
                'class' => 'A',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 994,
                'jenis_parameter' => '103',
                'class' => 'B',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 995,
                'jenis_parameter' => '103',
                'class' => 'C',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 996,
                'jenis_parameter' => '103',
                'class' => 'D',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 997,
                'jenis_parameter' => '104',
                'class' => 'A',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 998,
                'jenis_parameter' => '104',
                'class' => 'B',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 999,
                'jenis_parameter' => '104',
                'class' => 'C',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 1000,
                'jenis_parameter' => '104',
                'class' => 'D',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('master_standard')->insert(array (
            0 => 
            array (
                'id' => 1001,
                'jenis_parameter' => '105',
                'class' => 'A',
                'parameter' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1002,
                'jenis_parameter' => '105',
                'class' => 'B',
                'parameter' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 1003,
                'jenis_parameter' => '105',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 1004,
                'jenis_parameter' => '105',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 1005,
                'jenis_parameter' => '106',
                'class' => 'A',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 1006,
                'jenis_parameter' => '106',
                'class' => 'B',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 1007,
                'jenis_parameter' => '106',
                'class' => 'C',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 1008,
                'jenis_parameter' => '106',
                'class' => 'D',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 1009,
                'jenis_parameter' => '107',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 1010,
                'jenis_parameter' => '107',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 1011,
                'jenis_parameter' => '107',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 1012,
                'jenis_parameter' => '107',
                'class' => 'D',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 1013,
                'jenis_parameter' => '108',
                'class' => 'A',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 1014,
                'jenis_parameter' => '108',
                'class' => 'B',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 1015,
                'jenis_parameter' => '108',
                'class' => 'C',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 1016,
                'jenis_parameter' => '108',
                'class' => 'D',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 1017,
                'jenis_parameter' => '109',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 1018,
                'jenis_parameter' => '109',
                'class' => 'B',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 1019,
                'jenis_parameter' => '109',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 1020,
                'jenis_parameter' => '109',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 1021,
                'jenis_parameter' => '110',
                'class' => 'A',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 1022,
                'jenis_parameter' => '110',
                'class' => 'B',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 1023,
                'jenis_parameter' => '110',
                'class' => 'C',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 1024,
                'jenis_parameter' => '110',
                'class' => 'D',
                'parameter' => '0.02',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 1025,
                'jenis_parameter' => '111',
                'class' => 'A',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 1026,
                'jenis_parameter' => '111',
                'class' => 'B',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 1027,
                'jenis_parameter' => '111',
                'class' => 'C',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 1028,
                'jenis_parameter' => '111',
                'class' => 'D',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 1029,
                'jenis_parameter' => '112',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 1030,
                'jenis_parameter' => '112',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 1031,
                'jenis_parameter' => '112',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 1032,
                'jenis_parameter' => '112',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 1033,
                'jenis_parameter' => '113',
                'class' => 'A',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 1034,
                'jenis_parameter' => '113',
                'class' => 'B',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 1035,
                'jenis_parameter' => '113',
                'class' => 'C',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 1036,
                'jenis_parameter' => '113',
                'class' => 'D',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 1037,
                'jenis_parameter' => '114',
                'class' => 'A',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 1038,
                'jenis_parameter' => '114',
                'class' => 'B',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 1039,
                'jenis_parameter' => '114',
                'class' => 'C',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 1040,
                'jenis_parameter' => '114',
                'class' => 'D',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 1041,
                'jenis_parameter' => '115',
                'class' => 'A',
                'parameter' => '500',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 1042,
                'jenis_parameter' => '115',
                'class' => 'B',
                'parameter' => '500',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 1043,
                'jenis_parameter' => '115',
                'class' => 'C',
                'parameter' => '500',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 1044,
                'jenis_parameter' => '115',
                'class' => 'D',
                'parameter' => '500',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 1045,
                'jenis_parameter' => '116',
                'class' => 'A',
                'parameter' => '0.08',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 1046,
                'jenis_parameter' => '116',
                'class' => 'B',
                'parameter' => '0.08',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 1047,
                'jenis_parameter' => '116',
                'class' => 'C',
                'parameter' => '0.08',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 1048,
                'jenis_parameter' => '116',
                'class' => 'D',
                'parameter' => '0.08',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 1049,
                'jenis_parameter' => '117',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 1050,
                'jenis_parameter' => '117',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 1051,
                'jenis_parameter' => '117',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 1052,
                'jenis_parameter' => '117',
                'class' => 'D',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 1053,
                'jenis_parameter' => '118',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 1054,
                'jenis_parameter' => '118',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 1055,
                'jenis_parameter' => '118',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 1056,
                'jenis_parameter' => '118',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 1057,
                'jenis_parameter' => '119',
                'class' => 'A',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 1058,
                'jenis_parameter' => '119',
                'class' => 'B',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 1059,
                'jenis_parameter' => '119',
                'class' => 'C',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 1060,
                'jenis_parameter' => '119',
                'class' => 'D',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 1061,
                'jenis_parameter' => '120',
                'class' => 'A',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 1062,
                'jenis_parameter' => '120',
                'class' => 'B',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 1063,
                'jenis_parameter' => '120',
                'class' => 'C',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 1064,
                'jenis_parameter' => '120',
                'class' => 'D',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 1065,
                'jenis_parameter' => '121',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 1066,
                'jenis_parameter' => '121',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 1067,
                'jenis_parameter' => '121',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 1068,
                'jenis_parameter' => '121',
                'class' => 'D',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 1069,
                'jenis_parameter' => '122',
                'class' => 'A',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 1070,
                'jenis_parameter' => '122',
                'class' => 'B',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 1071,
                'jenis_parameter' => '122',
                'class' => 'C',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 1072,
                'jenis_parameter' => '122',
                'class' => 'D',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 1073,
                'jenis_parameter' => '123',
                'class' => 'A',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 1074,
                'jenis_parameter' => '123',
                'class' => 'B',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 1075,
                'jenis_parameter' => '123',
                'class' => 'C',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 1076,
                'jenis_parameter' => '123',
                'class' => 'D',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 1077,
                'jenis_parameter' => '124',
                'class' => 'A',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 1078,
                'jenis_parameter' => '124',
                'class' => 'B',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 1079,
                'jenis_parameter' => '124',
                'class' => 'C',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 1080,
                'jenis_parameter' => '124',
                'class' => 'D',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 1081,
                'jenis_parameter' => '125',
                'class' => 'A',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 1082,
                'jenis_parameter' => '125',
                'class' => 'B',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 1083,
                'jenis_parameter' => '125',
                'class' => 'C',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 1084,
                'jenis_parameter' => '125',
                'class' => 'D',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 1085,
                'jenis_parameter' => '126',
                'class' => 'A',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 1086,
                'jenis_parameter' => '126',
                'class' => 'B',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 1087,
                'jenis_parameter' => '126',
                'class' => 'C',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 1088,
                'jenis_parameter' => '126',
                'class' => 'D',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 1089,
                'jenis_parameter' => '127',
                'class' => 'A',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 1090,
                'jenis_parameter' => '127',
                'class' => 'B',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 1091,
                'jenis_parameter' => '127',
                'class' => 'C',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 1092,
                'jenis_parameter' => '127',
                'class' => 'D',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 1093,
                'jenis_parameter' => '128',
                'class' => 'A',
                'parameter' => '7:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 1094,
                'jenis_parameter' => '128',
                'class' => 'B',
                'parameter' => '7:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 1095,
                'jenis_parameter' => '128',
                'class' => 'C',
                'parameter' => '7:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 1096,
                'jenis_parameter' => '128',
                'class' => 'D',
                'parameter' => '7:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 1097,
                'jenis_parameter' => '129',
                'class' => 'A',
                'parameter' => '0.04:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 1098,
                'jenis_parameter' => '129',
                'class' => 'B',
                'parameter' => '0.04:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 1099,
                'jenis_parameter' => '129',
                'class' => 'C',
                'parameter' => '0.04:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 1100,
                'jenis_parameter' => '129',
                'class' => 'D',
                'parameter' => '0.04:N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 1101,
                'jenis_parameter' => '130',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 1102,
                'jenis_parameter' => '130',
                'class' => 'B',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 1103,
                'jenis_parameter' => '130',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 1104,
                'jenis_parameter' => '130',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 1105,
                'jenis_parameter' => '131',
                'class' => 'A',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 1106,
                'jenis_parameter' => '131',
                'class' => 'B',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 1107,
                'jenis_parameter' => '131',
                'class' => 'C',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 1108,
                'jenis_parameter' => '131',
                'class' => 'D',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 1109,
                'jenis_parameter' => '132',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 1110,
                'jenis_parameter' => '132',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 1111,
                'jenis_parameter' => '132',
                'class' => 'C',
                'parameter' => '0.0001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 1112,
                'jenis_parameter' => '132',
                'class' => 'D',
                'parameter' => '0.0001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 1113,
                'jenis_parameter' => '133',
                'class' => 'A',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 1114,
                'jenis_parameter' => '133',
                'class' => 'B',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 1115,
                'jenis_parameter' => '133',
                'class' => 'C',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 1116,
                'jenis_parameter' => '133',
                'class' => 'D',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 1117,
                'jenis_parameter' => '134',
                'class' => 'A',
                'parameter' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 1118,
                'jenis_parameter' => '134',
                'class' => 'B',
                'parameter' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 1119,
                'jenis_parameter' => '134',
                'class' => 'C',
                'parameter' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 1120,
                'jenis_parameter' => '134',
                'class' => 'D',
                'parameter' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 1121,
                'jenis_parameter' => '135',
                'class' => 'A',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 1122,
                'jenis_parameter' => '135',
                'class' => 'B',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 1123,
                'jenis_parameter' => '135',
                'class' => 'C',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 1124,
                'jenis_parameter' => '135',
                'class' => 'D',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 1125,
                'jenis_parameter' => '136',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 1126,
                'jenis_parameter' => '136',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 1127,
                'jenis_parameter' => '136',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 1128,
                'jenis_parameter' => '136',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 1129,
                'jenis_parameter' => '137',
                'class' => 'A',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 1130,
                'jenis_parameter' => '137',
                'class' => 'B',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 1131,
                'jenis_parameter' => '137',
                'class' => 'C',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 1132,
                'jenis_parameter' => '137',
                'class' => 'D',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 1133,
                'jenis_parameter' => '138',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 1134,
                'jenis_parameter' => '138',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 1135,
                'jenis_parameter' => '138',
                'class' => 'C',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 1136,
                'jenis_parameter' => '138',
                'class' => 'D',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 1137,
                'jenis_parameter' => '139',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 1138,
                'jenis_parameter' => '139',
                'class' => 'B',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 1139,
                'jenis_parameter' => '139',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 1140,
                'jenis_parameter' => '139',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 1141,
                'jenis_parameter' => '140',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 1142,
                'jenis_parameter' => '140',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 1143,
                'jenis_parameter' => '140',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 1144,
                'jenis_parameter' => '140',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 1145,
                'jenis_parameter' => '141',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 1146,
                'jenis_parameter' => '141',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 1147,
                'jenis_parameter' => '141',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 1148,
                'jenis_parameter' => '141',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 1149,
                'jenis_parameter' => '142',
                'class' => 'A',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 1150,
                'jenis_parameter' => '142',
                'class' => 'B',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 1151,
                'jenis_parameter' => '142',
                'class' => 'C',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 1152,
                'jenis_parameter' => '142',
                'class' => 'D',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 1153,
                'jenis_parameter' => '143',
                'class' => 'A',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 1154,
                'jenis_parameter' => '143',
                'class' => 'B',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 1155,
                'jenis_parameter' => '143',
                'class' => 'C',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 1156,
                'jenis_parameter' => '143',
                'class' => 'D',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 1157,
                'jenis_parameter' => '144',
                'class' => 'A',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 1158,
                'jenis_parameter' => '144',
                'class' => 'B',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 1159,
                'jenis_parameter' => '144',
                'class' => 'C',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 1160,
                'jenis_parameter' => '144',
                'class' => 'D',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 1161,
                'jenis_parameter' => '145',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 1162,
                'jenis_parameter' => '145',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 1163,
                'jenis_parameter' => '145',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 1164,
                'jenis_parameter' => '145',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 1165,
                'jenis_parameter' => '146',
                'class' => 'A',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 1166,
                'jenis_parameter' => '146',
                'class' => 'B',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 1167,
                'jenis_parameter' => '146',
                'class' => 'C',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 1168,
                'jenis_parameter' => '146',
                'class' => 'D',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 1169,
                'jenis_parameter' => '147',
                'class' => 'A',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 1170,
                'jenis_parameter' => '147',
                'class' => 'B',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 1171,
                'jenis_parameter' => '147',
                'class' => 'C',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 1172,
                'jenis_parameter' => '147',
                'class' => 'D',
                'parameter' => '0.1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 1173,
                'jenis_parameter' => '148',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 1174,
                'jenis_parameter' => '148',
                'class' => 'B',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 1175,
                'jenis_parameter' => '148',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 1176,
                'jenis_parameter' => '148',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 1177,
                'jenis_parameter' => '149',
                'class' => 'A',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 1178,
                'jenis_parameter' => '149',
                'class' => 'B',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 1179,
                'jenis_parameter' => '149',
                'class' => 'C',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 1180,
                'jenis_parameter' => '149',
                'class' => 'D',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 1181,
                'jenis_parameter' => '150',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 1182,
                'jenis_parameter' => '150',
                'class' => 'B',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 1183,
                'jenis_parameter' => '150',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 1184,
                'jenis_parameter' => '150',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 1185,
                'jenis_parameter' => '151',
                'class' => 'A',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 1186,
                'jenis_parameter' => '151',
                'class' => 'B',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 1187,
                'jenis_parameter' => '151',
                'class' => 'C',
                'parameter' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 1188,
                'jenis_parameter' => '151',
                'class' => 'D',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 1189,
                'jenis_parameter' => '152',
                'class' => 'A',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 1190,
                'jenis_parameter' => '152',
                'class' => 'B',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 1191,
                'jenis_parameter' => '152',
                'class' => 'C',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 1192,
                'jenis_parameter' => '152',
                'class' => 'D',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 1193,
                'jenis_parameter' => '153',
                'class' => 'A',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 1194,
                'jenis_parameter' => '153',
                'class' => 'B',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 1195,
                'jenis_parameter' => '153',
                'class' => 'C',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 1196,
                'jenis_parameter' => '153',
                'class' => 'D',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 1197,
                'jenis_parameter' => '154',
                'class' => 'A',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 1198,
                'jenis_parameter' => '154',
                'class' => 'B',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 1199,
                'jenis_parameter' => '154',
                'class' => 'C',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 1200,
                'jenis_parameter' => '154',
                'class' => 'D',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 1201,
                'jenis_parameter' => '155',
                'class' => 'A',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 1202,
                'jenis_parameter' => '155',
                'class' => 'B',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 1203,
                'jenis_parameter' => '155',
                'class' => 'C',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 1204,
                'jenis_parameter' => '155',
                'class' => 'D',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 1205,
                'jenis_parameter' => '156',
                'class' => 'A',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 1206,
                'jenis_parameter' => '156',
                'class' => 'B',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 1207,
                'jenis_parameter' => '156',
                'class' => 'C',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 1208,
                'jenis_parameter' => '156',
                'class' => 'D',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 1209,
                'jenis_parameter' => '157',
                'class' => 'A',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 1210,
                'jenis_parameter' => '157',
                'class' => 'B',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 1211,
                'jenis_parameter' => '157',
                'class' => 'C',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 1212,
                'jenis_parameter' => '157',
                'class' => 'D',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 1213,
                'jenis_parameter' => '158',
                'class' => 'A',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 1214,
                'jenis_parameter' => '158',
                'class' => 'B',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 1215,
                'jenis_parameter' => '158',
                'class' => 'C',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 1216,
                'jenis_parameter' => '158',
                'class' => 'D',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 1217,
                'jenis_parameter' => '159',
                'class' => 'A',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 1218,
                'jenis_parameter' => '159',
                'class' => 'B',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 1219,
                'jenis_parameter' => '159',
                'class' => 'C',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 1220,
                'jenis_parameter' => '159',
                'class' => 'D',
                'parameter' => 'No Value Determined',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 1221,
                'jenis_parameter' => '403',
            'class' => 'IT-1 (2015)',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 1222,
                'jenis_parameter' => '405',
            'class' => 'IT-1 (2015)',
                'parameter' => '350',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 1223,
                'jenis_parameter' => '404',
            'class' => 'IT-1 (2015)',
                'parameter' => '350',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 1224,
                'jenis_parameter' => '406',
            'class' => 'IT-1 (2015)',
                'parameter' => '320',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 1225,
                'jenis_parameter' => '407',
            'class' => 'IT-1 (2015)',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 1226,
                'jenis_parameter' => '408',
            'class' => 'IT-1 (2015)',
                'parameter' => '35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 1227,
                'jenis_parameter' => '409',
            'class' => 'IT-1 (2015)',
                'parameter' => '150',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 1228,
                'jenis_parameter' => '410',
            'class' => 'IT-1 (2015)',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 1229,
                'jenis_parameter' => '411',
            'class' => 'IT-1 (2015)',
                'parameter' => '105',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 1230,
                'jenis_parameter' => '412',
            'class' => 'IT-1 (2015)',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 1231,
                'jenis_parameter' => '413',
            'class' => 'IT-1 (2015)',
                'parameter' => '120',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 1232,
                'jenis_parameter' => '414',
            'class' => 'IT-1 (2015)',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 1233,
                'jenis_parameter' => '403',
            'class' => 'IT-2 (2018)',
                'parameter' => '45',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 1234,
                'jenis_parameter' => '404',
            'class' => 'IT-2 (2018)',
                'parameter' => '25',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 1235,
                'jenis_parameter' => '405',
            'class' => 'IT-2 (2018)',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 1236,
                'jenis_parameter' => '406',
            'class' => 'IT-2 (2018)',
                'parameter' => '300',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 1237,
                'jenis_parameter' => '407',
            'class' => 'IT-2 (2018)',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 1238,
                'jenis_parameter' => '408',
            'class' => 'IT-2 (2018)',
                'parameter' => '35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 1239,
                'jenis_parameter' => '409',
            'class' => 'IT-2 (2018)',
                'parameter' => '120',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 1240,
                'jenis_parameter' => '410',
            'class' => 'IT-2 (2018)',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 1241,
                'jenis_parameter' => '411',
            'class' => 'IT-2 (2018)',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 1242,
                'jenis_parameter' => '412',
            'class' => 'IT-2 (2018)',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 1243,
                'jenis_parameter' => '413',
            'class' => 'IT-2 (2018)',
                'parameter' => '120',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 1244,
                'jenis_parameter' => '414',
            'class' => 'IT-2 (2018)',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 1245,
                'jenis_parameter' => '403',
            'class' => 'Standard (2020)',
                'parameter' => '40',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 1246,
                'jenis_parameter' => '405',
            'class' => 'Standard (2020)',
                'parameter' => '250',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 1247,
                'jenis_parameter' => '404',
            'class' => 'Standard (2020)',
                'parameter' => '15',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 1248,
                'jenis_parameter' => '406',
            'class' => 'Standard (2020)',
                'parameter' => '280',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 1249,
                'jenis_parameter' => '407',
            'class' => 'Standard (2020)',
                'parameter' => '180',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 1250,
                'jenis_parameter' => '408',
            'class' => 'Standard (2020)',
                'parameter' => '30',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 1251,
                'jenis_parameter' => '409',
            'class' => 'Standard (2020)',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 1252,
                'jenis_parameter' => '410',
            'class' => 'Standard (2020)',
                'parameter' => '35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 1253,
                'jenis_parameter' => '411',
            'class' => 'Standard (2020)',
                'parameter' => '80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 1254,
                'jenis_parameter' => '412',
            'class' => 'Standard (2020)',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 1255,
                'jenis_parameter' => '413',
            'class' => 'Standard (2020)',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 1256,
                'jenis_parameter' => '414',
            'class' => 'Standard (2020)',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 1257,
                'jenis_parameter' => '415',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential,
Institutional (School,
Hospital), Worship Areas',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 1258,
                'jenis_parameter' => '415',
                'class' => 'Suburban Residential 
(Medium Density)
Areas, Public Spaces, Parks,
Recreational Areas',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 1259,
                'jenis_parameter' => '415',
                'class' => 'Urban Residential (High 
Density) Areas, Designated
Mixed Development Areas
(Residential - Commercial)',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 1260,
                'jenis_parameter' => '415',
                'class' => 'Commercial Business Zones',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 1261,
                'jenis_parameter' => '415',
                'class' => 'Designated Industrial  Zones',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 1262,
                'jenis_parameter' => '416',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential,
Institutional (School,
Hospital), Worship Areas',
                'parameter' => '40',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 1263,
                'jenis_parameter' => '416',
                'class' => 'Suburban Residential 
(Medium Density)
Areas, Public Spaces, Parks,
Recreational Areas',
                'parameter' => '45',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 1264,
                'jenis_parameter' => '416',
                'class' => 'Urban Residential (High 
Density) Areas, Designated
Mixed Development Areas
(Residential - Commercial)',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 1265,
                'jenis_parameter' => '416',
                'class' => 'Commercial Business Zones',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 1266,
                'jenis_parameter' => '416',
                'class' => 'Designated Industrial  Zones',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 1267,
                'jenis_parameter' => '417',
                'class' => 'Noise Sensitive Areas, Low Density Residential,
Suburban and Urban  Residential Areas,
Commercial, Business,
Industrial',
                'parameter' => 'L90 + 10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 1268,
                'jenis_parameter' => '418',
                'class' => 'Noise Sensitive Areas, Low Density Residential',
                'parameter' => 'L90 + 5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 1269,
                'jenis_parameter' => '418',
                'class' => 'Suburban and Urban  Residential Areas,
Commercial, Business,
Industrial',
                'parameter' => 'L90 + 10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 1270,
                'jenis_parameter' => '419',
                'class' => 'LAeq',
                'parameter' => 'LAeq',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 1271,
                'jenis_parameter' => '420',
                'class' => 'LAeq',
                'parameter' => 'LAeq + 3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 1272,
                'jenis_parameter' => '421',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 1273,
                'jenis_parameter' => '421',
                'class' => 'Suburban And Urban Residential',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 1274,
                'jenis_parameter' => '421',
                'class' => 'Commercial, Business',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 1275,
                'jenis_parameter' => '421',
                'class' => 'Industrial',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 1276,
                'jenis_parameter' => '422',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 1277,
                'jenis_parameter' => '422',
                'class' => 'Suburban And Urban Residential',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 1278,
                'jenis_parameter' => '422',
                'class' => 'Commercial, Business',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 1279,
                'jenis_parameter' => '422',
                'class' => 'Industrial',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 1280,
                'jenis_parameter' => '423',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 1281,
                'jenis_parameter' => '423',
                'class' => 'Suburban And Urban Residential',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 1282,
                'jenis_parameter' => '423',
                'class' => 'Commercial, Business',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 1283,
                'jenis_parameter' => '423',
                'class' => 'Industrial',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 1284,
                'jenis_parameter' => '424',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 1285,
                'jenis_parameter' => '424',
                'class' => 'Suburban And Urban Residential',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 1286,
                'jenis_parameter' => '424',
                'class' => 'Commercial, Business',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 1287,
                'jenis_parameter' => '424',
                'class' => 'Industrial',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 1288,
                'jenis_parameter' => '425',
                'class' => 'Noise Sensitive Areas, 
Low Density Residential',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 1289,
                'jenis_parameter' => '425',
                'class' => 'Suburban And Urban Residential',
                'parameter' => '80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 1290,
                'jenis_parameter' => '425',
                'class' => 'Commercial, Business',
                'parameter' => '80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 1291,
                'jenis_parameter' => '425',
                'class' => 'Industrial',
                'parameter' => 'Not Applicable',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 1292,
                'jenis_parameter' => '426',
                'class' => 'Residential',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 1293,
                'jenis_parameter' => '426',
                'class' => 'Commercial',
                'parameter' => '65',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 1294,
                'jenis_parameter' => '426',
                'class' => 'Industrial',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 1295,
                'jenis_parameter' => '427',
                'class' => 'Residential',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 1296,
                'jenis_parameter' => '427',
                'class' => 'Commercial',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 1297,
                'jenis_parameter' => '427',
                'class' => 'Industrial',
                'parameter' => '80',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 1298,
                'jenis_parameter' => '428',
                'class' => 'Residential',
                'parameter' => '90',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 1299,
                'jenis_parameter' => '429',
                'class' => 'Residential',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 1300,
                'jenis_parameter' => '429',
                'class' => 'Commercial',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 1301,
                'jenis_parameter' => '429',
                'class' => 'Industrial',
                'parameter' => 'Not Applicable',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 1302,
                'jenis_parameter' => '430',
                'class' => 'Residential',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 1303,
                'jenis_parameter' => '430',
                'class' => 'Commercial',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 1304,
                'jenis_parameter' => '430',
                'class' => 'Industrial',
                'parameter' => 'Not Applicable',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 1305,
                'jenis_parameter' => '431',
                'class' => 'Residential',
                'parameter' => '85',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 1306,
                'jenis_parameter' => '432',
                'class' => '-',
                'parameter' => '10 - 100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 1307,
                'jenis_parameter' => '433',
                'class' => '1',
                'parameter' => 'ÃƒÂ¢Ã‚â€°Ã‚Â¤ 2Ãƒâ€šÃ‚Â°C increase over maximum ambient',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 1308,
                'jenis_parameter' => '433',
                'class' => '2',
                'parameter' => 'ÃƒÂ¢Ã‚â€°Ã‚Â¤ 2Ãƒâ€šÃ‚Â°C increase over maximum ambient',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 1309,
                'jenis_parameter' => '433',
                'class' => '3',
                'parameter' => 'ÃƒÂ¢Ã‚â€°Ã‚Â¤ 2Ãƒâ€šÃ‚Â°C increase over maximum ambient',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 1310,
                'jenis_parameter' => '433',
                'class' => 'E',
                'parameter' => 'ÃƒÂ¢Ã‚â€°Ã‚Â¤ 2Ãƒâ€šÃ‚Â°C increase over maximum ambient',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 1311,
                'jenis_parameter' => '434',
                'class' => '1',
                'parameter' => '> 80% saturation',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 1312,
                'jenis_parameter' => '434',
                'class' => '2',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 1313,
                'jenis_parameter' => '434',
                'class' => '3',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 1314,
                'jenis_parameter' => '434',
                'class' => 'E',
                'parameter' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 1315,
                'jenis_parameter' => '435',
                'class' => '1',
                'parameter' => '25mg/L or 10% increase in seasonal average, whichever is lower',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 1316,
                'jenis_parameter' => '435',
                'class' => '2',
            'parameter' => '50mg/L (25 mg/L) or 10% increase in seasonal average, whichever is lower',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 1317,
                'jenis_parameter' => '435',
                'class' => '3',
                'parameter' => '100mg/L or 10% increase in seasonal average, whichever is lower',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 1318,
                'jenis_parameter' => '435',
                'class' => 'E',
                'parameter' => '100mg/L or 30% increase in seasonal average, whichever is lower',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 1319,
                'jenis_parameter' => '436',
                'class' => '1',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 1320,
                'jenis_parameter' => '436',
                'class' => '2',
                'parameter' => '0.14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 1321,
                'jenis_parameter' => '436',
                'class' => '3',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 1322,
                'jenis_parameter' => '436',
                'class' => 'E',
                'parameter' => '0.14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 1323,
                'jenis_parameter' => '437',
                'class' => '1',
                'parameter' => '0.04',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 1324,
                'jenis_parameter' => '437',
                'class' => '2',
            'parameter' => '0.16(0.04)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 1325,
                'jenis_parameter' => '437',
                'class' => '3',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 1326,
                'jenis_parameter' => '437',
                'class' => 'E',
                'parameter' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 1327,
                'jenis_parameter' => '438',
                'class' => '1',
                'parameter' => '0.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 1328,
                'jenis_parameter' => '438',
                'class' => '2',
            'parameter' => '2(3)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 1329,
                'jenis_parameter' => '438',
                'class' => '3',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 1330,
                'jenis_parameter' => '438',
                'class' => 'E',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 1331,
                'jenis_parameter' => '439',
                'class' => '1',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 1332,
                'jenis_parameter' => '439',
                'class' => '2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 1333,
                'jenis_parameter' => '439',
                'class' => '3',
                'parameter' => '48',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 1334,
                'jenis_parameter' => '439',
                'class' => 'E',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 1335,
                'jenis_parameter' => '440',
                'class' => '1',
                'parameter' => '1.3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 1336,
                'jenis_parameter' => '440',
                'class' => '2',
                'parameter' => '2.9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 1337,
                'jenis_parameter' => '440',
                'class' => '3',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 1338,
                'jenis_parameter' => '440',
                'class' => 'E',
                'parameter' => '2.9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 1339,
                'jenis_parameter' => '441',
                'class' => '1',
                'parameter' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 1340,
                'jenis_parameter' => '441',
                'class' => '2',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 1341,
                'jenis_parameter' => '441',
                'class' => '3',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 1342,
                'jenis_parameter' => '441',
                'class' => 'E',
            'parameter' => '20(3)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 1343,
                'jenis_parameter' => '442',
                'class' => '1',
                'parameter' => '4.4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 1344,
                'jenis_parameter' => '442',
                'class' => '2',
                'parameter' => '8.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 1345,
                'jenis_parameter' => '442',
                'class' => '3',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 1346,
                'jenis_parameter' => '442',
                'class' => 'E',
                'parameter' => '8.5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 1347,
                'jenis_parameter' => '443',
                'class' => '1',
                'parameter' => '15',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 1348,
                'jenis_parameter' => '443',
                'class' => '2',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 1349,
                'jenis_parameter' => '443',
                'class' => '3',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 1350,
                'jenis_parameter' => '443',
                'class' => 'E',
                'parameter' => '50',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 1351,
                'jenis_parameter' => '444',
                'class' => '1',
                'parameter' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 1352,
                'jenis_parameter' => '444',
                'class' => '2',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 1353,
                'jenis_parameter' => '444',
                'class' => '3',
                'parameter' => '20',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 1354,
                'jenis_parameter' => '444',
                'class' => 'E',
                'parameter' => '7',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 1355,
                'jenis_parameter' => '445',
                'class' => '1',
                'parameter' => '35',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 1356,
                'jenis_parameter' => '445',
                'class' => '2',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 1357,
                'jenis_parameter' => '445',
                'class' => '3',
                'parameter' => '320',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 1358,
                'jenis_parameter' => '445',
                'class' => 'E',
                'parameter' => '70',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 1359,
                'jenis_parameter' => '446',
                'class' => '1',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 1360,
                'jenis_parameter' => '446',
                'class' => '2',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 1361,
                'jenis_parameter' => '446',
                'class' => '3',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 1362,
                'jenis_parameter' => '446',
                'class' => 'E',
                'parameter' => '55',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 1363,
                'jenis_parameter' => '446',
                'class' => '1',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 1364,
                'jenis_parameter' => '446',
                'class' => '2',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 1365,
                'jenis_parameter' => '446',
                'class' => '3',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 1366,
                'jenis_parameter' => '446',
                'class' => 'E',
                'parameter' => '60',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 1367,
                'jenis_parameter' => '447',
                'class' => '1',
                'parameter' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 1368,
                'jenis_parameter' => '447',
                'class' => '2',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 1369,
                'jenis_parameter' => '447',
                'class' => '3',
                'parameter' => '670',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 1370,
                'jenis_parameter' => '447',
                'class' => 'E',
                'parameter' => '75',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 1371,
                'jenis_parameter' => '448',
                'class' => '1',
                'parameter' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 1372,
                'jenis_parameter' => '448',
                'class' => '2',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 1373,
                'jenis_parameter' => '448',
                'class' => '3',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 1374,
                'jenis_parameter' => '448',
                'class' => 'E',
                'parameter' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 1375,
                'jenis_parameter' => '449',
                'class' => '1',
                'parameter' => '0.001',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 1376,
                'jenis_parameter' => '449',
                'class' => '2',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 1377,
                'jenis_parameter' => '449',
                'class' => '3',
                'parameter' => '0.05',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 1378,
                'jenis_parameter' => '449',
                'class' => 'E',
                'parameter' => '0.01',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 1379,
                'jenis_parameter' => '450',
                'class' => '1',
                'parameter' => '70 faecal coliform 100mL-1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 1380,
                'jenis_parameter' => '450',
                'class' => '2',
            'parameter' => '100 faecal coliform 100mL-1 & (70 faecal coliform 100mL-1)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 1381,
                'jenis_parameter' => '450',
                'class' => '3',
                'parameter' => '200 faecal coliform 100mL-1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 1382,
                'jenis_parameter' => '450',
                'class' => 'E',
            'parameter' => '100 faecal coliform 100mL-1 & (70 faecal coliform 100mL-1)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 1383,
                'jenis_parameter' => '451',
                'class' => '1',
                'parameter' => '100',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 1384,
                'jenis_parameter' => '451',
                'class' => '2',
                'parameter' => '200',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 1385,
                'jenis_parameter' => '451',
                'class' => '3',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 1386,
                'jenis_parameter' => '451',
                'class' => 'E',
                'parameter' => '1000',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 1387,
                'jenis_parameter' => '537',
                'class' => 'Sentuhan Prima',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 1388,
                'jenis_parameter' => '545',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 1389,
                'jenis_parameter' => '538',
                'class' => 'Sentuhan Prima',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 1390,
                'jenis_parameter' => '546',
                'class' => 'Sentuhan Sekunder',
                'parameter' => '-',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}