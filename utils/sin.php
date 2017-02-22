<?php

include_once 'render.php';
include_once 'config.php';
include_once 'style.php';


/**
 * Initialize sin web interface.
 */
function sin_init() {
    global $config;
    
    /* Configure error messages */
    if($config['web']['debug']) {
        /* Used for debugging. */
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        ini_set("display_errors", 1);
    }
}


/**
 * Render a toolbox with the given title. $script is rendered and put
 * as content into the toolbox.
 */
function sin_render_box($script, $with_cnt_tag=false) {
    global $config;

    $scriptout = render(
        "scripts/${script}.php",
        array('config' => $config));
    
    $context = array(
        'script' => $script,
        'title' => $config['boxspecs'][$script]['title'],
        'boxspec' => $config['boxspecs'][$script],
        'output' => $scriptout,
        'config' => $config,
    );

    //TODO move to template
    /* Add additional div tag around toolbox to simplify reloading by
     * ajax. */
    if($with_cnt_tag == true) {
        echo "<div id=\"$script\">\n";
    }
    
    display('tmpl/toolbox.php', $context);

    if($with_cnt_tag == true) {
        echo "</div>\n";
    }
}


/**
 * Render all toolboxes described in the boxspecs structure (list of
 * title, script pairs).
 */
function sin_render_boxes($boxspecs) {
    foreach($boxspecs as $script => $spec) {
        sin_render_box($script, true);
    }
}
