<?php

use Illuminate\Database\Seeder;

class ModelHasPermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_permission')->delete();
        
        \DB::table('model_has_permission')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'model_type' => 'App\\User',
                'model_id' => 2,
                'created_at' => '2019-11-26 03:27:13',
                'updated_at' => '2019-11-26 03:27:13',
            ),
            1 => 
            array (
                'permission_id' => 2,
                'model_type' => 'App\\User',
                'model_id' => 578,
                'created_at' => '2020-07-06 03:12:40',
                'updated_at' => '2020-07-06 03:12:40',
            ),
            2 => 
            array (
                'permission_id' => 3,
                'model_type' => 'App\\User',
                'model_id' => 421,
                'created_at' => '2020-07-06 03:39:37',
                'updated_at' => '2020-07-06 03:39:37',
            ),
            3 => 
            array (
                'permission_id' => 5,
                'model_type' => 'App\\User',
                'model_id' => 4,
                'created_at' => '2020-07-06 03:56:27',
                'updated_at' => '2020-07-06 03:56:27',
            ),
            4 => 
            array (
                'permission_id' => 8,
                'model_type' => 'App\\User',
                'model_id' => 4,
                'created_at' => '2020-07-06 03:56:27',
                'updated_at' => '2020-07-06 03:56:27',
            ),
            5 => 
            array (
                'permission_id' => 20,
                'model_type' => 'App\\User',
                'model_id' => 4,
                'created_at' => '2020-07-06 03:56:27',
                'updated_at' => '2020-07-06 03:56:27',
            ),
        ));
        
        
    }
}