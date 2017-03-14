<?php

$config = array(
    /* Array of the boxes to show */
    'boxspecs' => array(
        'welcome' => array(
            'enabled' => true,),

        'sysinfo' => array(
            'enabled' => true,
            'reload_time' => 5000),
        
        'mem_usage' => array(
            'enabled' => true,
            'reload_time' => 5100),
        
        'storage' => array(
            'enabled' => true,
            'reload_time' => 5200),

        'orangepi_zero' => array(
            'enabled' => false,
            'reload_time' => 5300),
        
        'network_ifaces' => array(
            'enabled' => true,
            'reload_time' => 5400),
        
        'processes' => array(
            'enabled' => false,
            'reload_time' => 5500,),

        'hostlist' => array(
            'enabled' => true,
            'hosts' => array(
                'http://opi1/sin' => 'OPi1')),
    ),

    /* Network config */
    'network' => array(
        'ifaces' => array('br0', 'eth0')),

    /* Storage module config */
    'storage' => array(
        'mount_points' => array('/')),

    /* General webpage config */
    'web' => array(
        'system_name' => 'My System',
        'debug' => false,
        'style' => 'default',
        'fontsize' => '8pt'),
);

