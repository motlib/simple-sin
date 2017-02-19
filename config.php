<?php

$config = array(
    /* Boxes to show */
    'boxspecs' => array(
        array('title' => 'System Info', 'script' => 'sysinfo'),
        array('title' => 'Memory Usage', 'script' => 'mem_usage'),
        array('title' => 'DHCP Leases', 'script' => 'dnsmasq_dhcp_leases'),
        array('title' => 'SBC Temperature', 'script' => 'opiz'),
        array('title' => 'Network Interfaces', 'script' => 'network_ifaces'),
    ),

    /* Network config */
    'network' => array(
        'ifaces' => array('eth0', 'wlan0')),

    'web' => array(
        'reload_time' => 10,
        'enable_debug_msgs' => true),

);  

