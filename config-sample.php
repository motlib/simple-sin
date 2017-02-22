<?php

$config = array(
    /* Boxes to show */
    'boxspecs' => array(
        'sysinfo' => array('title' => 'System Info', 'reload_time' => 5000,),
        'mem_usage' => array('title' => 'Memory Usage', 'reload_time' => 5010,),
        'opiz' => array('title' => 'SBC Temperature', 'reload_time' => 5000),
        'storage' => array('title' => 'Storage', 'reload_time' => 5015,),
        'network_ifaces' => array('title' => 'Network Interfaces', 'reload_time' => 5020,),
        'dnsmasq_dhcp_leases' => array('title' => 'DHCP Leases', 'reload_time' => 60000,),
    ),

    /* Network config */
    'network' => array(
        'ifaces' => array('eth0')),

    /* Storage module config */
    'storage' => array(
        'mount_points' => array('/')),

    'web' => array(
        'reload_time' => 0,
        'debug' => true),
);

