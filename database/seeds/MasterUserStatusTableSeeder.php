<?php

use Illuminate\Database\Seeder;

class MasterUserStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_user_status')->delete();
        
        \DB::table('master_user_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Aktif',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tidak Aktif',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Belum Disahkan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Disekat',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Tidak Aktif',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'Pengesahan Penyiasat ( Nyah Aktif )',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
            'name' => 'Pengesahan Penyiasat ( Aktif )',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Kemaskini Makmal Akreditasi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Deraf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Tiada Pengesahan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}