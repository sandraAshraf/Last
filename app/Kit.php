<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kit extends Model
{
    //The warehouse that this kit was created at.
    public function warehouse() {
        return $this->belongsTo('App\Warehouse');
    }

    //The products in this kit.
    public function products() {
        return $this->belongsToMany('App\Product');
    }

}
