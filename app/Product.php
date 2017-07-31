<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //The account that entered the product.
    public function account() {
        return $this->belongsTo('App\Account');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function items() {
        return $this->hasMany('App\Item');
    }
    public function itemProduct() {
        return $this->hasMany('App\ItemProduct');
    }

    //the account dealt with product
    //but to get the account you need to perform another call from AccountProduct to account()
    //we will need to loop through that collection to get the account for them (if they are plural)
    public function accountProduct() {
        return $this->hasMany('App\AccountProduct');
    }

    //returns the object that contains the account and the his preferred warehouse features with this product.
    public function preferredAccountWarehouseFeatures() {
        return $this->hasMany('App\PreferredAccountProductWarehouseFeature');
    }

    //The threshold that was set on this product.
    public function thresholds() {
        return $this->hasMany('App\Threshold');
    }


    public function exitStrategies() {
        return $this->hasMany('App\ExitStrategy');
    }

    //Kits that includes this product.
    public function kits() {
        return $this->belongsToMany('App\Kit');
    }

}
