<?php

namespace App;

use App\MonthlyA;
use App\MonthlyB;
use App\MonthlyBSyarat;
use App\Models\MonthlyC;
use App\MonthlyD;
use App\MonthlyE;
use App\MonthlyF;
use App\Projek;
use App\ProjekHasUser;
use Illuminate\Database\Eloquent\Model;
use App\ProjekPengawasan;
use App\LaporanPermakahanFinal;
use App\PengurusanKuiri;
use App\MonthlyDRainyMain;
use App\MonthlyBSyaratRegister;

class ProjekHelper extends Model
{
    public static function checkProjekHasUserStatus($projekHasUser)
    {
        // check all EMC must be aktif (101)
        $projectMembers = ProjekHasUser::where('projek_id', $projekHasUser->projek_id)->where('role_id', 6)->get();
        //check EO atleast 1
        $projectMembersEo = ProjekHasUser::where('projek_id', $projekHasUser->projek_id)->where('role_id', 5)->where('status', 101)->first();
        
        // kalau EO exist/aktif, check EMC
        if($projectMembersEo) {
            if($projectMembers->first()) {
                foreach($projectMembers as $projectMember) {
                    $emcStatus[] = $projectMember->status;
                }
                    if(in_array('102', $emcStatus) ||  in_array('103', $emcStatus) || in_array('105', $emcStatus)) {
                        // if tak aktif/belom disahkan/tak aktif, status projek Details no changes
                    } else {
                        // if semua EO and EMC aktif, change projek details status
                        $projek = Projek::where('id', $projekHasUser->projek_id)->first();
                        $projek->status = 200;
                        $projek->save();
    
                        $porjekDetail = ProjekDetail::where('projek_id', $projekHasUser->projek_id)->first();
                        $porjekDetail->status_id = 209;
                        $porjekDetail->save();
                    }
            }
        }
    }

    // If all form A-F is 602(lengkap), update
    public static function checkAllFormStatus($projek_id, $year, $month)
    {
        $projek = Projek::where('id', $projek_id)->first();
        $projekDetail = $projek->projekdetail;

        $projekBulananStatus = ProjekBulananStatus::where('projek_id', $projek_id)->where('year', $year)->where('bulanan', $month)->first();

        $borangA = MonthlyA::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangC = MonthlyC::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangD = MonthlyD::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangE = MonthlyE::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangF = MonthlyF::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();

        if ($borangA && $borangB && $borangC && $borangD && $borangE && $borangF) {
            if ($borangA->status_id == '602' && $borangB->status_id == '602' && $borangC->status_id == '602' && $borangD->status_id == '602' && $borangE->status_id == '602' && $borangF->status_id == '602') {

                if($projekBulananStatus->status != 504 && $projekDetail->status_id != 502)
                {
                    $projekBulananStatus->status = 504;
                    $projekBulananStatus->save();

                    $projekDetail->status_id = 502;
                    $projekDetail->save();
                }
                
            }
        }

        return (object)['projek' => $projek, 'projekDetail' => $projekDetail, 'projekBulananStatus' => $projekBulananStatus];
    }

