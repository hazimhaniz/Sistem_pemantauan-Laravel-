<?php

use Illuminate\Database\Seeder;

class MasterMaritalStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_marital_status')->delete();
        
        \DB::table('master_marital_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Belum Berkahwin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Berkahwin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Duda',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Janda',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
            'name' => 'Duda (Kematian Pasangan)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
            'name' => 'Janda (Kematian Pasangan)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}