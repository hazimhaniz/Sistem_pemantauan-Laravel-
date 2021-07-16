<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MakmalAkreditasi extends Model
{
    protected $table = 'makmal_akreditasi';

    public function makmal() {
        return $this->belongsTo('App\MasterModel\MasterPengawasan', 'skop_pengawasan', 'id');
    }
}
