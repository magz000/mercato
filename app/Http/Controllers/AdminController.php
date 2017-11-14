<?php

namespace App\Http\Controllers;

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

    public function dashboard() {
        return view('admin.dashboard');
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
        $data['clients'] = User::paginate(20);
        return view('admin.clients.all')->with($data);
    }

    public function client_view($client_id) {

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

}
