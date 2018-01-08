<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\ProductCategory;
use App\Model\Provider;
use App\Model\ProviderLocation;

class Product extends Model
{

    public static function result_category($category_id, $date, $location) {

        $products = Product::where('status', '=', 1)->get();
        $resultIds = array();

        $pCategory = ProductCategory::where('id', '=', $category_id)->get()->first();

        if($category_id != 0) {
            $category_id = array();
            if($pCategory->parent == null) {
                $subs = ProductCategory::get_sub($pCategory->id);
                foreach ($subs as $key => $sub) {
                    $category_id[] = $sub->id;
                }
            } else {
                $category_id[] = $pCategory->id;
            }
        }

        foreach ($products as $product) {
            if($category_id != 0)
                if(!in_array($product->category_id, $category_id)) continue;

            $locations = ProviderLocation::where('provider_id','=', $product->provider_id)
                                        ->where('location', '=', $location)->get()->first();

            if($locations == null) continue;

            if($product->non_expiry == 1) {
                $resultIds[] = $product->id;
            } else {
                $date_start = strtotime($product->day_start);
                $date_end   = strtotime($product->day_end);
                $date_curr  = strtotime($date);

                if($date_start <= $date_curr && $date_end >= $date_curr) $resultIds[] = $product->id;
                else continue;

            }
        }

        $result = Product::whereIn('id', $resultIds)->paginate(8);
        return $result;
    }

    public static function result_food($name, $date, $location) {

        $products = Product::where('status', '=', 1)->where('name', 'LIKE', "%$name%")->get();
        $resultIds = array();
        foreach ($products as $product) {
            $locations = ProviderLocation::where('provider_id','=', $product->provider_id)
                                        ->where('location', '=', $location)->get();

            if($locations == null) continue;

            if($product->non_expiry == 1) {
                $resultIds[] = $product->id;
            } else {
                $date_start = strtotime($product->day_start);
                $date_end   = strtotime($product->day_end);
                $date_curr  = strtotime($date);

                if($date_start <= $date_curr && $date_end >= $date_curr) $resultIds[] = $product->id;
                else continue;
            }
        }

        $result = Product::whereIn('id', $resultIds)->paginate(8);
        return $result;
    }


    public static function delivery_type($type) {
        if ($type == 1) {
            return "Standard Delivery";
        } else if($type == 2) {
            return "By Arrangement";
        }
    }

    public static function status($status) {
        if($status == 1) {
            return "Published";
        } else {
            return "Draft";
        }
    }

}
