<?php

use Illuminate\Database\Seeder;

class MasterInboxStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_inbox_status')->delete();
        
        \DB::table('master_inbox_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Draf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Telah Dihantar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Telah Dibaca',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}