<?php

function render($path, $context = array())
{
    ob_start();

    extract($context, EXTR_SKIP);
    
    include($path);
    
    $var = ob_get_contents();
    ob_end_clean();
    
    return $var;
}


function display($path, $context = array()) {
    echo render($path, $context);
}


/**
 * Render a toolbox with the given title. $script is rendered and put
 * as content into the toolbox. */
function render_box($title, $script) {
    global $config;

    $scriptout = render(
        "scripts/${script}.php",
        array('config' => $config));
    
    $context = array(
        'title' => $title,
        'output' => $scriptout,
        'config' => $config,
    );
    
    display('tmpl/toolbox.php', $context);
}


/**
 * Render all toolboxes described in the boxspecs structure (list of
 * title, script pairs). */
function render_boxes($boxspecs) {
    foreach($boxspecs as $spec) {
        render_box($spec['title'], $spec['script']);
    }
}
