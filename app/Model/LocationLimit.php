<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LocationLimit extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\Model\User');
    }

    public function location(){
        return $this->belongsTo('App\Model\Location');
    }


}
