<?php

# ──────────────────────────────────────────────────────────────────────────────────────────────── #
#                                               FUNCS                                              #
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
class Funcs extends Base {
    // --------[ countFunctionParams ]-------- //
    public function countFunctionParams(string $functionName) : int {
        $reflection = new \ReflectionFunction($functionName);
        $paramCount = $reflection->getNumberOfParameters();
        return $paramCount;
    }
}

?>