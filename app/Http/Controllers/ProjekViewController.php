<?php

namespace App\Http\Controllers;

use App\MasterModel\MasterDistrict;
use App\MasterModel\MasterPematuhanEia;
use App\MasterModel\MasterPengawasan;
use App\MasterModel\MasterPeringkatPengawasan;
use App\MasterModel\MasterState;
use App\MasterModel\MasterTempohAudit;
use App\Projek;
use App\ProjekDetail;
use App\ProjekHasPp;
use App\ProjekPengawasan;
use App\MonthlyBSyaratRegister;
use Illuminate\Http\Request;
use App\LogSystem;
use App\User;

class ProjekViewController extends Controller
{
    public function view(Request $request)
    {
        $logsej =LogSystem::with('user')->wherein('activity_type_id', ['4,5,21,17,20,16'])->get();
        $userPP = null;
        $projek = null;
        $projekDetail = null;
        $jasFail = null;
        $jasDetail = null;

        $projekID = $request->projekID;
        $userPP = ProjekHasPp::where('projek_id', $projekID)->where('role_id', 4)->first();
        $projek = Projek::where('id', $projekID)->first();
        if ($projek) {
            $projekDetail = $projek->projekdetail;
            $jasFail = $projek->jasfail;
            if ($jasFail) {
                $jasDetail = $jasFail->jasdetail;
            }
        }
        $userEmc = null;
        $states = MasterState::get();
        $districts = MasterDistrict::get();
        $pengawasans = MasterPengawasan::get();
        $pematuhans = MasterPematuhanEia::get();
        $projekPengawasanArr = ProjekPengawasan::where('projek_id', $projek->id)->get()->pluck('pengawasan_id')->toArray();
        $peringkatPengawasans = MasterPeringkatPengawasan::where('status', 1)->get();
        $tempohAudits = MasterTempohAudit::get();
        $syaratEIA = MonthlyBSyaratRegister::where('projek_id',$projek->id)->whereNotIn('status',[609])->get();
        $syaratEIAStatus = MonthlyBSyaratRegister::where('projek_id',$projek->id)->where('status',610)->first();


        return view('projek.view_projek_pendaftaran', compact('projek', 'logsej', 'userPP', 'projekDetail', 'jasFail', 'jasDetail', 'states', 'districts', 'pengawasans', 'pematuhans', 'projekPengawasanArr', 'peringkatPengawasans', 'tempohAudits', 'userEmc','syaratEIA','syaratEIAStatus'));
    }
}
