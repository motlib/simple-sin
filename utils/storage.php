<?php

/**
 * Retrieve storage / filesystem info by calling df -T and parsing
 * output.
 */
function storage_get_info() {
    $data = get_cmd_output('df -T');

    $lines = explode("\n", $data);
    
    $first = true;
    $stinfo = array();
    foreach($lines as $line) {
        if($first == true) {
            $first = false;
            continue;
        }

        /* Expect 7 fields separated by multiple spaces. */
        $res = preg_match(
            '/([^ ]*)\s+([^ ]*)\s+([^ ]*)\s+([^ ]*)\s+([^ ]*)\s+([^ ]*)\s+([^ ]*)/',
            $line,
            $match);

        if(($res === 1) && count($match) == 8) {
            $stinfo[$match[7]] = array(
                'device' => $match[1],
                'type' => $match[2],
                'size' => $match[3],
                'used' => $match[4],
                'free' => $match[5],
                'used_pct' => $match[6],
            );
        }
    }

    return $stinfo;
}
