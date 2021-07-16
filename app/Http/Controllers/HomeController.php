<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LaporanPermakahanFinal;
use App\LaporanSiasatanFinal;
use App\MasterModel\MasterFilingStatus;
use App\MasterModel\MasterModule;
use App\OtherModel\Announcement;
use App\Projek;
use App\ProjekBulananStatus;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::where('date_start', '<=', Carbon::today()->toDateString())
        ->where('date_end', '>=', Carbon::today()->toDateString())
        ->whereHas('targets', function ($targets) {
            return $targets->whereIn('role_id', auth()->user()->roles->pluck('id')->toArray());
        })->get();

        if (Auth::user()->hasRole('superadmin')) {

            try {
                preg_match_all('/(?<total>\d+)/', exec('cat /proc/meminfo | grep "MemTotal"'), $mem);
                $mem_total = $this->formatBytes($mem['total'][0] * 1000, true);

                preg_match_all('/(?<free>\d+)/', exec('cat /proc/meminfo | grep "MemFree"'), $mem);
                $mem_free = $this->formatBytes($mem['free'][0] * 1000, true);

                $uptime_days = exec("uptime | awk -F'( |,|:)+' '{print $6}'") . " hari";
                $uptime_hours = exec("uptime | awk -F'( |,|:)+' '{print $8,\"jam,\",$9,\"minit.\"}'");

                $cpu = exec("grep 'cpu ' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage \"\"}'");

                preg_match_all('/ (?<size>\d+)/', exec('df /dev/mapper/centos-root'), $disk);
                $disk_total = $this->formatBytes($disk['size'][2] * 1000, true);
                $disk_free = $this->formatBytes($disk['size'][1] * 1000, true);
            } catch (\Exception $e) {
                $mem_total = 0;
                $mem_free = 0;
                $uptime_days = 0;
                $uptime_hours = 0;
                $cpu = 0;
                $disk_total = 0;
                $disk_free = 0;
            }
            $projects = Projek::all();
            return view('home_superadmin', compact('projects','announcements', 'mem_total', 'mem_free', 'uptime_days', 'uptime_hours', 'cpu', 'disk_total', 'disk_free'));
        } else if (Auth::user()->hasRole('admin')) {
            $modules = MasterModule::where('type', 3)->get();
            $statuses = MasterFilingStatus::all();

            return view('home_admin', compact('announcements', 'modules', 'statuses'));
        } else if (Auth::user()->hasRole('pengguna_dalam')) {
            $modules = MasterModule::where('type', 3)->get();
            $statuses = MasterFilingStatus::whereIn('id', [1, 2, 3, 4, 8, 9, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24])->get();

            return view('home_staff', compact('announcements', 'modules', 'statuses'));
        } else {
            $modules = MasterModule::where('type', 3)->get();
            $statuses = MasterFilingStatus::all();

            $projects = Projek::all();

            return view('home', compact('announcements', 'modules', 'statuses', 'projects'));
        }
    }

    public function indexPost(Request $request)
    {
        $input = $request->all();

        uploadFiles(User::first(), $input);

        return redirect()->back();
    }

    public function getStatisticEIA(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $newmonth = "empty";

        $projekBulanans = ProjekBulananStatus::with(['projek'])->where('year', $year)->where('bulanan', $month)->get();
        $statuses = MasterFilingStatus::whereIn('id', $projekBulanans->pluck('status')->toArray())->get();
        //dd($statuses);

        $data = [];
        foreach ($statuses as $key => $status) {
            $count = $projekBulanans->where('status', $status->id)->count();
            $data[] = $count;
        }


        $siasatanfinal = LaporanSiasatanFinal::with(['projek'])->where('tahun', $year)->where('bulan', $month)->get();
        $siasatan_status =  MasterFilingStatus::whereIn('id', $siasatanfinal->pluck('status')->toArray())->get();

        $datas = null;

        if ($siasatan_status){

        $siasatan = [];
        foreach ($siasatan_status as $status) {
            $counts = $siasatanfinal->where('status', $status->id)->count();
            //dd($counts);
            
            $datas[] = $counts;
        }
    
    }  

        if ($month == '1'){

            $newmonth = 'Jan';
        }

        if ($month == '2'){

            $newmonth = 'Feb';
        }

        if ($month == '3'){

            $newmonth = 'Mac';
        }

        if ($month == '4'){

            $newmonth = 'Apr';
        }

        if ($month == '5'){

            $newmonth = 'May';
        }

        if ($month == '6'){

            $newmonth = 'Jun';
        }

        if ($month == '7'){

            $newmonth = 'Jul';
        }

        if ($month == '8'){

            $newmonth = 'Aug';
        }

        if ($month == '9'){

            $newmonth = 'Sep';
        }

        if ($month == '10'){

            $newmonth = 'Okt';
        }

        if ($month == '11'){

            $newmonth = 'Nov';
        }

        if ($month == '12'){

            $newmonth = 'Dec';
        }

        $response['categories'] = $statuses->pluck('name')->toArray();
        $response['data'] = $data;
        $response['year'] = $year . " - " . $newmonth;
        $response['projekBulanans'] = $projekBulanans;

        $response['categoriess'] = $siasatan_status->pluck('name')->toArray();
        $response['datas'] = $datas;
        $response['siasatan'] =  $siasatanfinal;

 


        return response()->json($response);
    }

    public function getLaporanPemarkahan(Request $request)
    {
        $year = $request->year;
        //$month = $request->month;

        $patuh = 0;
        $patuh_sebahagian = 0;
        $tidak_patuh = 0;

        $from = $request->month_from;
        $to = $request->month_to;
        $patuhVal = [];
        $tidakPatuhVal= [];
        $patuhSebahagian = [];
        

        $laporanPermakahanss = LaporanPermakahanFinal::with(['projek'])->where('tahun', $year)->wherein('bulan', [1,2,3,4,5,6,7,8,9,10,11,12])->get();

foreach(range($from,$to) as $i){

        $laporanPermakahans = LaporanPermakahanFinal::with(['projek'])->where('tahun', $year)->where('bulan', $i)->get();

        foreach ($laporanPermakahans as $laporanPermakahan) {
            if ($laporanPermakahan->total < 50) {
                $tidak_patuh++;
            } else if ($laporanPermakahan->total < 70) {
                $patuh_sebahagian++;
            } else {

                $patuh++;
                
            }
            
            //$laporanPermakahan->setAttribute('status_label', $laporanPermakahan->getLabelMarkah());
        }

        array_push($patuhVal, $patuh);
        array_push($tidakPatuhVal, $tidak_patuh);
        array_push($patuhSebahagian, $patuh_sebahagian);
    }

        //$response['categories'] = ['PATUH', 'PATUH SEBAHAGIAN', 'TIDAK PATUH'];
        //$response['data'] = [$patuh, $patuh_sebahagian, $tidak_patuh];
        //$response['year'] = $year . " - " . $month;
        $response['laporanPermakahans'] = $laporanPermakahanss;

        $response['patuh'] = $patuhVal;
        $response['tidakPatuh'] = $tidakPatuhVal;
        $response['patuhSebahagian'] = $patuhSebahagian;

        return response()->json($response);
    }
}
