<?php

use Illuminate\Database\Seeder;

class MasterPeringkatPengawasanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('master_peringkat_pengawasan')->delete();
        
        \DB::table('master_peringkat_pengawasan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Belum Dimulakan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Kerja Tanah / Pembinaan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Pembinaan',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Operasi / Selesai Tidak Perlu Pematuhan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Operasi / Selesai / Perlu Pemantauan',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Tangguh / Terbengkalai',
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}