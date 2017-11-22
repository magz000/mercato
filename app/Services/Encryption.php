<?php

namespace App\Services;

class Encryption
{
    protected $key = 'Carlo&Marcial';
    public function encrypt($string) {
        $key = pack('H*', md5($this->key));
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB));
    }

    public function decrypt($enc) {
        $key = pack('H*', md5($this->key));
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($enc), MCRYPT_MODE_ECB);
		return rtrim($decrypted, "\0");
    }
}
