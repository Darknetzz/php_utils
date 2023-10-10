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


    
    public function arrayInString($array, $string) {
        foreach ($array as $char) {
            if (strpos($char, $string) !== FALSE) {
                return true;
            }
        }
        return false;
    }}

?>