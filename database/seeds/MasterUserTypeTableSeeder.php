<?php

use Illuminate\Database\Seeder;

class MasterUserTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_user_type')->delete();
        
        \DB::table('master_user_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Pentadbir',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Pegawai',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pengguna Luar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}