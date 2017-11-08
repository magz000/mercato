<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use hisorange\BrowserDetect\Facade\Parser as BrowserDetect;

class PageView extends Model
{
    public static function insert() {
        $result = BrowserDetect::detect();
        $device = $result['isMobile'] ? 'mobile' : ($result['isTablet'] ? 'tablet' : 'desktop');

        $data = PageView::where('ip', '=', PageView::get_ip())->orderBy('created_at', 'desc')->first();
        $location = PageView::get_location(PageView::get_ip());

        if($data == null || date('m-d-y', strtotime($data->created_at)) != date('m-d-y', time())) {
            $data = new PageView();
            $data->ip = PageView::get_ip();
            $data->location = $location;
            $data->device = $device;
            $data->save();
        }
    }

    public static function get_location($ip) {
        $ip = file_get_contents('http://ip-api.com/json/' . $ip);
        $ipData = json_decode($ip);
        if($ipData->status == 'fail') {
            return 'localhost';
        } else {
            return $ipData->city;
        }
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
