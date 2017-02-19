<?php

function mem_get_info() {
    $out = get_cmd_output('cat /proc/meminfo');

    $lines = explode("\n", $out);

    $meminfo = array();
    foreach($lines as $line) {
        preg_match('/^([^:]+):\s*(\d+) kB$/', $line, $matches);

        if(count($matches) == 3) {
            $meminfo[$matches[1]] = $matches[2];
        }
    }

    /*
     * Add more relevant info. According to htop author:
     * http://stackoverflow.com/questions/41224738/how-to-calculate-
     *  memory-usage-from-proc-meminfo-like-htop
     */

    /* All the memory used by the system. */
    $meminfo['htopTotalUsed'] =
        $meminfo['MemTotal'] - $meminfo['MemFree'];

    /* The memory the system can release whenever necessary. */
    $meminfo['htopCached'] =
        $meminfo['Cached'] + $meminfo['SReclaimable'] - $meminfo ['Shmem'];

    /* Memory actually in use by processes. */
    $meminfo['htopInUse'] =
        $meminfo['htopTotalUsed'] - $meminfo['Buffers'] - $meminfo['htopCached'];

    /* Percent of memory used. */
    $meminfo['htopPctInUse'] = $meminfo['htopInUse'] / $meminfo['MemTotal'];


    
    return $meminfo;
}