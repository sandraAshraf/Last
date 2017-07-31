<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function account(){
        return $this->belongsTo('App\Account');
    }

    public function locations() {
        return $this->hasMany('App\Location');
    }

    public function storingType(){
        return $this->belongsToMany('App\StoringType');
    }

    //the items that need to be approved to entered in this warehouse
    public function itemsToBeApproved() {
        return $this->belongsToMany('App\Item', 'item_warehouse');
    }
    //useless function, for the pivot table(item_warehouse)
    public function accounts() {
        return $this->belongsToMany('App\Account', 'item_warehouse');
    }

    //to find the user that has a specific privilege call privilege() and user()
    public function WarehouseUserPrivilege(){
        return $this->hasMany('App\WarehouseUserPrivilege');
    }

    //the features that this warehouse has
    public function warehouseFeatures(){
        return $this->belongsToMany('App\WarehouseFeature');
    }

    //The threshold that was set in this warehouse.
    public function thresholds(){
        return $this->hasMany('App\Threshold');
    }

    public function exitStrategies() {
        return $this->hasMany('App\ExitStrategy');
    }

    //The kits created in this warehouse.
    public function kits() {
        return $this->hasMany('App\Kit');
    }

    //To find the vendors that deal with this warehouses.
    public function warehouseVendors() {
        return $this->belongsToMany('App\Account', 'vendor_warehouses', 'warehouse_id', 'vendor_account_id');
    }

}
