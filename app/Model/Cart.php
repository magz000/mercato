<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

use App\Model\Product;

class Cart extends Model
{

    protected $table = 'carts';


    public static function add_cart($user_id, $product_id, $date, $time, $location) {

        $check = Cart::where('product_id', '=', $product_id)
                    ->where('user_id', '=', $user_id)
                    ->where('pickup_date', '=', $date)
                    ->where('pickup_time', '=', $time)
                    ->where('pickup_location', '=', $location)->get()->first();


        $product = Product::find($product_id);

        if($check == null) {

            $cart = new Cart;
            $cart->user_id              = $user_id;
            $cart->product_id           = $product_id;
            $cart->quantity             = 1;
            $cart->price                = $product->sale_price != null ? $product->sale_price : $product->price;
            $cart->total                = $product->sale_price != null ? $product->sale_price : $product->price;
            $cart->pickup_location      = $location;
            $cart->pickup_date          = $date;
            $cart->pickup_time          = $time;
            $cart->save();

            return 'Added';
        } else {

            $check->quantity    = $check->quantity + 1;
            $check->total       = $check->total + ($product->sale_price != null ? $product->sale_price : $product->price);
            $check->save();

            return 'Updated';
        }

    }
}