    public static function preCreateForm($projek_id, $year, $month)
    {
        $projek = Projek::where('id', $projek_id)->first();
        $projekPengawasan = ProjekPengawasan::where('projek_id', $projek_id)->get();

        $projekBulanan = ProjekBulananStatus::firstOrCreate(['projek_id' => $projek_id, 'year' => $year, 'bulanan' => $month]);
        if($projekBulanan->wasRecentlyCreated)
        {
            $projekBulanan->status = 500;
        }
        $projekBulanan->save();

        $monthlyA = MonthlyA::firstOrCreate(['projek_id' => $projek->id, 'tahun' => $year, 'bulan' => $month]);
        if($monthlyA->wasRecentlyCreated)
        {
            $monthlyA->projek_id = $projek->id;
            $monthlyA->bulan = $month;
            $monthlyA->tahun = $year;
            $monthlyA->status_id = 600;
        }
        $monthlyA->save();

        $monthlyB = MonthlyB::firstOrCreate(['projek_id' => $projek->id, 'tahun' => $year, 'bulan' => $month]);
        if($monthlyB->wasRecentlyCreated)
        {
            $monthlyB->projek_id = $projek->id;
            $monthlyB->bulan = $month;
            $monthlyB->tahun = $year;
            $monthlyB->status_id = 600;
        }
        $monthlyB->save();

        if($monthlyB){
            $syaratBEIA = MonthlyBSyaratRegister::where('projek_id',$monthlyB->projek_id)->get();
            foreach($syaratBEIA as $syaratB){
                $MonthlyBDetail =  MonthlyBSyarat::firstOrCreate(['monthly_b_id'=>$monthlyB->id,'syarat'=>$syaratB->id]);
                $MonthlyBDetail->monthly_b_id = $monthlyB->id;
                $MonthlyBDetail->syarat =  $syaratB->id;
                $MonthlyBDetail->save();
            }
        }

        $projekBulananData = ProjekBulananStatus::where('projek_id', $projek->id)->get();
        //will add stesen in all months in one go
        foreach ($projekBulananData as $key => $bulananData) {

            if ($projekPengawasan) {
                foreach ($projekPengawasan as $pengawas) {
                    $station = Stesen::where('projek_id', $projek_id)->where('jenis_pengawasan_id', $pengawas->pengawasan_id)->where('tahun', $bulananData->year)->where('bulan', $bulananData->bulanan)->where('projek_pengawasan_id', $pengawas->id)->first();
                    
                    if (empty($station)) {
                        $station = new Stesen;
                    } else {
                        continue;
                    }
                    $station->tahun = $bulananData->year;
                    $station->projek_id = $projek_id;
                    $station->jenis_pengawasan_id = $pengawas->pengawasan_id;
                    $station->bulan = $bulananData->bulanan;
                    $station->projek_pengawasan_id = $pengawas->id;
                    $station->status = 603;
                    $station->save();
                }
            }
        }

        $monthlyD = MonthlyD::firstOrCreate(['projek_id' => $projek->id, 'tahun' => $year, 'bulan' => $month]);
        if($monthlyD->wasRecentlyCreated)
        {
            $monthlyD->projek_id = $projek->id;
            $monthlyD->bulan = $month;
            $monthlyD->tahun = $year;
            $monthlyD->status_id = 600;
        }
        $monthlyD->save();

        $hujan = MonthlyDRainyMain::firstOrCreate(['projek_id' => $projek->id, 'tahun' => $year, 'bulan' => $month]);
        if($hujan->wasRecentlyCreated)
        {
            $hujan->projek_id = $projek->id;
            $hujan->bulan = $month;
            $hujan->tahun = $year;
            $hujan->status_id = 600;
        }
        $hujan->save();

        $monthlyE = MonthlyE::firstOrCreate(['projek_id' => $projek->id, 'tahun' => $year, 'bulan' => $month]);
        if($monthlyE->wasRecentlyCreated)
        {
            $monthlyE->projek_id = $projek->id;
            $monthlyE->bulan = $month;
            $monthlyE->tahun = $year;
            $monthlyE->status_id = 600;
        }
        $monthlyE->save();

        $monthlyF = MonthlyF::firstOrCreate(['projek_id' => $projek->id, 'tahun' => $year, 'bulan' => $month]);
        if($monthlyF->wasRecentlyCreated)
        {
            $monthlyF->projek_id = $projek->id;
            $monthlyF->bulan = $month;
            $monthlyF->tahun = $year;
            $monthlyF->status_id = 600;
        }
        $monthlyF->save();
    }

