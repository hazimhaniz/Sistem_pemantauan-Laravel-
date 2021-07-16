<?php

namespace App;

use App\Models\EntityFile;
use App\Models\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class MonthlyDBulanan extends Model
{
    protected $table = 'monthly_d_bulanan';
    protected $fillable = [
        'monthlyD_id',
        'elemen_pemeriksaan',
        'jenis_komponen',
        'ulasan',
        'kod_bmp',
        'kod_bmp_status',
        'kod_bmp_date',
        'gambar'
    ];

    public $dates = ['kod_bmp_date'];

    public function kodbmp()
    {
        return $this->belongsTo('App\MasterModel\MasterKodBMP', 'kod_bmp', 'id');
    }
    public function elemen()
    {
        return $this->belongsTo('App\MasterModel\MasterElemenPemeriksaan', 'elemen_pemeriksaan', 'id');
    }

    public function uploadedFiles()
    {
        return $this->hasManyThrough(UploadedFile::class, EntityFile::class, 'entity_id', 'id', 'id', 'uploaded_file_id');
    }

    public function docType($docType = 'borang_D_attach')
    {   

        if ($docType) { 
            return $this->uploadedFiles()->where('doc_type', $docType);
        } else {
           return $this->uploadedFiles();
       }

   }
}


