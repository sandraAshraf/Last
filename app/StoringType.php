<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoringType extends Model
{
    public function warehouseSections(){
        return $this->hasMany('App\WarehouseSection');
    }

    public function locations() {
        return $this->hasMany('App\Location');
    }

    public function warehouse(){
        return $this->belongsToMany('App\Warehouse');
    }

}
