<?php

$config = array(
    'boxspecs' => array(
        'sysinfo' => array(
            'enabled' => true,
            'reload_time' => 5000),
        
        'mem_usage' => array(
            'enabled' => true,
            'reload_time' => 5010),
        
        'storage' => array(
            'enabled' => true,
            'reload_time' => 5015),

        'orangepi_zero' => array(
            'enabled' => false,
            'reload_time' => 5100),
        
        'network_ifaces' => array(
            'enabled' => true,
            'reload_time' => 5020),
        
        'hostlist' => array(
            'enabled' => true,
            'hosts' => array(
                'http://aee.cn.kostal.int/sin' => 'AEE')),
        
        'processes' => array(
            'enabled' => false,
            'reload_time' => 5500,),
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

