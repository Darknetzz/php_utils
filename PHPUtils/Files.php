<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                  Files                                     */
/* ────────────────────────────────────────────────────────────────────────── */
class Files extends Base {

    // function __construct() {
    //     $this->debug("Files included");
    // }

    public function include_folder(string $fullpath, array $except) {
        
        // if (!file_exists($fullpath)) {
        //     $this->error("Unable to include path $fullpath");
        // }

    }

    public function file_read(string $fullpath) {
        if (file_exists($fullpath) && is_file($fullpath)) {
            $f = fopen($fullpath, 'r');
            return $f->file_read();
        }
    }

    public function file_write(string $fullpath, string $content, bool $create = true) {    
        if (!file_exists($fullpath) && $create === true) {
            touch($fullpath);
        }
        
        $f = fopen($fullpath, 'w+');
        $f->file_write($content);
        $f->close();
    }

    # A "file_close" function should not be neccessary as both
    # file_read and file_write properly closes the file, but just in case
    public function file_close(mixed $handle) {
        if (!is_resource($handle)) {
            return false;
        }
        $handle->close();
        return true;
    }
}

?>