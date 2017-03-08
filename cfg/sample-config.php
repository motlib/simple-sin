<?php

$config = array(
    /* Boxes to show */
    'boxspecs' => array(
        'sysinfo' => array(
            'reload_time' => 5000,),
        'mem_usage' => array(
            'reload_time' => 5100,),
        'orangepi_zero' => array(
            'reload_time' => 5200,),
        'storage' => array(
            'reload_time' => 5300,),
        'network_ifaces' => array(
            'reload_time' => 5400,),
    ),

    /* Network config */
    'network' => array(
        'ifaces' => array('br0', 'eth0')),

    /* Storage module config */
    'storage' => array(
        'mount_points' => array('/')),

    /* General webpage config */
    'web' => array(
        'debug' => false,
        'style' => 'default',
        'fontsize' => '8pt'),
);

