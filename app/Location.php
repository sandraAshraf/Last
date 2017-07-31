<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function warehouse() {
        return $this->belongsTo('App\Warehouse');
    }

    public function warehouseSection() {
        return $this->belongsTo('App\WarehouseSection');
    }

    public function storingType() {
        return $this->belongsTo('App\StoringType');
    }

    public function items() {
        return $this->hasMany('App\Item');
    }

}
