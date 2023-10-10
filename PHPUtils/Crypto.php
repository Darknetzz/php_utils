<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                  Crypto                                    */
/* ────────────────────────────────────────────────────────────────────────── */
class Crypto extends Base {
    /**
     * encryptwithpw
     *
     * @param  mixed $str
     * @param  mixed $password
     * @return void
     */
    function encryptwithpw($str, $password) {
        return openssl_encrypt($str,"AES-128-ECB",$password);
    }

        
    /**
     * decryptwithpw
     *
     * @param  mixed $str
     * @param  mixed $password
     * @return void
     */
    function decryptwithpw($str, $password) {
        return openssl_decrypt($str,"AES-128-ECB",$password);
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