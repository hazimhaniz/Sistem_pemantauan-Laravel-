<?php
namespace App\Http\ViewComposers;

use App\Distribution;
use App\JasFailDetail;
use App\LaporanSiasatanFinal;
use App\Models\Stesen;
use App\Projek;
use App\ProjekBulananStatus;
use App\UserStaff;
use Auth;
use Illuminate\View\View;

class StatusKerjaComposer
{
    public function _construct()
    {

    }

    public function compose(View $view)
    {
        // Rekod eKAS

        $user = auth()->user()->id;

        //sebab superadmin.getnada punya id 1


        $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();
        if (auth()->user()->username == 'superadmin'){
            
            $staffStatesArr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        }
        
        $distributionProjeks = Distribution::get()->pluck('no_fail_jas')->toArray();

        $jasFailQuery = JasFailDetail::query();
        $jasFailQuery->select('jas_fail.id', 'jas_fail.name', 'jas_fail.nofail', 'jas_fail.status', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.jas_ekas_id', 'jas_fail_detail.negeri')->leftJoin('jas_fail', 'jas_fail_detail.jas_fail_id', '=', 'jas_fail.id');
        if (!in_array(17, $staffStatesArr)) {
            $jasFailQuery->whereIn('jas_fail_detail.negeri', $staffStatesArr);
        }

        $jasFailQuery->whereNotNull('jas_fail.nofail');

        $jasFailQueryTotal = $jasFailQuery;
        $ekasTotal = $jasFailQueryTotal->count();

        $jasFailQuery = JasFailDetail::query();
        $jasFailQuery->select('jas_fail.id', 'jas_fail.name', 'jas_fail.nofail', 'jas_fail.status', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.jas_ekas_id', 'jas_fail_detail.negeri')->leftJoin('jas_fail', 'jas_fail_detail.jas_fail_id', '=', 'jas_fail.id');
        if (!in_array(17, $staffStatesArr)) {
            $jasFailQuery->whereIn('jas_fail_detail.negeri', $staffStatesArr);
        }
        $jasFailQuery->whereNotNull('jas_fail.nofail');
        $jasFailQueryBelum = $jasFailQuery;
        $ekasBelum = $jasFailQueryBelum->whereNotIn('jas_fail.nofail', $distributionProjeks)->count();

        $jasFailQuery = JasFailDetail::query();
        $jasFailQuery->select('jas_fail.id', 'jas_fail.name', 'jas_fail.nofail', 'jas_fail.status', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.jas_ekas_id', 'jas_fail_detail.negeri')->leftJoin('jas_fail', 'jas_fail_detail.jas_fail_id', '=', 'jas_fail.id');
        if (!in_array(17, $staffStatesArr)) {
            $jasFailQuery->whereIn('jas_fail_detail.negeri', $staffStatesArr);
        }
        $jasFailQuery->whereNotNull('jas_fail.nofail');
        $jasFailQueryTelah = $jasFailQuery;
        $ekasTelah = $jasFailQueryTelah->whereIn('jas_fail.nofail', $distributionProjeks)->count();

        // Projek
        $projekQuery = Projek::query();
        $projekQuery->whereIn('state', $staffStatesArr);
        $projekQueryAktif = $projekQuery;
        $projekAktif = $projekQueryAktif->where('status', 200)->count();

        $projekQuery = Projek::query();
        $projekQuery->whereIn('state', $staffStatesArr);
        $projekQueryBelumSah = $projekQuery;
        $projekQueryBelumSah->where('status', 4);
        $projekQueryBelumSah->whereHas('projekdetail', function ($query) {
            $query->where('status_id', 4);
        });
        $projekBelumSah = $projekQueryBelumSah->count();

        $projekQuery = Projek::query();
        $projekQuery->whereIn('state', $staffStatesArr);
        $projekQueryTelahSah = $projekQuery;
        $projekQueryTelahSah->where('status', 200);
        $projekQueryTelahSah->whereHas('projekdetail', function ($query) {
            $query->where('status_id', 500);
        });
        $projekTelahSah = $projekQueryTelahSah->count();

        // Stesen
        $stesenQuery = Stesen::query();
        $stesenQuery->whereIn('status', [13, 607]);
        $senaraiStesen = $stesenQuery->count();

        $stesenQueryBelumSah = Stesen::query();
        $stesenQueryBelumSah->whereIn('status', [13]);
        $stesenBelumSah = $stesenQueryBelumSah->count();

        $stesenQueryTelahSah = Stesen::query();
        $stesenQueryTelahSah->whereIn('status', [607]);
        $stesenTelahSah = $stesenQueryTelahSah->count();

        // Siasatan
        $siasatanQuery = LaporanSiasatanFinal::query();
        $siasatanQuery->whereIn('status', [6, 9, 19, 508]);
        $siasatan = $siasatanQuery->count();

        $siasatanQueryBelumSedia = LaporanSiasatanFinal::query();
        $siasatanQueryBelumSedia->whereIn('status', [508]);
        $siasatanBelumSedia = $siasatanQueryBelumSedia->count();

        $siasatanQueryTelahSedia = LaporanSiasatanFinal::query();
        $siasatanQueryTelahSedia->whereIn('status', [6]);
        $siasatanTelahSedia = $siasatanQueryTelahSedia->count();

        $siasatanQueryBelumSemak = LaporanSiasatanFinal::query();
        $siasatanQueryBelumSemak->whereIn('status', [6]);
        $siasatanBelumSemak = $siasatanQueryBelumSemak->count();

        $siasatanQueryTelahSemak = LaporanSiasatanFinal::query();
        $siasatanQueryTelahSemak->whereIn('status', [9]);
        $siasatanTelahSemak = $siasatanQueryTelahSemak->count();

        $siasatanQueryBelumLulus = LaporanSiasatanFinal::query();
        $siasatanQueryBelumLulus->whereIn('status', [9]);
        $siasatanBelumLulus = $siasatanQueryBelumLulus->count();

        $siasatanQueryTelahLulus = LaporanSiasatanFinal::query();
        $siasatanQueryTelahLulus->whereIn('status', [19]);
        $siasatanTelahLulus = $siasatanQueryTelahLulus->count();

        // Bulanan
        $bulananStatusQueryBelumSah = ProjekBulananStatus::query();
        $bulananStatusQueryBelumSah->whereIn('status', [2]);
        $bulananStatusQueryBelumSah->whereHas('ProjekDetail', function ($query) {
            $query->whereIn('status_id', [500]);
        });
        $bulananStatusBelumSah = $bulananStatusQueryBelumSah->count();

        $bulananStatusQueryTelahSah = ProjekBulananStatus::query();
        $bulananStatusQueryTelahSah->whereIn('status', [509]);
        $bulananStatusTelahSah = $bulananStatusQueryTelahSah->count();

        $bulananBelumDihantar = ProjekBulananStatus::wherein('status', [505])->count();

        $view->with([
            'ekasTotal' => $ekasTotal, 'ekasBelum' => $ekasBelum, 'ekasTelah' => $ekasTelah,
            'projekAktif' => $projekAktif, 'projekBelumSah' => $projekBelumSah, 'projekTelahSah' => $projekTelahSah,
            'senaraiStesen' => $senaraiStesen, 'stesenBelumSah' => $stesenBelumSah, 'stesenTelahSah' => $stesenTelahSah,
            'siasatan' => $siasatan, 'siasatanBelumSedia' => $siasatanBelumSedia, 'siasatanTelahSedia' => $siasatanTelahSedia, 'siasatanBelumSemak' => $siasatanBelumSemak,
            'siasatanTelahSemak' => $siasatanTelahSemak, 'siasatanBelumLulus' => $siasatanBelumLulus, 'siasatanTelahLulus' => $siasatanTelahLulus,
            'bulananStatusBelumSah' => $bulananStatusBelumSah, 'bulananStatusTelahSah' => $bulananStatusTelahSah, 'bulananBelumDihantar' => $bulananBelumDihantar
        ]);
    }
}
