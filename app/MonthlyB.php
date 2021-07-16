<?php

namespace App;

use App\Models\EntityFile;
use App\Models\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class MonthlyB extends Model
{
    protected $table = 'monthly_b';

    protected $fillable = ['projek_id', 'bulan', 'tahun'];

    // public $dates = ['tarikh_kelulusan_eia'];

    public function status()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }

    public function attachments()
    {
        return $this->morphMany('App\OtherModel\Attachment', 'filing');
    }

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function pakej()
    {
        return $this->belongsTo('App\ProjekPakej', 'pakej_id', 'id');
    }

    public function uploadedFiles()
    {
        return $this->hasManyThrough(UploadedFile::class, EntityFile::class, 'entity_id', 'id', 'id', 'uploaded_file_id');
    }

    public function docType($docType = null)
    {
        if ($docType) {
            return $this->uploadedFiles()->where('doc_type', $docType);
        } else {
            return $this->uploadedFiles();
        }

    }
}
