<?php

use Illuminate\Database\Seeder;

class MasterElemenPemeriksaanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_elemen_pemeriksaan')->delete();
        
        \DB::table('master_elemen_pemeriksaan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PEMERIKSAAN BMPS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'STATUS KAWALAN AIR LARIAN PERMUKAAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'STATUS KAWALAN HAKISAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'STATUS KAWALAN SEDIMEN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'STATUS KAWALAN LAIN-LAIN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}