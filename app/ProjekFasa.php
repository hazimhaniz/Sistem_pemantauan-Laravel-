<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UploadedFile;
use App\Models\EntityFile;

class ProjekFasa extends Model {

    protected $table = 'projek_fasa';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = ['projek_id'];

    public $dates = ['tarikh_mula', 'tarikh_akhir'];

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

    public function uploadedFiles()
    {
        return $this->hasManyThrough(UploadedFile::class, EntityFile::class, 'entity_id', 'id', 'id', 'uploaded_file_id');
    }

    public function docType($docType = NULL)
    {
        if($docType)
        {
            return $this->uploadedFiles()->where('doc_type', $docType);
        }
        // else{
        //     return $this->uploadedFiles();
        // }
        
    }
}
