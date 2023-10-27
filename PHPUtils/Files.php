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

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                             IS_FILE                                             #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function is_file(string $fullpath) {
        if (file_exists($fullpath) && is_file($fullpath)) {
            return true;
        }

        return false;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                           FILE_CLOSE                                            #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_close(mixed $handle, int $attempts = 3) {

        if (!is_resource($handle)) {
            return false;
        }

        $try = 0;
        while (is_resource($handle) && $try <= $attempts) {
            $handle->close();
            $try++;
        }

        if (!is_resource($handle)) {
            return true;
        }
        
        $this->debugger->throw_exception(__METHOD__.": Unable to close file handle on line ".__LINE__);
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                            FILE_READ                                            #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_read(string $fullpath) {
        if (!file_exists($fullpath) || !is_file($fullpath)) {
            $this->debugger->throw_exception(__METHOD__.": Attempted to read a file that does not exist: $fullpath");
        }

        $f = fopen($fullpath, 'r');
        $read = $f->file_read();
        $this->file_close($f);

        return $read;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                        FILE_WRITE_ACCESS                                        #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_write_access(string $fullpath) {
        $f = fopen(SQLFILE, 'w+');

        if (!$f) {
            return false;
        }

        $this->file_close($f);
        return true;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                           FILE_WRITE                                            #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_write(string $fullpath, string $content, bool $create = true) {    
        if (!file_exists($fullpath) && $create === false) {
            return false;
        }

        if (!$this->file_write_access($fullpath)) {
            return false;
        }

        touch($fullpath);
        
        $f = fopen($fullpath, 'w+');
        $f->file_write($content);
        // $f->close();
        $this->file_close($f);
        return $content;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                           FILE_DELETE                                           #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_delete(string $fullpath) {
        if (!file_exists($fullpath) || !is_file($fullpath)) {
            return true;
        }

        if (unlink($fullpath)) {
            return true;
        }

        return false;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                          FILE_IS_EMPTY                                          #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_is_empty(string $fullpath) {
        $contents = $this->file_read($fullpath);

        if (!empty($contents)) {
            return false;
        }

        return true;
    }
}

?>