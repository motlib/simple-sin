<?php

include_once 'render.php';
include_once 'config.php';


/**
 * Initialize sin.
 */

function sin_init() {
    global $config;
    
    /* Configure error messages */
    if($config['web']['enable_debug_msgs']) {
        /* Used for debugging. */
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        ini_set("display_errors", 1);
    }
}