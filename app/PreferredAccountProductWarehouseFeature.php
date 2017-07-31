<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferredAccountProductWarehouseFeature extends Model
{

    public function account(){
        return $this->belongsTo('App\Account');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function warehouseFeature(){
        return $this->belongsTo('App\WarehouseFeature');
    }
}
