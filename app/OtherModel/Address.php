<?php

namespace App\OtherModel;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'address1',
        'address2',
        'address3',
        'postcode',
        'state_id',
        'district_id'
    ];

    public function district() {
        return $this->belongsTo('App\MasterModel\MasterDistrict', 'district_id', 'id');
    }

    public function state() {
        return $this->belongsTo('App\MasterModel\MasterState', 'state_id', 'id');
    }

    public function address123() {
        return $this->address1." ".$this->address2." ".$this->address3;
    }

    public function fulladdress() {

        $address = $this->address1;
        if ($this->address2) {
            $address .= " ".$this->address2;
        }
        if ($this->address3) {
            $address .= " ".$this->address3;
        }
        if ($this->postcode) {
            $address .= ", ".$this->postcode;
        }
        if ($this->district) {
            $address .= ", ".$this->district->name;
        }
        if ($this->state) {
            $address .= ", ".$this->state->name;
        }
        return $address;
    }
}
