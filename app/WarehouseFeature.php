<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseFeature extends Model
{
    public function type() {
        return $this->belongsTo('App\Type');
    }

    //warehouses that has this feature
    public function warehouses(){
        return $this->belongsToMany('App\Warehouse');
    }

    //returns the object that contains the account that preferred  this feature with a product
    public function preferredAccountProduct(){
        return $this->hasMany('App\PreferredAccountProductWarehouseFeature');
    }

}

