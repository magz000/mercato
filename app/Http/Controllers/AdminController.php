<?php

namespace App\Http\Controllers;

use App\Model\LocationLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

// Import Models
use App\Model\PageView;
use App\Model\AuditTrail;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\Provider;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderContent;
use App\Model\OrderTransaction;
use App\Model\OrderRating;
use App\Model\Admin;
use App\Model\User;
use App\Model\Location;

// Reports
use App\Model\Reports;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('auth:a')->except(['index', 'login']);
    }

    public function index() {
        return view('admin.login');
    }

    public function dashboard(Request $request) {
        return view('admin.dashboard')->with(['input' => $request]);
    }

    public function orders() {

        $data['orders']     = Order::orderBy('created_at', 'desc')->get();
        $data['contents']   = function($order_id) {
                return OrderContent::where('order_id', '=', $order_id)->get();
        };

        return view('admin.orders')->with($data);
    }

    public function providers() {
        $data['providers'] = Provider::paginate(20);
        return view('admin.providers.all')->with($data);
    }

    public function provider_view($provider_id) {
        $data['provider'] = Provider::find($provider_id);
        return view('admin.providers.profile')->with($data);
    }

    public function provider_products($provider_id) {
        $data['provider'] = Provider::find($provider_id);
        $data['products'] = Product::where('provider_id', '=', $provider_id)->get();
        return view('admin.providers.products')->with($data);
    }

    public function provider_orders($provider_id) {
        $data['provider'] = Provider::find($provider_id);
        $data["order_ids"] = OrderContent::where('provider_id', '=', $provider_id)->orderBy('created_at', 'desc')->groupBy('order_id')->pluck('order_id');
        return view('admin.providers.orders')->with($data);
    }

    public function provider_activities($provider_id) {
        $data['provider'] = Provider::find($provider_id);
        $data['activities'] = AuditTrail::where('user_type', '=', '2')->where('auth_id', '=', $provider_id)->get();
        return view('admin.providers.activities')->with($data);
    }


    public function clients() {
        $data['clients'] = User::latest()->paginate(20);
        return view('admin.clients.all')->with($data);
    }

    public function client_view($client_id) {
        $data['client'] = User::find($client_id);
        return view('admin.clients.profile')->with($data);
    }

    public function client_orders($client_id) {
        $data['client'] = User::find($client_id);
        $data["orders"] = Order::where('user_id', '=', $client_id)->orderBy('created_at', 'desc')->get();
        $data['contents']   = function($order_id) {
                return OrderContent::where('order_id', '=', $order_id)->get();
        };
        return view('admin.clients.orders')->with($data);
    }

    public function client_activities($client_id) {
        $data['client'] = User::find($client_id);
        $data['activities'] = AuditTrail::where('user_type', '=', '1')->where('auth_id', '=', $client_id)->get();
        return view('admin.clients.activities')->with($data);
    }


    public function client_location($id){
        $user = User::find($id);
        $location = Location::whereNotIn('id', LocationLimit::select('location_id')->where('user_id', $id))->get();

        return view('admin.clients.limit')->with(["client" => $user, "locations" => $location]);
    }

    public function client_location_add($id, Request $request){
        $limit = new LocationLimit;

        $limit->user_id = $id;
        $limit->location_id = $request->input('location');
        $limit->save();

        return redirect()->back()->with('success', 'Successfully added');
    }


    public function client_location_delete(Request $request){
        $limit = LocationLimit::findOrFail($request->input('id'));

        $limit->delete();

        return redirect()->back()->with('success', 'Successfully deleted');
    }

    public function client_changeestablishment($id){
        $user = User::findOrFail($id);

        if($user->is_establishment == null || $user->is_establishment == 0){
            $user->is_establishment = 1;
        }elseif($user->is_establishment == 1){
            $user->is_establishment = 0;
        }

        $user->save();

        return redirect()->back()->with('success', 'Status Changed Successfully');
    }

    public function category() {
        $data['categories'] = ProductCategory::paginate(20);
        return view('admin.categories.all')->with($data);
    }

    public function category_add() {
        $data['categories'] = ProductCategory::where('parent', '=', null)->get();
        return view('admin.categories.add')->with($data);
    }

    public function category_add_process(Request $request) {
        $this->validate($request, [
            'name'  =>'required',
            'category_type' => 'required'
        ]);

        if($request->category_type == 1) {
            $filename  = time() . '.jpg';
    		$path = public_path().'/img/categories/'. $filename;
            $manager = new ImageManager(array('driver' => 'GD'));
            $manager->make(file_get_contents($request->image_base64))->save($path);

            $category = new ProductCategory;
            $category->name = $request->name;
            $category->parent = null;
            $category->image = $filename;
            $category->save();

            AuditTrail::log('product_categories', 'inserted new Main Category ' . $category->name);
            return redirect(route('admin.category'))->with('success', 'Successfully added a new Main Category');

        } else {
            $category = new ProductCategory;
            $category->name = $request->name;
            $category->parent = $request->parent;
            $category->image = null;
            $category->save();
            AuditTrail::log('product_categories', 'inserted new Sub Category ' . $category->name);
            return redirect(route('admin.category'))->with('success', 'Successfully added a new Sub Category');
        }

    }

    public function category_edit($category_id) {
        $data['categories'] = ProductCategory::where('parent', '=', null)->get();
        $data['categ'] = ProductCategory::find($category_id);
        return view('admin.categories.edit')->with($data);
    }

    public function category_edit_process(Request $request, $category_id) {
        $this->validate($request, [
            'name'  =>'required',
            'category_type' => 'required'
        ]);

        if($request->category_type == 1) {
            $filename  = time() . '.jpg';
            $path = public_path().'/img/categories/'. $filename;
            $manager = new ImageManager(array('driver' => 'GD'));
            $manager->make(file_get_contents($request->image_base64))->save($path);

            $category = ProductCategory::find($category_id);
            $category->name = $request->name;
            $category->parent = null;
            $category->image = $filename;
            $category->save();
            AuditTrail::log('product_categories', 'Updated Main Category #' . $category->id);
            return redirect(route('admin.category'))->with('success', 'Successfully added a new Main Category');

        } else {
            $category = ProductCategory::find($category_id);
            $category->name = $request->name;
            $category->parent = $request->parent;
            $category->image = null;
            $category->save();
            AuditTrail::log('product_categories', 'Updated Sub Category #' . $category->id);
            return redirect(route('admin.category'))->with('success', 'Successfully added a new Sub Category');
        }

    }


    public function location() {
        $data['locations'] = Location::paginate(20);
        return view('admin.locations.all')->with($data);
    }

    public function location_add() {
        return view('admin.locations.add');
    }

    public function location_add_process(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $location = new Location;
        $location->name = $request->name;
        $location->color = $request->color;
        $location->save();
        AuditTrail::log('locations', 'inserted a new Pick-up Location' . $location->name);
        return redirect(route('admin.locations'))->with('success', 'Successfully added a new Pick-up Location');
    }

    public function location_edit($location_id) {
        $data['loc'] = Location::find($location_id);
        return view('admin.locations.edit')->with($data);
    }

    public function location_edit_process(Request $request, $location_id) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $location = Location::find($location_id);
        $location->name = $request->name;
        $location->color = $request->color;
        $location->save();
        AuditTrail::log('locations', 'Updated Pick-up Location #' . $location->id);
        return redirect(route('admin.locations'))->with('success', 'Successfully updated a Pick-up Location');
    }




    public function login(Request $request) {
        $this->validate($request, [
            "email" => 'required',
            "password"  => 'required'
        ]);

        // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfbczUUAAAAAGsZIGoL-Pn0nWMzLzSOsqXbKTWN&response=".$request->input('g-recaptcha-response')."&remoteip=".$_SERVER['REMOTE_ADDR']);
        // $obj = json_decode($response);
        // if($obj->success == true) {
            if(Auth::guard('a')->attempt([
                'email'     => $request->input('email'),
                'password'  => $request->input('password')
            ])) {
                return redirect(route('admin.dashboard'))->with('signin_success', 'Successfully Logged In.');
            } else {
                return redirect(url()->previous())->with('signin_error', 'Email or Password is Incorrect.');
            }

        // } else {
        //     return redirect(url()->previous())->with('signin_error', 'Please confirm the Captcha.');
        // }

    }

    public function logout() {
        Auth::logout();
        return redirect(route('landingPage'));
    }

}
