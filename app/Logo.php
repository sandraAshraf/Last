<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    //The account that owns the logo.
    public function account(){
        return $this->belongsTo('App\Account');
    }

}
