<?php

namespace App\Console\Commands;

use DB;
use App\User;
use App\LaporanStatistikTable;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Console\Command;

class GetNoFailEkas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GetNoFail:Ekas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk get no file_jas dari ldp2_intermediate Ke ldp2';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
               // Connect to integration_database
         $database_int_staging = DB::connection('mysql2');
         $updateData = [
                'is_inserted' => 1,
                'inserted_at' => date('Y-m-d H:i:s'),
            ];
          
         // Get table jas_fail from integration_database 
         $nofail_live = DB::table('jas_fail')->select('nofail')->pluck('nofail');
         foreach($database_int_staging->table('jas_fail')
                                      ->select('id','name', 'nofail', 'status')
                                      ->where('is_inserted', '=', '0')
                                      ->whereNotIn('nofail', $nofail_live )
                                      ->get() as $data){
           DB::table('jas_fail')->insert([
                    'old_id' => $data->id,
                    'name' => $data->name,
                    'nofail' => $data->nofail,
                    'status' => $data->status
           ]);
           DB::table('jas_fail')->where('is_inserted', '=', '0')->update($updateData);
           $database_int_staging->table('jas_fail')
                                ->where('is_inserted', '=', '0')
                                ->update($updateData);

         }

         // Get table jas_fail_detail from integration_database 
         foreach($database_int_staging->table('jas_fail_detail')
                                      ->select('jas_fail_id', 'jas_ekas_id', 'aktiviti', 'lokasi', 'negeri', 'nama_penggerak', 'pegawai_penggerak', 'daerah', 'bandar', 'poskod', 'alamat_surat', 'surat_negeri', 'surat_daerah', 'surat_bandar', 'surat_poskod', 'eo', 'emc', 'jenis_projek', 'laporaneia', 'peringkat_audit', 'jenis', 'other_aktiviti', 'tarikh_kelulusan')
                                      ->where('is_inserted', '=', '0')
                                      ->get() as $data){
            // Save data to live
           DB::table('jas_fail_detail')->insert((array) $data);
           DB::table('jas_fail_detail')
                ->join('jas_fail', 'jas_fail_detail.jas_fail_id', '=', 'jas_fail.old_id')
                ->whereNotNull('old_id')
                ->update(['jas_fail_detail.jas_fail_id' => DB::raw('jas_fail.id')]);
           DB::table('jas_fail_detail')->where('is_inserted', '=', '0')->update($updateData);
           $database_int_staging->table('jas_fail_detail')
                                ->where('is_inserted', '=', '0')
                                ->update($updateData);

         }

         // Get table jas_fail_detail_aktiviti from integration_database 
         foreach($database_int_staging->table('jas_fail_detail_aktiviti')
                                      ->select('ekas_id', 'aktiviti', 'jenis')
                                      ->where('is_inserted', '=', '0')
                                      ->get() as $data){
            // Save data to live
           DB::table('jas_fail_detail_aktiviti')->insert((array) $data);
           DB::table('jas_fail_detail_aktiviti')->where('is_inserted', '=', '0')->update($updateData);
           $database_int_staging->table('jas_fail_detail_aktiviti')
                                ->where('is_inserted', '=', '0')
                                ->update($updateData);

         }
    }
}
