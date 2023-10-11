<?php

# ──────────────────────────────────────────────────────────────────────────────────────────────── #
#                                               BASE                                               #
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
class Base {

    public $name = "PHPUtils";
    public $author = "Darknetzz";
    public $url    = "https://github.com/Darknetzz";
    public $version = "1.0.0";

    public $debugger;
    public $debug_log = [];

    public $vars;

    public $verbose = true;


    // public function printInfo() {
    //     return "
    //     $this->name -
    //     $this->author - 
    //     $this->version -
    //     ";
    // }

    function __construct() {

        # Instantiate a debugger with construct
        $this->debugger = new Debugger($this->verbose);
        

        # Instantiate Vars class
        $this->vars     = new Vars();

    }

}