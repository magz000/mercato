<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\Model\OrderContent;

class Order extends Model
{
    public static function state($status) {
        if($status == 1) {
            return array("state" => "warning", "value" => "Pending Payment");
        } else if($status == 2) {
            return array("state" => "success", "value" => "Paid");
        }
    }

    public static function format($order_id) {
        $contents = OrderContent::where('order_id', '=', $order_id)->groupBy('pickup_location')->get();
        $order = Order::where('id', '=', $order_id)->get()->first();
        $b1=$b2=$b3=$b4="";

        foreach ($contents as $key => $content) {
            if($key == 0) {
                $b1 .= str_pad($content->pickup_location, 2, "0", STR_PAD_LEFT);
            } else {
                $b1 = "00";
            }

            if($key ==1) {
                $b2 .= str_pad($content->pickup_location, 2, "0", STR_PAD_LEFT);
            } else {
                $b2 = "00";
            }

            if($key == 2) {
                $b3 .= str_pad($content->pickup_location, 2, "0", STR_PAD_LEFT);
                break;
            } else {
                $b3 = "00";
            }

            if($key == 2) {
                $b4 .= str_pad($content->pickup_location, 2, "0", STR_PAD_LEFT);
                break;
            } else {
                $b4 = "00";
            }
        }

        $part1 = $b3.$b2.$b1;
        $part2 = date('dmy', strtotime($order->created_at));
        $part3 = str_pad($order->id, 6, "0", STR_PAD_LEFT);

        return $part1 . '-' . $part2 . '-' . $part3;
    }
}
