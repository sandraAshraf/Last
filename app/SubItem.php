<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubItem extends Model
{
    public function itemProduct(){
        return $this->belongsTo('App\ItemProduct');
    }

    //The transaction information that this item production belongs to.
    public function transactionInformation() {
        return $this->hasMany('App\TransactionInformation');
    }


}
