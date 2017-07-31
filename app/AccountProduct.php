<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountProduct extends Model
{
    public function account(){
        return $this->belongsTo('App\Account');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }


    //Many to Many
    //to get the ProductFeature
    public function productFeature() {
        return $this->belongsToMany('App\ProductFeature');
    }

}
