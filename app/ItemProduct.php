<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemProduct extends Model
{
    public function subItem(){
        return $this->hasMany('App\SubItem');
    }

    public function item() {
        return $this->belongsTo('App\Item');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    //The transaction information that this item production belongs to.
    public function transactionInformation() {
        return $this->hasMany('App\TransactionInformation');
    }

}
