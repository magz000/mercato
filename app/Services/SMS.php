<?php

namespace App\Services;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as Client;

class SMS
{

    /*
        http://www.isms.com.my/sms_api.php
        http://portal.bulksms.com.ph/sms_api_info.php?sid=qoma3cqv7bsft6l3uhum9kg1g4
    */

    public $username        = "chefsandbutlers";
    public $password        = 'P@$$w0rd113322';
    public $url             = 'https://www.isms.com.my/isms_send.php';

    // $type :
    // Default 1 = ASCII, 2 = Unicode
    public $type            = '1';
    public $sendid          = 'CB';

    public $parameters      = array();

    public function __construct($to, $msg) {

        $receipient = null;
        if (is_array($to)) {
            $receipient = implode(';', $to);
        } else {
            $receipient = $to;
        }

        $this->parameters = array(
            "un"        => $this->username,
            "pwd"       => $this->password,
            "dstno"     => $receipient,
            "msg"       => $msg,
            "type"      => $this->type,
            "sendid"    => $this->sendid
        );

    }


    public function send() {
        $client = new \GuzzleHttp\Client();
        $result = $client->request('GET', $this->url . '?' . urldecode(http_build_query($this->parameters)));
        return $this->parameters['dstno'];

    }


}
