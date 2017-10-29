<?php

include_once 'utils/cmd.php';

/**
 * Returns the system uptime as a DateInterval object.
 */
function get_uptime() {
    $raw = file_get_contents('/proc/uptime');
    if($raw === FALSE) {
        return NULL;
    }

    $vals = explode(" ", $raw);
    if(count($vals) != 2) {
        return NULL;
    }

    $dt = new DateTime();
    $dt->setTimestamp(time() - $vals[0]);
        
    $intv = (new DateTime())->diff($dt);

    return $intv;
}

/**
 * Returns the load average for 1, 5 and 15 minutes in an array.
 */
function get_loadavg() {
    $raw = file_get_contents('/proc/loadavg');

    $loadavg = explode(' ', $raw);

    return $loadavg;
}

/**
 * Returns the fully qualified hostname.
 */
function get_hostname() {
    return get_cmd_output('hostname -f');
}


/**
 * Returns the kernel version of the running kernel.
 */
function get_kernel_version() {
    return get_cmd_output('uname -r');
}