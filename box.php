<?php
include_once 'utils/sin.php';
include_once 'utils/render.php';

/* Check if we get the script parameter. */
if(array_key_exists('script', $_GET)) {
    $script = $_GET['script'];

    /* Check if the script name is ok. */
    $res = preg_match('/^[a-zA-Z_]+$/', $script);
    if($res === 1) {
        /* As we will include and run php scripts from disk based on
         * the script name, the script name is restricted to
         * characters and underscore. For security, it is not possible
         * to specify any relative paths. */
        
        $sin = new Sin();
        $sin->render_box($script, false);
        
        return;
    } else {
        $err = "Invalid script name '$script'.";
    }
} else {
    $err = "No script name specified.";
}

/* Invalid script name or no script name given. */
http_response_code(404);
print("ERROR 404: $err");
