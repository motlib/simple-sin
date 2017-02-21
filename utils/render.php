<?php

/**
 * Render a template.
 */
function render($path, $context = array())
{
    ob_start();

    extract($context, EXTR_SKIP);
    
    include($path);
    
    $var = ob_get_contents();
    ob_end_clean();
    
    return $var;
}


/**
 * Render a template and display the result.
 */
function display($path, $context = array()) {
    echo render($path, $context);
}


/**
 * Render a toolbox with the given title. $script is rendered and put
 * as content into the toolbox.
 */
function sin_render_box($title, $script) {
    global $config;

    $scriptout = render(
        "scripts/${script}.php",
        array('config' => $config));
    
    $context = array(
        'title' => $title,
        'output' => $scriptout,
        'config' => $config,
        'script' => $script,
    );
    
    display('tmpl/toolbox.php', $context);
}


/**
 * Render all toolboxes described in the boxspecs structure (list of
 * title, script pairs).
 */
function sin_render_boxes($boxspecs) {
    foreach($boxspecs as $spec) {
        sin_render_box($spec['title'], $spec['script']);
    }
}



function get_css_color($val) {
    $val = max(0, min(1, $val));

        
    $r = sprintf("%d", 255 * $val);
    $g = sprintf("%d", 255 * (1 - $val));
    $b = sprintf("%d", 255 * 0);

    $c = "rgb($r, $g, $b)";

    return $c;
}    
