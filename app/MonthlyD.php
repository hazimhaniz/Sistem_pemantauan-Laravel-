<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyD extends Model
{
  protected $table = 'monthly_d';

  protected $fillable = ['projek_id', 'bulan', 'tahun'];

  public function status() {
      return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
  }
  public function attachments() {
      return $this->morphMany('App\OtherModel\Attachment', 'filing');
  }

  public function bulananD(){
    return $this->hasMany('App\MonthlyDBulanan','monthlyD_id','id');
  }

  public function projek()
  {
      return $this->belongsTo('App\Projek', 'projek_id', 'id');
  }

  public function pakej()
  {
      return $this->belongsTo('App\ProjekPakej', 'pakej_id', 'id');
  }

  public static function addNewMonthlyD($projekID,$pakejId,$bulan,$tahun)
  {
 
    $monthlyDexist = MonthlyD::where('projek_id',$projekID)->where('pakej_id',$pakejId)->orderBy('created_at', 'desc')->first();
    if($monthlyDexist) {
      $MonthlyD = new MonthlyD();
      $MonthlyD->projek_id = $projekID;
      $MonthlyD->pakej_id = $pakejId;
      $MonthlyD->status_id = 1;
      $MonthlyD->bulan = $bulan;
      $MonthlyD->tahun = $tahun;
      $MonthlyD->version = 'eo';
      $MonthlyD->save();

      for ($elemen = 1; $elemen <= 2; $elemen++) {

        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',1)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '1';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }
      for ($elemen = 3; $elemen <= 4; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',2)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '2';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 5; $elemen <= 6; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',3)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '3';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 7; $elemen <= 8; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',4)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '4';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 9; $elemen <= 10; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',5)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '5';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 11; $elemen <= 20; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',1)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '1';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 21; $elemen <= 31; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',2)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '2';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 32; $elemen <= 36; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',3)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '3';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 27; $elemen <= 43; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',4)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '4';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 5; $elemen <= 53; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',5)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '5';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }

      for ($elemen = 54; $elemen <= 115; $elemen++) {
        $monthlyDBulanan1Check = MonthlyDBulanan::where('monthlyD_id',$monthlyDexist->id)->where('elemen_pemeriksaan',1)->where('kod_bmp',$elemen)->first();
        if ($monthlyDBulanan1Check) {
          $MonthlyDBulanan1 = $monthlyDBulanan1Check->replicate();
          $MonthlyDBulanan1->monthlyD_id = $MonthlyD->id;
          $MonthlyDBulanan1->elemen_pemeriksaan = '1';
          $MonthlyDBulanan1->kod_bmp = $elemen;
          $MonthlyDBulanan1->version = 'eo';
          $MonthlyDBulanan1->flag_update = 0;
          $MonthlyDBulanan1->save();
        }
      }


    } else {
      $MonthlyD = new MonthlyD();
      $MonthlyD->projek_id = $projekID;
      $MonthlyD->pakej_id = $pakejId;
      $MonthlyD->status_id = 1;
      $MonthlyD->bulan = $bulan;
      $MonthlyD->tahun = $tahun;
      $MonthlyD->version = 'eo';
      $MonthlyD->save();
    }
  }
}
