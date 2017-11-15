<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Product;

class OrderRating extends Model
{
    public static function is_rated($content_id) {
        $rating = OrderRating::where('content_id', '=', $content_id)->get();
        if(count($rating) >= 1) {
            return $rating;
        }

        return null;
    }

    public static function all_rated($contents) {
        foreach ($contents as $key => $content) {
            $rating = OrderRating::where('content_id', '=', $content->id)->get()->first();

            if($rating == null) {
                return false;
            }

        }
        return true;
    }

    public static function get_rating($product_id) {
        $rating_count = OrderRating::where('product_id', '=', $product_id)->count();
        $rating_sum = OrderRating::where('product_id', '=', $product_id)->sum('total');
        return $rating_count == 0 ? '5' : ceil($rating_sum/$rating_count);
    }

    public function get_provider_rating($provider_id) {
        $products = Product::where('provider_id', '=', $provider_id)->get();
        $total=$count=0;

        foreach ($products as $product) {
            $total += OrderRating::get_rating($product->id);
            $count++;
        }

        return $count == 0 ? '5' : floor($total/$count);
    }

}
