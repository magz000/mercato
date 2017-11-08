<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Imports Models
use App\Model\PageView;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\Provider;
use App\Model\Cart;

class GeneralController extends Controller
{

    public function __construct() {
        PageView::insert();
    }

    // TODO : Displays the Landing Page
    public function index() {
        $data = array(
            "MainCategories"    => ProductCategory::get_main(),
            "SubCategories"     => function($parent) {
                    return ProductCategory::get_sub($parent);
                }
        );
        return view('public.landing')->with($data);
    }

    public function search(Request $request) {

        $results = null;

        if($request->type == 1) {
            $results = Product::result_category($request->category, $request->date, $request->location);
        }

            $data = array(
                "MainCategories"    => ProductCategory::get_main(),
                "SubCategories"     => function($parent) {
                        return ProductCategory::get_sub($parent);
                    },
                "Provider"          => function($provider_id) {
                        return Provider::find($provider_id);
                    },
                "input"            => $request,
                "results"            => $results
            );
            return view('public.search')->with($data);
    }

    public function user_page(Request $request, $username) {

        $Provider =  Provider::where('username', '=', $username)->get()->first();
        $data = array(
            "MainCategories"    => ProductCategory::get_main(),
            "SubCategories"     => function($parent) {
                    return ProductCategory::get_sub($parent);
                },
            "Provider"          => $Provider,
            "Products"          => Product::where('provider_id', '=', $Provider->id)->get(),
        );


        return view('public.profile')->with($data);
    }

    // TODO: POST Methods
    public function add_cart(Request $request) {
        $this->validate($request, [
            "prid" => 'required',
            "crdate" => 'required',
            "crtime" => 'required',
            "loca" => 'required'
        ]);

        Cart::add_cart(Auth::guard('u')->user()->id, $request->prid, $request->crdate, $request->crtime, $request->loca);

        return redirect(url()->previous())->with('addcart_success', 'Successfully added to Cart.');
    }

    // Below are the API for the Resources
    public function resources_product($id) {
        header('Content-Type: image/jpeg');
        $product = Product::find($id);
        echo $product->picture;
    }

    public function resources_provider($id) {
        header('Content-Type: image/jpeg');
        $provider = Provider::find($id);
        echo $provider->picture;
    }
}
