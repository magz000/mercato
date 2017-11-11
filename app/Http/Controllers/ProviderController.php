<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

// Import Models
use App\Model\PageView;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\Provider;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderContent;
use App\Model\OrderTransaction;
use App\Model\OrderRating;

class ProviderController extends Controller
{
    public function __construct() {
        $this->middleware('auth:p');
    }

    private function provider_id() {
        return Auth::guard('p')->user()->id;
    }

    public function dashboard() {
        return view('provider.dashboard');
    }

    public function products() {
        $data['products'] = Product::where('provider_id', $this->provider_id())->get();
        return view('provider.products.all')->with($data);
    }

    public function product_add() {
        $data["MainCategories"]    = ProductCategory::get_main();
        $data["SubCategories" ]    = function($parent) {
                return ProductCategory::get_sub($parent);
            };
        return view('provider.products.add')->with($data);
    }

    public function product_add_process(Request $request) {

        $this->validate($request, [
            "image_base64"  => 'required',
            "name"          => 'required',
            "price"         => 'required',
            "quantity"      => 'required',
            "description"   => 'required',
            "start"         => 'required',
            "end"           => 'required',
            "category"      => 'required'
        ]);

        $filename  = time() . '.jpg';
		$path = public_path().'/img/uploads/'. $filename;
        $manager = new ImageManager(array('driver' => 'GD'));
        $manager->make(file_get_contents($request->image_base64))->save($path);

        $product = new Product;
        $product->provider_id       = $this->provider_id();
        $product->name              = $request->name;
        $product->qty              = $request->quantity;
        $product->price             = $request->price;
        $product->description       = $request->description;
        $product->picture           = $filename;
        $product->category_id       = $request->category;
        $product->day_start         = $request->start;
        $product->day_end           = $request->end;
        $product->delivery_type           = 1;
        $product->non_expiry        = $request->non_expiry != null ? 1 : 0;
        $product->status            = $request->status != null ? 1 : 0;
        $product->save();

        return redirect(route('providerProductPage'))->with('success', 'Successfully added a product.');

    }

    public function orders() {
        $data["order_ids"] = OrderContent::where('provider_id', '=', $this->provider_id())->groupBy('order_id')->pluck('order_id');
        return view('provider.orders.all')->with($data);
    }

    public function profile() {

    }

    public function logout() {
        Auth::logout();
        return redirect(route('landingPage'));
    }
}
