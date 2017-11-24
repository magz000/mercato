<?php

namespace App\Services;
use Illuminate\Support\Facades\Mail;

class Emailer
{

    public $from    = null;
    public $to      = null;
    public $cc      = null;
    public $bcc     = null;
    public $view    = null;
    public $data    = null;
    public $subject = null;

    public function __construct($to, $view, $data, $subject, $cc = null, $bcc = null) {
        $this->to = $to;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->view = $view;
        $this->data = $data;
        $this->subject = $subject;
    }


    public function send() {
        Mail::send($this->view, $this->data, function ($message) {
            $message->from('app@chefsandbutlers.net');
            $message->to($this->to);
            $message->subject($this->subject);
        });

        return Mail::failures();
    }


}
