<?php

use Illuminate\Database\Seeder;

class MasterRunningnoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_runningno')->delete();
        
        \DB::table('master_runningno')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Rayuan',
                'code' => 'R',
                'count' => 1,
                'type' => 'rayuan',
                'module_id' => 7,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Draf Rayuan',
                'code' => 'D-R',
                'count' => 1,
                'type' => 'draf',
                'module_id' => 7,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sijil Kelakuan Baik',
                'code' => 'SKB',
                'count' => 2,
                'type' => 'skb',
                'module_id' => 8,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => '2019-11-22 09:44:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Draf Sijil Kelakuan Baik',
                'code' => 'D-SKB',
                'count' => 2,
                'type' => 'draf',
                'module_id' => 8,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => '2019-11-22 09:44:40',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Draf Sijil Pengecualian',
                'code' => 'D-WAV',
                'count' => 1,
                'type' => 'draf',
                'module_id' => 9,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Sijil Pengecualian',
                'code' => 'WAV',
                'count' => 1,
                'type' => 'waiver',
                'module_id' => 9,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Draf Pendaftaran Rakyat Malaysia Di Luar Negara',
                'code' => 'D-REG',
                'count' => 1,
                'type' => 'draf',
                'module_id' => 10,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Pendaftaran Rakyat Malaysia Di Luar Negara',
                'code' => 'REG',
                'count' => 1,
                'type' => 'regabroad',
                'module_id' => 10,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
            'name' => 'Draf Bantuan Rakyat Malaysia Di Luar Negara (Hilang)',
                'code' => 'D-AM-M',
                'count' => 2,
                'type' => 'draf',
                'module_id' => 11,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => '2019-11-22 14:19:57',
            ),
            9 => 
            array (
                'id' => 10,
            'name' => 'Bantuan Rakyat Malaysia Di Luar Negara (Hilang)',
                'code' => 'AM-M',
                'count' => 1,
                'type' => 'malaysian_assistance',
                'module_id' => 11,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
            'name' => 'Draf Bantuan Konsular Rakyat Asing Di Malaysia (Hilang)',
                'code' => 'D-AF-M',
                'count' => 1,
                'type' => 'draf',
                'module_id' => 12,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
            'name' => 'Bantuan Konsular Rakyat Asing Di Malaysia (Hilang)',
                'code' => 'AF-M',
                'count' => 1,
                'type' => 'foreigner_assistance',
                'module_id' => 12,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Rekod Kehilangan Passport',
                'code' => 'PP',
                'count' => 14,
                'type' => 'missing_passport',
                'module_id' => 33,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => '2019-11-22 15:09:21',
            ),
            13 => 
            array (
                'id' => 14,
            'name' => 'Draf Bantuan Rakyat Malaysia Di Luar Negara (Ditahan)',
                'code' => 'D-AM-D',
                'count' => 2,
                'type' => 'draf',
                'module_id' => 11,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => '2019-11-22 14:19:57',
            ),
            14 => 
            array (
                'id' => 15,
            'name' => 'Bantuan Rakyat Malaysia Di Luar Negara (Ditahan)',
                'code' => 'AM-D',
                'count' => 1,
                'type' => 'malaysian_assistance',
                'module_id' => 11,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
            'name' => 'Draf Bantuan Rakyat Malaysia Di Luar Negara (Kematian)',
                'code' => 'D-AM-DE',
                'count' => 2,
                'type' => 'draf',
                'module_id' => 11,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => '2019-11-22 14:19:57',
            ),
            16 => 
            array (
                'id' => 17,
            'name' => 'Bantuan Rakyat Malaysia Di Luar Negara (Kematian)',
                'code' => 'AM-DE',
                'count' => 1,
                'type' => 'malaysian_assistance',
                'module_id' => 11,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
            'name' => 'Draf Bantuan Konsular Rakyat Asing Di Malaysia (Ditahan)',
                'code' => 'D-AF-D',
                'count' => 1,
                'type' => 'draf',
                'module_id' => 12,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
            'name' => 'Bantuan Konsular Rakyat Asing Di Malaysia (Ditahan)',
                'code' => 'AF-D',
                'count' => 1,
                'type' => 'foreigner_assistance',
                'module_id' => 12,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
            'name' => 'Draf Bantuan Konsular Rakyat Asing Di Malaysia (Kematian)',
                'code' => 'D-AF-DE',
                'count' => 1,
                'type' => 'draf',
                'module_id' => 12,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
            'name' => 'Bantuan Konsular Rakyat Asing Di Malaysia (Kematian)',
                'code' => 'AF-DE',
                'count' => 1,
                'type' => 'foreigner_assistance',
                'module_id' => 12,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Specimen Tandatangan',
                'code' => 'SS',
                'count' => 1,
                'type' => 'sign_specimen',
                'module_id' => 36,
                'year' => '2019',
                'created_at' => '2020-11-16 14:23:35',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}