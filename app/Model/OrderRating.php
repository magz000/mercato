<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderRating extends Model
{
    public static function is_rated($content_id) {
        $rating = OrderRating::where('order_id', '=', $content_id)->get();
        if(count($rating) >= 1) {
            return $rating;
        }

        return null;
    }

    public static function all_rated($contents) {
        foreach ($contents as $key => $content) {
            $rating = OrderRating::where('order_id', '=', $content->id)->get()->first();

            if($rating == null) {
                return false;
            }

        }

        return true;
    }
}
