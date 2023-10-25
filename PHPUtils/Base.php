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


    function __construct() {

        if (empty($this->debugger)) {
            $this->debugger = new Debugger($this->verbose);
        }
        # REVIEW: does the Base class infinitely
        # reinstantiate itself every time a "new" is called?
        # only when the instantiated class extends base, right?
        # Instantiate a debugger with construct
        
        # NOTE: I don't think the base class should have a construct method at all

        # Instantiate Vars class
        if (empty($this->vars)) {
            $this->vars     = new Vars();
        }

    }

}