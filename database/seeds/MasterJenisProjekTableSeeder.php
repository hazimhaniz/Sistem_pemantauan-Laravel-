<?php

use Illuminate\Database\Seeder;

class MasterJenisProjekTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_jenis_projek')->delete();
        
        \DB::table('master_jenis_projek')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tidak Berpakej / Tidak Berfasa',
                'status' => 1,
                'created_at' => '2019-09-18 16:00:00',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Berpakej / Berfasa',
                'status' => 1,
                'created_at' => '2019-09-18 16:00:00',
                'updated_at' => '2019-09-19 13:03:41',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Berfasa',
                'status' => 0,
                'created_at' => '2019-09-18 16:00:00',
                'updated_at' => '2019-09-19 13:03:41',
            ),
        ));
        
        
    }
}