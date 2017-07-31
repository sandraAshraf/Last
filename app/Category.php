<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function industry(){
        return $this->belongsTo('App\Industry');
    }

    public function accounts(){
        return $this->belongsToMany('App\Account');
    }

    public function products(){
        return $this->belongsToMany('App\Product');
    }

}
