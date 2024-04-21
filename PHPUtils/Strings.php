<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                 Strings                                    */
/* ────────────────────────────────────────────────────────────────────────── */

/**
 * Class Strings
 * 
 * A class to handle string manipulation
 */
class Strings extends Base {
    /**
    * slugify
    *
    * @param  string $string The string to slugify.
    * @param  string $replace The character to replace spaces with. Default is '_'.
    * @param  int $lenCap The maximum length of the slug. Default is 0.
    * @return void
    */
    function slugify(string $string, string $replace = '_', int $lenCap = 0) {
        
        $search = [
            ' ', '-', '_', '.',
        ];
        
        $final_string = trim(strtolower($string));
        $final_string = str_replace($search, $replace,  $final_string);
        $final_string = preg_replace('/[^A-Za-z0-9\_]/', '',   $final_string);
        
        if (strlen($final_string) > $lenCap && $lenCap != 0) {
            $final_string = substr($final_string, 0, ($lenCap - 1));
        }
        
        return $final_string;
        
    }
    
    /**
    * hide
    *
    * @param  string $string The string to hide.
    * @param  int $visible The number of characters to keep visible. Default is 3.
    * @return void
    */
    function hide(string $string, int $visibility = 3) {
        
        $len = strlen($string);
        
        if ($len < 3 || $len - $visibility < 0) {
            $this->debugger->output("Unable to hide string.");
        }
        
        if ($len < $visibility) {
            $this->debugger->output("Parameter string is longer than visibility");
        }
    }
    
    /**
     * cap
     * 
     * Cap a string to a certain length
     * 
     * @param  string $string The string to cap
     * @param  int $maxlen The maximum length of the string. Default is 30.
     * @return string The capped string
     */
    function cap(string $string, int $maxlen = 30) {
        if (strlen($string) > $maxlen) {
            return substr($string, 0, 30)."...";
        }
        return $string;
    }
}

?>