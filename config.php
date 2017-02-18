<?php

$config = array(
    'boxspecs' => array(
        array('title' => 'System Info', 'script' => 'sysinfo'),
        array('title' => 'Memory Usage', 'script' => 'mem_usage'),
        array('title' => 'DHCP Leases', 'script' => 'dnsmasq_dhcp_leases'),
        array('title' => 'SBC Temperature', 'script' => 'opiz'),
        array('title' => 'Network Interfaces', 'script' => 'network_ifaces'),
    ),
    'network' => array('ifaces' => array('eth0', 'wlan0')),
    
);  

