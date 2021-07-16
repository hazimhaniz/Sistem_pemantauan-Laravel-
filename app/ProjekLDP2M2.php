<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UploadedFile;
use App\Models\EntityFile;

class ProjekLDP2M2 extends Model
{

    protected $table = 'projek_ldp2m2';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public $dates = ['tarikh_kelulusan'];

    public static function register(array $attribute)
    {
        return new static($attribute);
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
