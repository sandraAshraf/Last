<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionInformation extends Model
{
    public function itemProduct() {
        return $this->belongsTo('App\ItemProduct');
    }

    public function subItem() {
        return $this->belongsTo('App\SubItem');
    }

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

}
