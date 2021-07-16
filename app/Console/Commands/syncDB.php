<?php

namespace App\Console\Commands;

use DB;
use App\User;
use App\LaporanStatistikTable;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Console\Command;

class syncDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:DB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk sync kan ldp2 ke ldp2_intermediate ';

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
            //truncate integration_database dulu db bagi kosong
         $database_int_staging->table('laporan_esdr_bulanan')->truncate();
         $database_int_staging->table('laporan_esdr_parameter')->truncate();
         $database_int_staging->table('laporan_esdr_stesen')->truncate();
            // Get table laporan_esdr_bulanan from live 
         foreach(DB::table('laporan_esdr_bulanan')->get() as $data){
            // Save data to integration_database
           $database_int_staging->table('laporan_esdr_bulanan')->insert((array) $data);
         }
             // Get laporan_esdr_parameter data from live 
         foreach(DB::table('laporan_esdr_parameter')->get() as $data){
            // Save data to integration_database
            $database_int_staging->table('laporan_esdr_parameter')->insert((array) $data);
         }
           // Get laporan_esdr_stesen from live
         foreach(DB::table('laporan_esdr_stesen')->get() as $data){
            // Save data to integration_database
            $database_int_staging->table('laporan_esdr_stesen')->insert((array) $data);
         }
    }

}
