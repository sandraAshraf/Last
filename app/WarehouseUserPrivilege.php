<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseUserPrivilege extends Model
{
    //warehouse
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
    //user
    public function user(){
        return $this->belongsTo('App\User');
    }
    //warehouse privilege
    public function warehouseGeneralPrivilege(){
        return $this->belongsTo('App\WarehouseGeneralPrivilege');
    }
}
