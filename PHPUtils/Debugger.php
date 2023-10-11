<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                  Debugger                                  */
/* ────────────────────────────────────────────────────────────────────────── */
/*

Usage example:

$debug_messages = [];

$debugger = new Debugger;
$debugger->debug_log($debug_messages, "This is a debug message", "Title");
$debugger->debug_log($debug_messages, "This is another debug message");
$debugger->debug_print($debug_messages, "Debug log");

*/

class Debugger {

    public bool $verbose;

        
    /**
     * __construct
     *
     * @param  mixed $verbose
     * @param  mixed $debug_array
     * @return void
     */
    function __construct(bool $verbose)
    {
        setVerbosity($verbose);
    }

        
    /**
     * setVerbosity
     *
     * @param  mixed $verbose
     * @return void
     */
    function setVerbosity(bool $verbose) {
        $this->verbose = $verbose;
    }


    /**
     * format
     *
     * @param  mixed $txt
     * @param  mixed $type
     * @param  mixed $icon
     * @return void
     */
    function format(string $input, string $type = 'info') {
        if ($type == 'info') {
            $icon = 'ℹ️';
        }
        if ($type == 'danger') {
            $icon = '❌';
        }
        if ($type == 'warning') {
            $icon = '⚠️';
        }
        if ($type == 'success') {
            $icon = '✅';
        }

        $icon = (!empty($icon) ? $icon : null);

        $txt = $icon.' '.$txt;

        return '
        <div class="alert alert-'.$type.'">'.$input.'</div>
        ';
    }

        
  
    /**
     * output
     * prints formatted output and echoes it
     *
     * @param  mixed $txt
     * @param  mixed $type
     * @param  mixed $die
     * @return void
     */
    public function output(string $txt, string $type = 'info', bool $die = false) {

        $txt = __METHOD__.": ".$txt;

        if ($die) {
            die(format($txt, $type));
        }
        echo format($txt, $type);
    }


    /**
     * debug_log
     *
     * @param  mixed $debug_array
     * @param  mixed $txt
     * @param  mixed $title
     * @return void
     */
    public function debug_log(array &$debug_array, string $txt, string $title = null) {

        if ($this->verbose === true) {
            $push = 
            [
                "timestamp" => date('H:i:s'),
                "title"   => $title,
                "message"   => $txt,
            ];
            array_push($debug_array, $push); 
        
            return $debug_array;
        }

        return null;
    }



    /**
     * debug_print
     *
     * @param  mixed $debug_array
     * @param  mixed $tableName
     * @return void
     */
    function debug_print(array &$debug_array, $tableName = "Debug") {

        $tableName_slug = strtolower($tableName);
        $tableName_slug = preg_replace('/[^A-Za-z0-9\-]/', '', $tableName_slug);

        $collapse_id    = "{$tableName_slug}_collapse";

        $debugTable = "
        <button class='btn btn-warning' type='button' data-bs-toggle='collapse' data-bs-target='#$collapse_id' aria-expanded='false' aria-controls='$collapse_id'>
        $tableName
        </button>

        <div class='collapse' id='$collapse_id'>
        <div class='alert alert-warning'>
        <h4>$tableName</h4>
        <table class='table table-warning'>
        ";
        foreach ($debug_array as $debug_data) {
            $timestamp = "<kbd>$debug_data[timestamp]</kbd>";

            $debugTable .= "
            <tr>
            <td>$timestamp</td>
            <td>
            <b style='color:darkblue;'>$debug_data[title]</b>
            <br>
            $debug_data[message]
            </td>
            </tr>
            ";
        }
        $debugTable .= "</table></div></div>";

        return $debugTable;
    }

}

?>