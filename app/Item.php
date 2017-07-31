<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //The location that the that item in.
    public function location() {
        return $this->belongsTo('App\Location');
    }

    public function account() {
        return $this->belongsTo('App\Account');
    }


    public function itemProducts(){
        return $this->hasMany('App\ItemProduct');
    }

    //this account will approve the received request to enter that item.
    public function accounts(){
        return $this->belongsToMany('App\Account', 'item_warehouse');
    }

    //the warehouse that is requested to put that item at.
    public function warehouses(){
        return $this->belongsToMany('App\Warehouse', 'item_warehouse');
    }

    //the features of the item (Many to Many)
    public function itemFeatures(){
        return $this->belongsToMany('App\ProductFeature');
    }


}
