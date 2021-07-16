<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('setting')->delete();
        
        \DB::table('setting')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'system_name',
                'value' => 'SPPEIA',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'background_login_page',
                'value' => 'bg_login4.png',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'logo_login_page',
                'value' => 'logo.png',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'logo_header',
                'value' => 'logo.png',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'favicon',
                'value' => 'favicon.5d49ad6735d73.ico',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'copyright',
                'value' => '2020 Â© SPPEIA',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'system_admin_email',
                'value' => 'admin@email.com',
                'description' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}