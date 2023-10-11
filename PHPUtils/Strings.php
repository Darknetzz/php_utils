<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                 Strings                                    */
/* ────────────────────────────────────────────────────────────────────────── */

class Strings extends Base {
    /**
    * slugify
    *
    * @param  mixed $string
    * @param  mixed $replace
    * @param  mixed $lenCap
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
    * @param  mixed $string
    * @param  mixed $visible
    * @return void
    */
    function hide(string $string, int $visibility = 3) {
        
        $len = strlen($string);
        
        if ($len < 3 || $len - $visibility < 0) {
            $this->debugger->alert("Unable to hide string.");
        }
        
        if ($len < $visibility) {
            $this->debugger->alert("Parameter string is longer than visibility");
        }
    }
}

?>