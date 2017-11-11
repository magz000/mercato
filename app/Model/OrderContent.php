<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderContent extends Model
{
    protected $table = 'order_products';

    public static function state($status) {
        if($status == 0) {
            return array("state" => "warning", "value" => "Pending");
        } else if($status == 1) {
            return array("state" => "primary", "value" => "Cooking");
        } else if($status == 2) {
            return array("state" => "success", "value" => "Ready for Pickup");
        } else if($status == 3) {
            return array("state" => "success", "value" => "Picked Up");
        } else if($status == 4) {
            return array("state" => "danger", "value" => "Expired");
        }
    }

    public static function expire($content) {
        $order      = Order::find($content->order_id);

        $pickup = strtotime($content->pickup_date . ' ' . $content->pickup_time);

        if($order->status == 1) {
            if(time() > $pickup) {
                $content->status = 4;
                $content->save();

                return true;
            }
        } else {
            if($content->status == 2) {
                if(time() > strtotime('+6 hours', $pickup)) {
                    $content->status = 4;
                    $content->save();

                    return true;
                }
            }
        }

        return false;
    }

    public static function rating($order_id) {


        // Check if all the content of the order is expired
        $expired = array();
        $contents = OrderContent::where('order_id', '=', $order_id)->get();
        foreach ($contents as $content) {
            if($content->status == 4) $expired[] = $content->id;
        }

        // Verify if the number of expired content is
        // equal to the number of contents then return false
        if(count($contents) == count($expired)) return false;
        
        foreach ($contents as $content) {
            if($content->status == 4) continue;
            if($content->status != 3) return false;
        }

        return true;

    }

}
