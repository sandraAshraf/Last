<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseGeneralPrivilege extends Model
{

    //to find the warehouse that a user has a specific privilege on it call user() and warehouse()
    public function warehouseUserPrivilege(){
        return $this->hasMany('App\WarehouseUserPrivilege');
    }


}
