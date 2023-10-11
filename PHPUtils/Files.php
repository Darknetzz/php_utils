<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                  Files                                     */
/* ────────────────────────────────────────────────────────────────────────── */
class Files extends Base {

    function __construct() {
        $this->debug("Files included");
    }

    public function include_folder(string $fullpath, array $except) {
        
        // if (!file_exists($fullpath)) {
        //     $this->error("Unable to include path $fullpath");
        // }

    }
}

?>