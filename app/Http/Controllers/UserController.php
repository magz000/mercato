<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware('auth:u')->except(['login']);
    }

    public function dashboard() {}
    public function orders() {}
    public function profile() {}

    public function login(Request $request) {

        $validator = $this->validate($request, [
            "email"     => 'required',
            "password"  => 'required'
        ]);

        // $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfbczUUAAAAAGsZIGoL-Pn0nWMzLzSOsqXbKTWN&response=".$request->input('g-recaptcha-response')."&remoteip=".$_SERVER['REMOTE_ADDR']);
        // $obj = json_decode($response);
        // if($obj->success == true) {
            if(Auth::guard('u')->attempt([
                'email'     => $request->input('email'),
                'password'  => $request->input('password')
            ])) {
                return redirect(url()->previous())->with('signin_success', 'Successfully Logged In.');
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
