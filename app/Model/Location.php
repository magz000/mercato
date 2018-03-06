<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

    public function limitLocation(){
        return $this->hasMany('App\Model\LocationLimit');
    }
}
