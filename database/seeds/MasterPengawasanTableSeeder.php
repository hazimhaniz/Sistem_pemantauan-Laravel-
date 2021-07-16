<?php

use Illuminate\Database\Seeder;

class MasterPengawasanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_pengawasan')->delete();
        
        \DB::table('master_pengawasan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jenis_pengawasan' => 'Sungai',
                'nama' => 'Program Pengawasan Kualiti - Sungai',
                'standard_dirujuk' => 'Standard merujuk kepada National Water Quality Standards',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'jenis_pengawasan' => 'Marin',
                'nama' => 'Program Pengawasan Kualiti - Marin',
                'standard_dirujuk' => 'Standard merujuk kepada Standard Kualiti Air Marin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'jenis_pengawasan' => 'Tasik',
                'nama' => 'Program Pengawasan Kualiti - Tasik',
                'standard_dirujuk' => 'Standard merujuk kepada National Lake Water Quality Criteria and Standard',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'jenis_pengawasan' => 'Air Tanah',
                'nama' => 'Program Pengawasan Kualiti - Air Tanah',
                'standard_dirujuk' => 'Standard merujuk kepada Standard Dan Indeks Kualiti_Air_Tanah',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'jenis_pengawasan' => 'Perlepasan Dari Kolam Perangkap Mendap Air Larian Permukaan',
            'nama' => 'Program Pengawasan Kualiti - Perlepasan Dari Kolam Perangkap Mendap (Air Larian Permukaan)',
                'standard_dirujuk' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'jenis_pengawasan' => 'Udara',
                'nama' => 'Program Pengawasan Kualiti - Udara',
                'standard_dirujuk' => 'Standard merujuk kepada Air Quality Standard',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'jenis_pengawasan' => 'Bunyi Bising',
                'nama' => 'Program Pengawasan Kualiti - Bunyi Bising',
                'standard_dirujuk' => 'Standard merujuk kepada The Planning Guidelines For Environmental Noise Limits and Control',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'jenis_pengawasan' => 'Getaran',
                'nama' => 'Program Pengawasan Kualiti - Getaran',
                'standard_dirujuk' => 'Standard merujuk kepada The Planning Guidelines For Vibration Limits and Control in the Environment',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'jenis_pengawasan' => 'Dron',
                'nama' => 'Program Pengawasan Melalui Dron',
                'standard_dirujuk' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}