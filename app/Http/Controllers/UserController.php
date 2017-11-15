<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth:u')->except(['login']);

    }

    private function user_id() {
        return Auth::guard('u')->user()->id;
    }

    public function dashboard() {
        $data['orders']     = Order::where('user_id', '=', $this->user_id())->orderBy('created_at', 'desc')->limit(5)->get();

        return view('users.dashboard')->with($data);
    }

    public function orders() {

        $data['orders']     = Order::where('user_id', '=', $this->user_id())->orderBy('created_at', 'desc')->get();
        $data['contents']   = function($order_id) {
                return OrderContent::where('order_id', '=', $order_id)->get();
        };

        return view('users.orders')->with($data);

    }

    public function profile() {}

    public function rating_process(Request $request, $oid, $uid, $enc) {
        if( md5($oid . 'cmplx' . $uid) != $enc) return redirect(url()->previous())->with('rating_error', 'Something went wrong.');

        $this->validate($request, [
            "ocid"    => 'required'
        ]);

        foreach ($request->input('ocid') as $content_id) {
            if($request->input('rating__' . $content_id) != 0
            || $request->input('rating__' . $content_id) != null) {
                $cotent = OrderContent::find($content_id);
                $rating = new OrderRating;
                $rating->product_id   = $cotent->product_id;
                $rating->content_id   = $cotent->id;
                $rating->category   = "overall";
                $rating->value      = $request->input('rating__' . $content_id);
                $rating->message      = $request->input('message__' . $content_id);
                $rating->total      = $request->input('rating__' . $content_id);
                $rating->save();
            }
        }

        return redirect(url()->previous())->with('rating_success', 'Sucessfully Rated.');
    }

    public function login(Request $request) {

        $validator = $this->validate($request, [
            "email"     => 'required',
            "password"  => 'required',
            "user_type" => 'required'
        ]);

        // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfbczUUAAAAAGsZIGoL-Pn0nWMzLzSOsqXbKTWN&response=".$request->input('g-recaptcha-response')."&remoteip=".$_SERVER['REMOTE_ADDR']);
        // $obj = json_decode($response);
        // if($obj->success == true) {
            if($request->user_type == 1) {
                if(Auth::guard('u')->attempt([
                    'email'     => $request->input('email'),
                    'password'  => $request->input('password')
                ])) {
                    AuditTrail::log('user', $request->input('email') . ' logged in.');
                    return redirect(url()->previous())->with('signin_success', 'Successfully Logged In.');
                } else {
                    return redirect(url()->previous())->with('signin_error', 'Email or Password is Incorrect.');
                }

            } else {
                if(Auth::guard('p')->attempt([
                    'email'     => $request->input('email'),
                    'password'  => $request->input('password')
                ])) {
                    AuditTrail::log('provider', $request->input('email') . ' logged in.');
                    return redirect(route('providerDashboardPage'))->with('signin_success', 'Successfully Logged In.');
                } else {
                    return redirect(url()->previous())->with('signin_error', 'Email or Password is Incorrect.');
                }
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
