<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                  Crypto                                    */
/* ────────────────────────────────────────────────────────────────────────── */
class Crypto extends Base {

    function genIV(string $method) {
        $len   = openssl_cipher_iv_length($method);
        $bytes = openssl_random_pseudo_bytes($len);
        return bin2hex($bytes);
    }

    /**
     * encryptwithpw
     *
     * @param  mixed $str
     * @param  mixed $password
     * @return void
     */
     function encryptwithpw(string $str, string $password, string $method = 'aes-256-cbc', bool $iv = false) {
        $iv = ($iv ? $this->genIV($method) : '');
        return openssl_encrypt($str,$method,$password,iv:$iv);
    }


    /**
     * decryptwithpw
     *
     * @param  mixed $str
     * @param  mixed $password
     * @return void
     */
    function decryptwithpw(string $str, string $password, string $method = 'aes-256-cbc', string $iv = '') {
        return openssl_decrypt($str,$method,$password,iv:$iv);
    }

    /**
     * hash
     *
     * @param  mixed $str
     * @param  mixed $hash
     * @return void
     */
    function hash(string $str, string $hash = 'sha512') {
        return hash($str, $hash);
    }
}

?>