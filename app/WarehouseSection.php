<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseSection extends Model
{
    public function storingType(){
        return $this->belongsTo('App\StoringType');
    }

    public function locations() {
        return $this->hasMany('App\Location');
    }
}
