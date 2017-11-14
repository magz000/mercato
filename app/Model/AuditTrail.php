<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AuditTrail extends Model
{

    protected $table = "audit_trails";

    public static function log($action, $message) {

        $user_type = $auth_id = null;

        if(Auth::guard('u')->check()) {
            $user_type  = 1;
            $auth_id    = Auth::guard('u')->user()->id;
        } else if(Auth::guard('p')->check()) {
            $user_type  = 2;
            $auth_id    = Auth::guard('p')->user()->id;
        } else if(Auth::guard('a')->check()) {
            $user_type  = 3;
            $auth_id    = Auth::guard('a')->user()->id;
        }

        $audit = new AuditTrail;
        $audit->auth_id = $auth_id;
        $audit->user_type = $user_type;
        $audit->ip_address = AuditTrail::get_ip();
        $audit->action_to = $action;
        $audit->action = $message;
        $audit->save();

    }

    public static function get_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
