<?php

use Illuminate\Database\Seeder;

class MasterProvinceOfficeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_province_office')->delete();
        
        \DB::table('master_province_office')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Jabatan Selangor & Wilayah Persekutuan',
                'address_id' => 1,
                'phone' => '03-55193233/03-55193551',
                'fax' => '03-55199059',
                'email' => 'unijayas@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Jabatan Melaka & Negeri Sembilan',
                'address_id' => 2,
                'phone' => '06-2345080/06-2345081',
                'fax' => '06-2345084',
                'email' => 'unijayam@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Jabatan Pahang',
                'address_id' => 3,
                'phone' => '09-5131321/09-5131304/09-5131305',
                'fax' => '09-5131306',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Jabatan Terengganu & Kelantan',
                'address_id' => 4,
                'phone' => '09-6315117/09-6221853/09-6312001',
                'fax' => '09-6231043',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Jabatan Johor',
                'address_id' => 5,
                'phone' => '07-2231090/07-2219186',
                'fax' => '07-2240049',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Jabatan Pulau Pinang, Kedah & Perlis',
                'address_id' => 6,
                'phone' => '04-2265008/04-2298925/04-2281991',
                'fax' => '04-2278824',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Jabatan Sabah',
                'address_id' => 7,
                'phone' => '088-222131/088-222132',
                'fax' => '088-245404',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Jabatan Sarawak',
                'address_id' => 8,
                'phone' => '082-258862/082-257600',
                'fax' => '082-230093',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Jabatan Perak',
                'address_id' => 9,
                'phone' => '05-2550967/05-2545381',
                'fax' => '05-2549004',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Jabatan',
                'address_id' => 10,
                'phone' => '03-8886 5499',
                'fax' => '03-8889 2429',
                'email' => 'unijayap@quickstart.com.my',
                'created_at' => '2020-11-16 14:23:33',
            ),
        ));
        
        
    }
}