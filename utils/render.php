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
