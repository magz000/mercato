<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function state($status) {
        if($status == 1) {
            return array("state" => "warning", "value" => "Pending Payment");
        } else if($status == 2) {
            return array("state" => "success", "value" => "Paid");
        }
    }
}
