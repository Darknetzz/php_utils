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
            fclose($handle);
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

        if (!filesize($fullpath) || filesize($fullpath) < 1) {
            return null;
        }

        $f = fopen($fullpath, 'r');
        $read = fread($f, filesize($fullpath));
        $this->file_close($f);

        return $read;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                        FILE_WRITE_ACCESS                                        #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_write_access(string $fullpath) {
        $f = fopen($fullpath, 'w+');

        if (!$f) {
            return false;
        }

        $this->file_close($f);
        return true;
    }

    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    //                                           FILE_WRITE                                            #
    // ─────────────────────────────────────────────────────────────────────────────────────────────── #
    public function file_write(string $fullpath, ?string $content, bool $create = true) {    
        if (!file_exists($fullpath) && $create === false) {
            return false;
        }

        if (!$this->file_write_access($fullpath)) {
            return false;
        }

        if (empty($content)) {
            return false;
        }

        touch($fullpath);
        
        $f = fopen($fullpath, 'w+');
        fwrite($f, $content);
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

    /* ───────────────────────────────────────────────────────────────────── */
    /*                            currentFileName                            */
    /* ───────────────────────────────────────────────────────────────────── */
    public function currentFileName(bool $ext = True) {
        # The whole point of this function is to not have to pass or know the current file name
        # __SCRIPT__           = resolves to Files.php
        # $_SERVER['PHP_SELF'] = resolves to the PHP file requested in the URI
        $caller = $_SERVER['PHP_SELF'];

        if ($ext != True) {
            return basename($caller, '.php');
        }
        return basename($caller);
    }

    /* ───────────────────────────────────────────────────────────────────── */
    /*                             preventDirect                             */
    /* ───────────────────────────────────────────────────────────────────── */
    # TODO: Fix this function at some point
    # Prevents direct invokation of a script - except $exceptions
    public function preventDirect(array $exceptions = [], mixed &$pagevar = null, ?callable $callback = null) {

        # default callback function
        if ($callback == null) {
            $callback = function() {
                http_response_code(404);
                die("404 Not found");
            };
        }

        $custom = (!empty($pagevar) ? True : False);

        # The file requested in the URI
        $page = ($custom ? $pagevar : basename($_SERVER['PHP_SELF']));

        # current page is stored in a variable passed to this method
        if ($custom && $pagevar != $page && !in_array($pagevar, $exceptions)) {
            $callback();
        }

        // if (!$custom && $page && !in_array($page, $exceptions)) {

        // }



        # The actual script running
        $currentFileName = basename($this->currentFileName());

        if (!in_array($currentFileName, $exceptions) && $currentFileName != $page) {
            $callback();
        }
    }
}

?>