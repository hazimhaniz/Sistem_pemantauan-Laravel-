<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role')->delete();
        
        \DB::table('role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'superadmin',
                'guard_name' => 'web',
                'description' => 'Superadmin',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2019-09-19 13:03:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'staff',
                'guard_name' => 'web',
                'description' => 'Pegawai JAS',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2020-10-07 15:54:53',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'ex',
                'guard_name' => 'web',
                'description' => 'Syarikat',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2020-07-16 02:24:32',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'pp',
                'guard_name' => 'web',
                'description' => 'Penggerak Projek',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2019-09-19 13:03:03',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'eo',
                'guard_name' => 'web',
                'description' => 'Environmental Officer',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2019-09-19 13:03:03',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'emc',
                'guard_name' => 'web',
                'description' => 'Environmental Monitoring Consultant',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2020-07-06 07:30:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'penyiasat',
                'guard_name' => 'web',
                'description' => 'Pegawai Penyiasat',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2019-09-19 13:03:03',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'penyelia',
                'guard_name' => 'web',
                'description' => 'Pegawai Penyelia',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2019-09-19 13:03:03',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'pengarah',
                'guard_name' => 'web',
                'description' => 'Pelulus',
                'created_at' => '2020-07-06 07:37:48',
                'updated_at' => '2020-07-06 07:37:48',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'admin_state',
                'guard_name' => 'web',
                'description' => 'Pentadbir JAS Negeri',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2020-07-06 08:11:44',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'admin_hq',
                'guard_name' => 'web',
                'description' => 'Pentadbir JAS HQ',
                'created_at' => '2019-09-19 13:03:03',
                'updated_at' => '2020-07-06 08:11:21',
            ),
        ));
        
        
    }
}