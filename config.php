<?php

$config = array(
    /* Boxes to show */
    'boxspecs' => array(
        array('title' => 'System Info', 'script' => 'sysinfo'),
        array('title' => 'Memory Usage', 'script' => 'mem_usage'),
        array('title' => 'SBC Temperature', 'script' => 'opiz'),
        array('title' => 'Storage', 'script' => 'storage'),
        array('title' => 'Network Interfaces', 'script' => 'network_ifaces'),
        array('title' => 'DHCP Leases', 'script' => 'dnsmasq_dhcp_leases'),
    ),

    /* Network config */
    'network' => array(
        'ifaces' => array('eth0', 'wlan0')),

    /* Storage module config */
    'storage' => array(
        'mount_points' => array('/', '/data')),

    'web' => array(
        'reload_time' => 0,
        'debug' => true),
);  

