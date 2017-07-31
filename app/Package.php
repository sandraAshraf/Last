<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{


    public function account(){
        return $this->hasOne('App\Account');
    }

}
