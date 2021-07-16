<?php

use Illuminate\Database\Seeder;

class MasterMonthTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_month')->delete();
        
        \DB::table('master_month')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Januari',
                'code' => 'Jan',
                'created_at' => '2019-09-19 13:03:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Februari',
                'code' => 'Feb',
                'created_at' => '2019-09-19 13:03:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Mac',
                'code' => 'Mac',
                'created_at' => '2019-09-19 13:03:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'April',
                'code' => 'Apr',
                'created_at' => '2019-09-19 13:03:31',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Mei',
                'code' => 'Mei',
                'created_at' => '2019-09-19 13:03:31',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Jun',
                'code' => 'Jun',
                'created_at' => '2019-09-19 13:03:31',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Julai',
                'code' => 'Jul',
                'created_at' => '2019-09-19 13:03:31',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Ogos',
                'code' => 'Ogo',
                'created_at' => '2019-09-19 13:03:31',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'September',
                'code' => 'Sep',
                'created_at' => '2019-09-19 13:03:31',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Oktober',
                'code' => 'Okt',
                'created_at' => '2019-09-19 13:03:31',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'November',
                'code' => 'Nov',
                'created_at' => '2019-09-19 13:03:31',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Disember',
                'code' => 'Dis',
                'created_at' => '2019-09-19 13:03:31',
            ),
        ));
        
        
    }
}