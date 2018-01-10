<?php

namespace App\Services;

class Encryption
{
    protected $key = 'Carlo&Marcial';
    private $method = 'aes-128-cbc';
    private $iv = "1234567812345678";



    public function encrypt($string) {
        $key = pack('H*', md5($this->key));
        return base64_encode(openssl_encrypt($string, $this->method,
            $key, OPENSSL_RAW_DATA, $this->iv));
//        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB));
    }

    public function decrypt($enc) {
        $key = pack('H*', md5($this->key));
//        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($enc), MCRYPT_MODE_ECB);
        $decrypted = openssl_decrypt(base64_decode($enc), $this->method ,
            $key, OPENSSL_RAW_DATA, $this->iv);
		return rtrim($decrypted, "\0");
    }
}
