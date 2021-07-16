<?php

use Illuminate\Database\Seeder;

class MasterTempohAuditTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_tempoh_audit')->delete();
        
        \DB::table('master_tempoh_audit')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sekali Setahun',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dua Kali Setahun',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tiga Kali Setahun',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Empat Kali Setahun',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Setiap Bulan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}