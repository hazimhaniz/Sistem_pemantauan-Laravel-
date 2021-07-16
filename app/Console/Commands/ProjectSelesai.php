<?php

namespace App\Console\Commands;

use App\Projek;
use Illuminate\Console\Command;

class ProjectSelesai extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projek:selesai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $projeks = Projek::get();

        foreach ($projeks as $key => $projek) {

            if ($projek->tarikh_akhir) {
                $endPlus7 = $projek->tarikh_akhir->addDays(7);

                if (now() > $endPlus7) {
                    $projek->status = 201;
                    $projek->save();

                    $projekDetail = $projek->projekdetail;
                    $projekDetail->status_id = 201;
                    $projekDetail->save();
                }
            }
        }
    }
}
