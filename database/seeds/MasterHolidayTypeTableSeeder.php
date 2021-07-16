<?php

use Illuminate\Database\Seeder;

class MasterHolidayTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_holiday_type')->delete();
        
        \DB::table('master_holiday_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tahun Baru Cina',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tahun Baru Cina Hari Kedua',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Hari Pekerja',
                'start_date' => '2019-05-01',
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Hari Wesak',
                'start_date' => '2019-05-29',
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Hari Raya Aidilfitri',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Hari Raya Aidilfitri Hari Kedua',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Hari Raya Haji',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Hari Kebangsaan',
                'start_date' => '2019-08-31',
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Awal Muharram',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Hari Malaysia',
                'start_date' => '2019-09-16',
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Maulidur Rasul',
                'start_date' => NULL,
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Hari Krismas',
                'start_date' => '2019-12-25',
                'duration' => 1,
                'created_at' => '2019-09-19 13:03:10',
            ),
        ));
        
        
    }
}