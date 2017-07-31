<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    //the account that sent the invitation
    public function account(){
        return $this->belongsTo('App\Account', 'account_id');
    }

    //the invited account
    public function invitedAccount(){
        return $this->belongsTo('App\Account', 'invited_account_id');
    }
}
