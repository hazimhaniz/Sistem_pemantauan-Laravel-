<?php

namespace App;

use App\Models\MasterPengawasan;
use App\MonthlyBSyaratRegister;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{

    protected $table = 'projek';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public $dates = ['tarikh_awal', 'tarikh_akhir', 'tarikh_hantar', 'tarikh_sah'];

    public function canSubmitMonthlyReport($year, $month)
    {
        $projek = $this;
    }

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function statusid()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status', 'id');
    }

    public function jasfail()
    {
        return $this->belongsTo('App\JasFail', 'no_fail_jas', 'nofail');
    }

    public function projekHasUser()
    {
        // return $this->belongsTo(ProjekHasUser::class, 'id', 'projek_id');
        return $this->hasMany('App\ProjekHasUser', 'projek_id', 'id');
    }

    public function model_has_role()
    {
        return $this->belongsTo('App\ModelHasRole', 'id', 'model_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'penggerak_projek', 'id');
    }

    public function projekdetail()
    {
        return $this->belongsTo('App\ProjekDetail', 'id', 'projek_id');
    }

    public function bulananStatuses()
    {
        return $this->hasMany('App\ProjekBulananStatus', 'projek_id', 'id');
    }

    public function projekAudit(){
        return $this->belongsTo('App\ProjekAudit','id','projek_id');
    }
    
    public function month()
    {
        return $this->belongsTo('App\MasterModel\MasterMonth', 'bulan', 'id');
    }

    public function distribute()
    {
        return $this->belongsTo('App\Distribution', 'no_fail_jas', 'no_fail_jas');
    }

    public function JenisPengawasan()
    {
        return $this->belongsToMany('App\JenisPengawasan');
    }

    public function bahagiana()
    {
        return $this->belongsTo('App\MonthlyA', 'id', 'projek_id');
    }

    public function package()
    {
        return $this->hasMany(ProjekPakej::class, 'projek_id', 'id');
    }

    public function kuiriup($id, $tahun)
    {
        $bahagiana = MonthlyA::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianb = MonthlyB::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianc = MonthlyC::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagiand = MonthlyD::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagiane = MonthlyE::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianf = MonthlyF::where('projek_id', $id)->where('tahun', $tahun)->first();

        $kuirifiling = array(
            'a' => $bahagiana->id,
            'b' => $bahagianb->id,
            'c' => $bahagianc->id,
            'd' => $bahagiand->id,
            'e' => $bahagiane->id,
            'f' => $bahagianf->id,
        );

        $kuiri = PengurusanKuiri::whereIn('filing_id', $kuirifiling)->get();
        $kuiripp = array();
        foreach ($kuiri as $key => $value) {
            // dd($value);
            if ($value->filing_type == 'eia118') {
                $kuiripp['bahagiana'][] = $value->id;
            } else if (strpos($value->filing_type, 'eia218') !== false) {
                $kuiripp['bahagianb'][] = $value->id;
            } else if (strpos($value->filing_type, 'emr') !== false) {
                $kuiripp['bahagianc'][] = $value->id;
            } else if ($value->filing_type == 'bmp') {
                $kuiripp['bahagiand'][] = $value->id;
            } else if ($value->filing_type == 'audit') {
                $kuiripp['bahagiane'][] = $value->id;
            } else if ($value->filing_type == 'emt') {
                $kuiripp['bahagianf'][] = $value->id;
            }
        }
        return $kuiripp;
    }

    public function kuiriinvolved($id, $tahun)
    {
        $bahagiana = MonthlyA::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianb = MonthlyB::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianc = MonthlyC::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagiand = MonthlyD::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagiane = MonthlyE::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianf = MonthlyF::where('projek_id', $id)->where('tahun', $tahun)->first();

        $kuirifiling = array(
            'a' => $bahagiana->id,
            'b' => $bahagianb->id,
            'c' => $bahagianc->id,
            'd' => $bahagiand->id,
            'e' => $bahagiane->id,
            'f' => $bahagianf->id,
        );

        $kuiri = PengurusanKuiri::whereIn('filing_id', $kuirifiling)->pluck('filing_id');
        // $kuiripp = array();
        // foreach ($kuiri as $key => $value) {
        //     // dd($value);
        //     if ($value->filing_type == 'eia118') {
        //         $kuiripp['bahagiana'][] = $value->id;
        //     } else if(strpos($value->filing_type, 'eia218') !== false){
        //         $kuiripp['bahagianb'][] = $value->id;
        //     } else if(strpos($value->filing_type, 'emr') !== false){
        //         $kuiripp['bahagianc'][] = $value->id;
        //     } else if ($value->filing_type == 'bmp') {
        //         $kuiripp['bahagiand'][] = $value->id;
        //     } else if ($value->filing_type == 'audit') {
        //         $kuiripp['bahagiane'][] = $value->id;
        //     } else if ($value->filing_type == 'emt') {
        //         $kuiripp['bahagianf'][] = $value->id;
        //     }
        // }
        return $kuiri;
    }

    public function kuiridata($id, $tahun)
    {
        $bahagiana = MonthlyA::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianb = MonthlyB::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianc = MonthlyC::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagiand = MonthlyD::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagiane = MonthlyE::where('projek_id', $id)->where('tahun', $tahun)->first();
        $bahagianf = MonthlyF::where('projek_id', $id)->where('tahun', $tahun)->first();

        $kuirifiling = array(
            'a' => $bahagiana,
            'b' => $bahagianb,
            'c' => $bahagianc,
            'd' => $bahagiand,
            'e' => $bahagiane,
            'f' => $bahagianf,
        );

        $kuiri = PengurusanKuiri::whereIn('filing_id', $kuirifiling)->get();
        $kuiripp = array();
        foreach ($kuiri as $key => $value) {
            if ($value->filing_type == 'eia118') {
                $kuiripp['bahagiana'][] = $value->id;
            } else if (strpos($value->filing_type, 'eia218') !== false) {
                $kuiripp['bahagianb'][] = $value->id;
            } else if (strpos($value->filing_type, 'emr') !== false) {
                $kuiripp['bahagianc'][] = $value->id;
            } else if ($value->filing_type == 'bmp') {
                $kuiripp['bahagiand'][] = $value->id;
            } else if ($value->filing_type == 'audit') {
                $kuiripp['bahagiane'][] = $value->id;
            } else if ($value->filing_type == 'emt') {
                $kuiripp['bahagianf'][] = $value->id;
            }
        }
        return $kuirifiling;
    }

    public function stesens()
    {
        return $this->hasMany(Stesen::class, 'projek_id', 'id');
    }

    public function pengawasan()
    {
        return $this->hasManyThrough(MasterPengawasan::class, ProjekPengawasan::class, 'projek_id', 'id', 'id', 'pengawasan_id', 'user_id');
    }

    public function projekHasPp() 
    {
        return $this->hasOne(ProjekHasPp::class, 'projek_id', 'id');
    }

    public function laporan_permarkahan_final(){
        return $this->hasMany('App\LaporanPermakahanFinal','projek_id','id');
    }

    public function laporan_siasatan_new(){
        return $this->hasMany('App\LaporanSiasatanFinal','projek_id','id');
    }


    public function monthtlyBSyaratRegister(){
        return $this->hasMany(MonthlyBSyaratRegister::class,'projek_id','id');
    }
}
