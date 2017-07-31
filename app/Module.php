<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //Accounts that bought this module (Many to Many).
    public function accounts(){
        return $this->belongsToMany('App\Account');
    }
}


