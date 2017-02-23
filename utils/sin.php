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
function sin_render_box($script, $with_toolbox=true) {
    global $config;

    $scriptout = render(
        "scripts/${script}.php",
        array('config' => $config));

    if($with_toolbox == false) {
        echo $scriptout;
    } else {
        $context = array(
            'script' => $script,
            'title' => $config['boxspecs'][$script]['title'],
            'boxspec' => $config['boxspecs'][$script],
            'output' => $scriptout,
            'config' => $config,
        );

        display('tmpl/toolbox.php', $context);
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
