<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekDetail extends Model {

    protected $table = 'projek_detail';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function state() {
        return $this->belongsTo('App\MasterModel\MasterState', 'negeri', 'id');
    }

    public function city() {
        return $this->belongsTo('App\MasterModel\MasterCity', 'surat_bandar', 'kod_bandar');
    }

    public function surat_state() {
        return $this->belongsTo('App\MasterModel\MasterState', 'surat_negeri', 'id');
    }

    public function district() {
        return $this->belongsTo('App\MasterModel\MasterDistrict', 'daerah', 'district_id');
    }

    public function surat_district() {
        return $this->belongsTo('App\MasterModel\MasterDistrict', 'surat_daerah', 'id');
    }

    public function projek_aktiviti() {
        return $this->belongsTo('App\MasterModel\MasterProjectActivity', 'aktiviti', 'id');
    }

    public function pematuhan_eia() {
        return $this->belongsTo('App\MasterModel\MasterPematuhanEia', 'laporaneia', 'id');
    }

    public function peringkat_pengawasan() {
        return $this->belongsTo('App\MasterModel\MasterPeringkatPengawasan', 'peringkat_audit', 'id');
    }

    public function projek() {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

     public function statusid()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }


    public function fasa() {
        return $this->belongsTo('App\MasterModel\MasterJenisProjek', 'jenis_projek', 'id');
    }


}
