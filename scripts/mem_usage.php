<?php 

include_once 'utils/meminfo.php';

function sin_get_mem_usage($sin, &$context) {
    $context['title'] = 'Memory Usage';
    
    $meminfo = mem_get_info();
    
    $context['memused'] = $meminfo['htopInUse'];
    $context['memtotal'] = $meminfo['MemTotal'];
    $context['pct'] = $meminfo['htopPctInUse'];
}

