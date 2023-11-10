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


    # TODO: This function returns false regardless...
    public function in_md_array(array $haystack, string $needle) {

        $contains = False;

        # Callback function
        $callBack = function($val, $key, $needle) use(&$contains) {

            # We have already found what we are looking for
            if ($contains === True) {
                return $contains;
            }

            # Found it!
            elseif ($key == $needle || $val == $needle) {
                $contains = True;
            }

            return $contains;
        };

        array_walk_recursive($haystack, $callBack, $needle);

        if ($contains !== False) {
            echo "Fant!";
            return true;
        }
        return false;
    }

}




?>