<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyCDetail extends Model
{
    public $table = 'monthly_c_detail';

    public $fillable = [
        'id',
        'stesen_id',
        'monthly_c_id',
        'ulasan',
        'nama_fail',
        'sampel',
        'tarikh_pengsampelan',
        'masa_pengsampelan',
        'longitud_pengsampelan',
        'latitud_pengsampelan',
        'gambar_pengsampelan',
        'cuaca',
        'bacaan_slit_curtain',
        'laporan_kimia',
        'gambar_pengawasan',
        'video_pengawasan',
        'catatan',
        'version',
        'old_data',
        'status_flag',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public $fieldSearchable = [
        'tarikh_pengsampelan',
        'masa_pengsampelan',
    ];

    public function stesen()
    {
        return $this->belongsTo(Stesen::class, 'stesen_id', 'id')->whereNotNull('stesen');
    }

    public function monthlyC()
    {
        return $this->hasOne(MonthlyC::class, 'id', 'monthly_c_id');
    }
}
