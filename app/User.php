<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function account(){
        return $this->belongsTo('App\Account');
    }

    public function transactionsAsSender(){
        return $this->hasMany('App\Transaction', 'from_user_id');
    }

    public function transactionsAsReceiver(){
        return $this->hasMany('App\Transaction', 'to_user_id');
    }

    //The User's privileges
    public function privileges() {
        return $this->belongsToMany('App\UserGeneralPrivilege', 'user_privilege');
    }



    //to find the warehouse that this user has a specific privilege call privilege() and warehouse()
    public function WarehouseUserPrivilege(){
        return $this->hasMany('App\WarehouseUserPrivilege');
    }
}
