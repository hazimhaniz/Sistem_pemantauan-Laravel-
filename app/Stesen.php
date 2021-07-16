<?php

namespace App;

use App\Models\EntityFile;
use App\Models\MonthlyCDetail;
use App\Models\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class Stesen extends Model
{
    protected $table = 'stesen';

    public $timestamps = true;

    public $fillable = [
        'id',
        'projek_id',
        'jenis_pengawasan_id',
        'projek_pakej_id',
        'nama',
        'status',
        'stesen',
        'lembangan',
        'sungai',
        'gambar_stesen',
        'longitud',
        'latitud',
        'versi',
        'class',
        'kategori_tanah',
        'is_tanah',
        'is_pembinaan',
        'is_operasi',
        'is_eia',
        'is_emp',
        'date_eia',
        'date_emp',
        'is_prima',
        'is_sekunder',
        'penambahan_status',
        'created_at',
        'updated_at',
        'url_geolocator',
        'tahun',
        'bulan',
        'is_near',
        'sentuhan',
        'kategori_bunyi',
    ];

    public $dates = ['date_eia', 'date_emp'];

    public $fieldSearchable = [
        'stesen',
        'longitud',
        'latitud',
    ];

    public function namaProgram()
    {
        return $this->belongsTo('App\MasterModel\MasterPengawasan', 'jenis_pengawasan_id', 'id');
    }

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function namasungai()
    {
        return $this->belongsTo('App\MasterModel\MasterSungai', 'sungai', 'id');
    }

    public function parameters()
    {
        return $this->hasMany('App\Models\Parameter', 'stesen_id', 'id');
    }

    public function parametersNear()
    {
        return $this->hasMany('App\Models\Parameter', 'stesen_id', 'id')->where('is_near', 1);
    }

    public function sungai()
    {
        return $this->hasOne('App\MasterModel\MasterSungai', 'id', 'nama');
    }

    public function lembanganSungai()
    {
        return $this->hasMany('App\MasterModel\MasterSungai', 'lembangan_2020', 'lembangan')->groupBy('sungai_2020');
    }

    public function monthlyCDetail()
    {
        return $this->hasMany(MonthlyCDetail::class, 'stesen_id', 'id');
    }

    public function projectBulananStatus()
    {
        return $this->hasOne(ProjekBulananStatus::class, 'projek_id', 'projek_id');
    }

    public function stesenStatus()
    {
        return $this->hasOne('App\MasterModel\MasterFilingStatus', 'id', 'status');
    }

    public function uploadedFiles()
    {
        return $this->hasManyThrough(UploadedFile::class, EntityFile::class, 'entity_id', 'id', 'id', 'uploaded_file_id');
    }

    public function docType($docType = 'Gambar_stesen')
    {
        if ($docType) {
            return $this->uploadedFiles()->where('doc_type', $docType);
        } else {
            return $this->uploadedFiles();
        }

    }
}
