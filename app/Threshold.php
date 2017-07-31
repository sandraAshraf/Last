<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    //The account that set this threshold.
    public function account(){
        return $this->belongsTo('App\Account');
    }

    //The warehouse that this Threshold was set in.
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }

    //The product that this threshold was set on.
    public function product (){
        return $this->belongsTo('Product');
    }
}
