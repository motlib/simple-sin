<?php

include_once 'utils/sysinfo.php';

function sin_get_sysinfo($sin, &$context) {
    $loadavg = get_loadavg();
    $context['lavg_1'] = $loadavg[0];
    $context['lavg_5'] = $loadavg[1];
    $context['lavg_15'] = $loadavg[2];
    
    $context['hostname'] = get_hostname();
    $context['kernel'] = get_kernel_version();
    $context['uptime'] = fmt_date_interval(get_uptime());

    $context['time'] = strftime('%Y-%m-%d %T');
}

