<?php
include_once 'utils/sin.php';

/* Check if we got the script parameter. */
if(array_key_exists('script', $_GET)) {
    $script = $_GET['script'];

    /* Check if the script name is ok. Only characters and underscore
     * are allowed to prevent any path traversal. */
    $res = preg_match('/^[a-zA-Z_]+$/', $script);
    if($res === 1) {
        /* Script name is ok. Render the output. */
        $sin = new Sin();
        $sin->render_box($script, false);
        
        return;
    } else {
        /* The script name is not ok. */
        $err = "Invalid script name '$script'.";
    }
} else {
    /* There was no script name specified. */
    $err = "No script name specified.";
}

/* Invalid script name or no script name given. */
http_response_code(404);
print("ERROR 404: $err");
