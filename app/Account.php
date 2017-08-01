<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function package() {
        return $this->belongsTo('App\Package');
    }

    public function user() {
        return $this->hasMany('App\User');
    }

    //Products created by that account.
    public function products() {
        return $this->hasMany('App\Product');
    }

    //Industries created by that account.
    public function industries() {
        return $this->belongsToMany('App\Industry');
    }

    //Categories created by that account.
    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    //Warehouses owned by that account.
    public function warehouses() {
        return $this->hasMany('App\Warehouse');
    }

    //Items entered by that account.
    public function items() {
        return $this->hasMany('App\Item');
    }

    //Product dealt by that account
    //but to get the products you need to perform another call from AccountProduct to product()
    //we will need to loop through that collection to get the product for them (if they are plural)
    public function accountProduct() {
        return $this->hasMany('App\AccountProduct');
    }

    //Warehouses that have requests to enter some items.
    public function warehousesWithRequests() {
        return $this->belongsToMany('App\Warehouse', 'item_warehouse');

    }

    //Items needed to be approved in my warehouses
    //Example for inserting in that pivot table
    // $a->itemsWithRequests()->attach(1, ['warehouse_id'=>2])
    public function itemsWithRequests() {
        return $this->belongsToMany('App\Item', 'item_warehouse');
    }

    //Invitations sent by this account.
    public function sentInvitations() {
        return $this->hasMany('App\Invitation', 'account_id');
    }

    //Invitations received by this account.
    public function  receivedInvitations() {
        return $this->hasMany('App\Invitation', 'invited_account_id');
    }

    //Returns the object that contains the preferred warehouse features with a specific product.
    public function preferredProductWarehouseFeatures() {
        return $this->hasMany('App\PreferredAccountProductWarehouseFeature');
    }

    //Modules that this account bought(Many to Many).
    public function modules() {
        return $this->belongsToMany('App\Module');
    }


    //The threshold that was set by this account.
    public function thresholds() {
        return $this->hasMany('App\Threshold');
    }

    public function logo() {
        return $this->hasOne('App\Logo');
    }

    //To find the warehouses that this account deals with as a vendor.
    public function vendorWarehouses() {
        return $this->belongsToMany('App\Warehouse', 'vendor_warehouses', 'vendor_account_id', 'warehouse_id');
    }


    public function vendors(){
        return $this->belongsToMany('App\Account', 'vendor_customers', 'customer_account_id', 'vendor_account_id');
    }

    public function customers(){
        return $this->belongsToMany('App\Account', 'vendor_customers', 'vendor_account_id', 'customer_account_id');
    }


    //comment for comment
}
