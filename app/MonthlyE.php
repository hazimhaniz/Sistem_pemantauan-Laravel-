<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\EntityFile;
use App\Models\UploadedFile;

class MonthlyE extends Model
{
    protected $table = 'monthly_e';

    protected $fillable = [
    	'projek_id',
        'tahun',
        'bulan',
    ];

    public function status() {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }

    public function projekaudit() {
        return $this->belongsTo('App\ProjekAudit','audit_id','id');
    }
	
	public function projek() {
        return $this->belongsTo('App\Projek','projek_id','id');
    }
	
    public function attachments() {
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
