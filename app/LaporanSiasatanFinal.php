<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property int $projek_id
 * @property int $tahun
 * @property int $bulan
 * @property int $status
 * @property int $penyiasat_id
 * @property string $penyiasat_comment
 * @property string $penyiasat_approved
 * @property int $penyelia_id
 * @property string $penyelia_comment
 * @property string $penyelia_approved
 * @property int $pengarah_id
 * @property string $pengarah_comment
 * @property string $pengarah_approved
 * @property string $in_datetime
 * @property string $out_datetime
 * @property string $created_at
 * @property string $updated_at
 */
class LaporanSiasatanFinal extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'laporan_siasatan_final';

    protected $with = ['statusFiling','status'];
    

    /**
     * @var array
     */
    protected $fillable = ['projek_id', 'tahun', 'bulan', 'status', 'penyiasat_id', 'penyiasat_comment', 'penyiasat_approved', 'penyelia_id', 'penyelia_comment', 'penyelia_approved', 'pengarah_id', 'pengarah_comment', 'pengarah_approved', 'in_datetime', 'out_datetime', 'created_at', 'updated_at'];

    public $dates = ['penyiasat_approved', 'penyelia_approved', 'pengarah_approved', 'in_datetime', 'out_datetime'];

    public function statusFiling()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status', 'id');
    }

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function status()
    {
        return $this->hasOne('app\MasterModel\MasterFilingStatus', 'id', 'status');
    }

}
