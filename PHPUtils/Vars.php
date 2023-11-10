<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                   VarUtil                                  */
/* ────────────────────────────────────────────────────────────────────────── */
/* 
    This class will contain different utilities for handling variables of all kinds.
*/

class Vars {
    
    public function var_assert(mixed &$var, mixed $assertVal = false, bool $lazy = false) : bool {
        if (!isset($var)) {
            return false;
        }
    
        if ($assertVal != false || func_num_args() > 1) {
    
            if ($lazy != false) {
                return $var == $assertVal;
            }
    
            return $var === $assertVal;
        }
        
        return true;
    }


    
    public function arrayInString(array $haystack, string $needle) {
        foreach ($haystack as $char) {
            if (strpos($char, $needle) !== FALSE) {
                return true;
            }
        }
        return false;
    }


    public function stringify(mixed $var) {

        $return = $var;

        if (is_array($var)) {

            $return = json_encode($return, JSON_PRETTY_PRINT);

        }

        return $return;
    }

    public function in_md_array(array $haystack, string $needle) {
        $holdsValue = False;
        $callBack = function($item, $key, $needle) {
            global $holdsValue;
            if ($item == $needle || $key == $needle) {
                $holdsValue = True;
            }
        };
        array_walk_recursive($haystack, $callBack, $needle);
        return $holdsValue;
    }

}




?>