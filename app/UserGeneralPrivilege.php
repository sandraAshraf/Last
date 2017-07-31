<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGeneralPrivilege extends Model
{
    public function users() {
        return $this->belongsToMany('App\User', 'user_privilege');
    }


}
