<?php 

include_once 'utils/meminfo.php';

function sin_get_mem_usage($sin, &$context) {
    //TODO: make meminfo return byte values
    $meminfo = mem_get_info();
    
    $context['memused'] = fmt_bytes($meminfo['htopInUse'] * 1024, 2);
    $context['memtotal'] = fmt_bytes($meminfo['MemTotal'] * 1024, 2);
    $context['pct'] = $meminfo['htopPctInUse'];
    
    $context['spct'] = sprintf('%.1f%%', 100 * $meminfo['htopPctInUse']);
}

