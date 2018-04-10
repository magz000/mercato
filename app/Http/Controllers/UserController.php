<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
use App\Model\User;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth:u')->except(['login', 'create']);

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

    public function profile() {
        return view('users.profile');
    }

    public function profile_process(Request $request) {
        $this->validate($request, [
            "image_base64"      => 'required',
            "firstname"         => 'required',
            "lastname"          => 'required',
            "street"            => 'required',
            "barangay"          => 'required',
            "city"              => 'required',
            "state"             => 'required',
            "postal_code"       => 'required'
        ]);

        $filename  = time() . '.jpg';
        $path = public_path().'/img/users/'. $filename;
//        $manager = new ImageManager(array('driver' => 'GD'));
//        $manager->make(file_get_contents($request->image_base64))->save($path);

        $data = file_get_contents($request->image_base64);
        //////////// Upload the decoded file/image

        if(file_put_contents($path , $data)) {

            $user = User::find(Auth::guard('u')->user()->id);

            if ($user->picture != null && $user->picture != '' && file_exists(public_path() . '/img/users/' . $user->picture)) {
                unlink(public_path() . '/img/users/' . $user->picture);
            }

            $user->picture = $filename;
            $user->firstname = $request->firstname;
            $user->middlename = $request->middlename;
            $user->lastname = $request->lastname;
            $user->street = $request->street;
            $user->barangay = $request->barangay;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->postal_code = $request->postal_code;
            $user->save();

        }

        return redirect(route('userProfilePage'))->with('success', "You've Successfully Updated you Profile.");
    }

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

    public function create(Request $request) {

        $this->validate($request, ['user_type' => 'required']);

        if($request->user_type == 1) {
            $rules = array(
                'semail' => 'required|email|max:191|unique:users,email',
                'spassword' => 'required|min:8',
                'srepassword' => 'required|same:spassword',
                'sfirstname' => 'required|string',
                'slastname' => 'required|string',
                'scontact' => 'required',
                'sbirthday' => 'required',
            );
        } else if($request->user_type == 2) {
            $rules = array(
                'semail' => 'required|email|max:191|unique:providers,email',
                'spassword' => 'required|min:8',
                'srepassword' => 'required|same:spassword',
                'sfirstname' => 'required|string',
                'slastname' => 'required|string',
                'scontact' => 'required',
                'sbirthday' => 'required',
            );
        }

        $validator = $this->validate($request, $rules);

        if($request->user_type == 1) {
            $client = new User;
            $client->email = $request->semail;
            $client->password = Hash::make($request->spassword);
            $client->firstname = $request->sfirstname;
            $client->lastname = $request->slastname;
            $client->contact = $request->scontact;
            $client->save();

            return redirect(route('landingPage'))->with('success', 'Successfully Registered as Client.');

        } else {
            $provider = new Provider;
            $provider->email        = $request->semail;
            $provider->username     = $request->sfirstname . '' . $request->slastname;
            $provider->password     = Hash::make($request->spassword);
            $provider->firstname    = $request->sfirstname;
            $provider->lastname     = $request->slastname;
            $provider->contact      = $request->scontact;
            $provider->save();

            return redirect(route('landingPage'))->with('success', 'Successfully Registered as Provider.');

        }
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
                    return redirect($request->referrer)->with('signin_success', 'Successfully Logged In.');
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
