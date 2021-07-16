<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyApplication extends Model
{
    protected $table = 'monthly_application';

    public function projekdetail() {
        return $this->belongsTo('App\ProjekDetail', 'projek_id', 'projek_id');
    }
}
