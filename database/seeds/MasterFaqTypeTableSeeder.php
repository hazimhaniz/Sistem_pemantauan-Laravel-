<?php

use Illuminate\Database\Seeder;

class MasterFaqTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_faq_type')->delete();
        
        \DB::table('master_faq_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Umum',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Akaun',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Sulit & Persendirian',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Proses',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}