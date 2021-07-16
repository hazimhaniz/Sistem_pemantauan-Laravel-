<?php

namespace App;

use App\Models\EntityFile;
use App\Models\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class MonthlyBSyarat extends Model
{
    protected $table = 'monthly_b_syarat';

    protected $fillable = [
        'id',
    ];

    public function monthlyb()
    {
        return $this->belongsTo('App\MonthlyB', 'monthly_b_id', 'id');
    }

    public function senaraiSyarat(){
        return $this->belongsTo('App\MonthlyBSyaratRegister','syarat','id');
    }

    public function attachments()
    {
        return $this->morphMany('App\OtherModel\Attachment', 'filing');
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
