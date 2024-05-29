<?php

/**
 * Class Funcs
 * 
 * The Funcs class extends the Base class and provides additional utility functions.
 * 
 * @package PHPUtils
 */
class Funcs extends Base {
    /**
     * Counts the number of parameters of a given function.
     *
     * @param string $functionName The name of the function.
     * @return int The number of parameters of the function.
     */
    public function countFunctionParams(string $functionName) : int {
        $reflection = new \ReflectionFunction($functionName);
        $paramCount = $reflection->getNumberOfParameters();
        return $paramCount;
    }
}

?>