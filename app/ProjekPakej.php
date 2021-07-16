<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekPakej extends Model {

    protected $table = 'projek_pakej';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function projek() {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function projekState() {
        return $this->belongsTo('App\MasterModel\MasterState', 'pakej_negeri', 'id');
    }

    public function pengawasan() {
        return $this->belongsToMany('App\PakejHasPengawasan', 'pengawasan_id', 'id');
    }

    public function peratusan($pakej,$id) {
        $peratus = \App\MonthlyAKemajuan::where('pakej_id',$pakej)->where('monthly_a_id',$id)->first()->peratus_kemajuan;
        return $peratus;
    }
}
