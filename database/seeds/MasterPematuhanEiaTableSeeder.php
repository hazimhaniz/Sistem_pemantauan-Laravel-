<?php

use Illuminate\Database\Seeder;

class MasterPematuhanEiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_pematuhan_eia')->delete();
        
        \DB::table('master_pematuhan_eia')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sekali Setahun',
                'divided' => 12,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dua Kali Setahun',
                'divided' => 6,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tiga Kali Setahun',
                'divided' => 4,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Empat Kali Setahun',
                'divided' => 3,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Setiap Bulan',
                'divided' => 1,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}