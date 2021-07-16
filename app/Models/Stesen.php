<?php

namespace App\Models;

use App\Projek;
use Illuminate\Database\Eloquent\Model;
use App\Models\EntityFile;
use App\Models\UploadedFile;

class Stesen extends Model
{
    public $table = 'stesen';

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
        'bulan'
    ];
    
    public $fieldSearchable = [
        'stesen',
        'longitud',
        'latitud',
    ];

    public function parameters()
    {
        return $this->hasMany(Parameter::class, 'stesen_id', 'id');
    }

    public function sungai()
    {
        return $this->hasOne(MasterSungai::class, 'id', 'nama');
    }

    public function lembanganSungai()
    {
        return $this->hasMany(MasterSungai::class, 'lembangan_2020', 'lembangan')->groupBy('sungai_2020');
    }

    public function monthlyC()
    {
        return $this->hasMany('App\Models\MonthlyCDetail', 'id', 'stesen_id');
    }

    public function projek()
    {
        return $this->belongsTo(Projek::class, 'projek_id', 'id');
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
