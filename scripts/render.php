<?php

function render($path, $param = array())
{
    ob_start();

    extract($param, EXTR_SKIP);
    
    include($path);
    
    $var = ob_get_contents();
    ob_end_clean();
    
    return $var;
}


function display($path, $param = array()) {
    echo render($path, $param);
}


