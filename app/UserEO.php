<?php

namespace App;

use App\Models\EntityFile;
use App\Models\UploadedFile;
use App\ProjekHasUser;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEO extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_eo';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'no_kompetensi',
        'date_kompetensi',
        'deleted_at'
    ];

    public function user()
    {
        return $this->morphOne('App\User', 'entity');
    }

    public function isOnline()
    {
        return \Cache::has('user-is-online-' . $this->id);
    }

    public static function getEO($projekID)
    {
        $listEO = "";

        $listEO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id', 5)
            ->where('projek_has_user.projek_id', $projekID)
            ->get();

        return $listEO;

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
