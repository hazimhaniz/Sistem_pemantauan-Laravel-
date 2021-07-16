<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekAudit extends Model {

    protected $table = 'projek_audit';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public $dates = ['tarikh_audit'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'project_id',
        'tarikh_audit',
        'kekerapan_audit',
        'status_kemajuan',
    ];


    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function status_pengawasan() {
        return $this->belongsTo('App\MasterModel\MasterPeringkatPengawasan', 'status_kemajuan', 'id');
    }

    public function projek(){
        return $this->hasMany('App\Projek','id');
    }

    public function audit() {
        return $this->belongsTo('App\MasterModel\MasterTempohAudit', 'kekerapan_audit', 'id');
    }

}
