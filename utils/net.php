<?php
include_once 'utils/cmd.php';

function net_get_dev_info($dev) {
    $devinfo = array();
    
    $data = get_cmd_output("ifconfig $dev");

    $res = preg_match('/inet addr:\s*([.0-9]+)/s', $data, $matches);
    $devinfo['ipaddress'] = ($res === 1 ? $matches[1] : 'n/a');

    $res = preg_match('/HWaddr\s*([0-9a-zA-Z:]+)/s', $data, $matches);
    $devinfo['hwaddress'] = ($res === 1 ? $matches[1] : 'n/a');

    $res = preg_match('/RX bytes:\s*(\d+) \((.*?)\)/s', $data, $matches);
    $devinfo['rx_bytes'] = ($res === 1 ? $matches[1] : 'n/a');
    $devinfo['rx_bytes_usr'] = ($res === 1 ? $matches[2] : 'n/a');

    $res = preg_match('/TX bytes:\s*(\d+) \((.*?)\)/s', $data, $matches);
    $devinfo['tx_bytes'] = ($res === 1 ? $matches[1] : 'n/a');
    $devinfo['tx_bytes_usr'] = ($res === 1 ? $matches[2] : 'n/a');
        
    return $devinfo;
}


