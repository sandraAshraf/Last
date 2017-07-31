<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function productFeatures() {
        return $this->hasMany('App\ProductFeature');
    }
}