    public static function updateLaporanPemarkahan($projek_id, $year, $month)
    {
        $projek = Projek::where('id', $projek_id)->first();
        $projekDetail = $projek->projekdetail;

        // $projekBulananStatus = ProjekBulananStatus::where('projek_id', $projek_id)->where('year', $year)->where('bulanan', $month)->first();

        $borangA = MonthlyA::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangC = MonthlyC::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangD = MonthlyD::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangE = MonthlyE::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangF = MonthlyF::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();

        $pemarkahanFinal = LaporanPermakahanFinal::firstOrCreate(['projek_id' => $projek_id, 'tahun' => $year, 'bulan' => $month]);
        if($pemarkahanFinal->wasRecentlyCreated)
        {
            $pemarkahanFinal->status_id = 507;
        }
        $pemarkahanFinal->save();

        if($borangA)
        {
            $kuiriCountA = PengurusanKuiri::where('form_class', 'A')->where('projek_id', $projek_id)->where('year', $year)->where('month', $month)->count();
            $max = config('markah.A');
            $markah = $max - ($kuiriCountA * config('markah.deduct'));
            if($markah < 0)
            {
                $markah = 0;
            }
            $pemarkahanFinal->monthly_a = $markah;
            $pemarkahanFinal->monthly_a_kuiri = $kuiriCountA;
        }

        if($borangB)
        {
            $kuiriCountB = PengurusanKuiri::where('form_class', 'B')->where('projek_id', $projek_id)->where('year', $year)->where('month', $month)->count();
            $max = config('markah.B');
            $markah = $max - ($kuiriCountB * config('markah.deduct'));
            if($markah < 0)
            {
                $markah = 0;
            }
            $pemarkahanFinal->monthly_b = $markah;
            $pemarkahanFinal->monthly_b_kuiri = $kuiriCountB;
        }

        if($borangC)
        {
            $kuiriCountC = PengurusanKuiri::where('form_class', 'C')->where('projek_id', $projek_id)->where('year', $year)->where('month', $month)->count();
            $max = config('markah.C');
            $markah = $max - ($kuiriCountC * config('markah.deduct'));
            if($markah < 0)
            {
                $markah = 0;
            }
            $pemarkahanFinal->monthly_c = $markah;
            $pemarkahanFinal->monthly_c_kuiri = $kuiriCountC;
        }

        if($borangD)
        {
            $kuiriCountD = PengurusanKuiri::where('form_class', 'D')->where('projek_id', $projek_id)->where('year', $year)->where('month', $month)->count();
            $max = config('markah.D');
            $markah = $max - ($kuiriCountD * config('markah.deduct'));
            if($markah < 0)
            {
                $markah = 0;
            }
            $pemarkahanFinal->monthly_d = $markah;
            $pemarkahanFinal->monthly_d_kuiri = $kuiriCountD;
        }

        if($borangE)
        {
            $kuiriCountE = PengurusanKuiri::where('form_class', 'E')->where('projek_id', $projek_id)->where('year', $year)->where('month', $month)->count();
            $max = config('markah.E');
            $markah = $max - ($kuiriCountE * config('markah.deduct'));
            if($markah < 0)
            {
                $markah = 0;
            }
            $pemarkahanFinal->monthly_e = $markah;
            $pemarkahanFinal->monthly_e_kuiri = $kuiriCountE;
        }

        if($borangF)
        {
            $kuiriCountF = PengurusanKuiri::where('form_class', 'F')->where('projek_id', $projek_id)->where('year', $year)->where('month', $month)->count();
            $max = config('markah.F');
            $markah = $max - ($kuiriCountF * config('markah.deduct'));
            if($markah < 0)
            {
                $markah = 0;
            }
            $pemarkahanFinal->monthly_f = $markah;
            $pemarkahanFinal->monthly_f_kuiri = $kuiriCountF;
        }

        $pemarkahanFinal->total = $pemarkahanFinal->monthly_a + $pemarkahanFinal->monthly_b + $pemarkahanFinal->monthly_c + $pemarkahanFinal->monthly_d + $pemarkahanFinal->monthly_e + $pemarkahanFinal->monthly_f;
        $pemarkahanFinal->save();

        return $pemarkahanFinal;
    }
}
