<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function from_user(){
        return $this->belongsTo('App\User', 'from_user_id');
    }

    public function to_user(){
        return $this->belongsTo('App\User', 'to_user_id');
    }

    //The transaction information that this item production belongs to.
    public function transactionInformation() {
        return $this->hasMany('App\TransactionInformation');
    }

}
