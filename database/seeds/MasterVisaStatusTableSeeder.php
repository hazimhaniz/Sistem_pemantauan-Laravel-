<?php

use Illuminate\Database\Seeder;

class MasterVisaStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_visa_status')->delete();
        
        \DB::table('master_visa_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tiada Maklumat',
                'code' => 'TM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Permit Bekerja',
                'code' => 'PK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Visa Pelajar',
                'code' => 'VS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Penduduk Tetap',
                'code' => 'PT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Pelancong',
                'code' => 'PG',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}