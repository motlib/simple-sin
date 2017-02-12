<?php

include_once 'render.php';

/**
 * Get output of a console command.
 */
function get_cmd_output($cmd) {
    $out = shell_exec($cmd);

    if($out === NULL) {
        $out = "Failed to execute command: $cmd";
    }
        
    return htmlspecialchars($out);
}


function print_cmd($title, $cmd) {
    $output = get_cmd_output($cmd);

    $context = array('title' => $title, 'output' => "<pre>$output</pre>");
    display('tmpl/toolbox.php', $context);
}


