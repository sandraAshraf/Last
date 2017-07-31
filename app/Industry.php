<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    //
    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function accounts(){
        return $this->belongsToMany('App\Account');
    }
}
