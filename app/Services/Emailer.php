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

    public function __construct($to, $cc, $bcc, $view, $data) {
        $this->to = $to;
        $this->cc = $cc;
        $this->bcc = $bcc;
        $this->view = $view;
        $this->data = $data;
    }


    public function send() {
        Mail::send($this->view, $this->data, function ($message) {
            $message->from($this->from);
            $message->to($this->to);
            $message->subject($subject);
        });

        return Mail::failures();
    }


}
