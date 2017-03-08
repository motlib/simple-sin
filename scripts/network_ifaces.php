<?php
include_once 'utils/net.php';

function sin_get_network_ifaces($sin, &$context) {
    $context['title'] = 'Network Interfaces';

    $devs = array();
    foreach($sin->cfg['network']['ifaces'] as $iface) {
        $devinfo = net_get_dev_info($iface);
        $devinfo['iface'] = $iface;

        $devs[] = $devinfo;
    }

    $context['devs'] = $devs;
}
