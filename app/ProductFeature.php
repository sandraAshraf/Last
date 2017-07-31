<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFeature extends Model
{
    public function type() {
        return $this->belongsTo('App\Type');
    }
    //Many to Many
    //to get the account_Product that has that feature
    //we will need to call a function from account_product to access the account or the product
    public function accountProduct() {
        return $this->belongsToMany('App\AccountProduct');
    }

    //The items that has this feature.
    public function items() {
        return $this->belongsToMany('App\Item');
    }

    //Returns the exit strategy that depends on this feature.
    public function exitStrategies() {
        return $this->hasMany('App\ExitStrategy');
    }

}
