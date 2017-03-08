<?php
include_once 'utils/cmd.php';

function net_get_dev_info($dev) {
    $devinfo = array();

    /*
      ip sample output:
      2: ens160    inet 10.180.2.190/24 brd 10.180.2.255 scope global ens160\       valid_lft forever preferred_lft forever
    */

    $data = get_cmd_output("ip -o -4 address show ${dev}");
    
    $res = preg_match('/inet ([.0-9]+)\/([0-9]+) brd ([.0-9]+)/s', $data, $matches);
    if($res === 1) {
        $devinfo['ipaddress'] = $matches[1];
        $devinfo['netsize'] = $matches[2];
        $devinfo['broadcast'] = $matches[3];
    } else {
        $devinfo['ipaddress'] = 'n/a';
        $devinfo['netsize'] = 'n/a';
        $devinfo['broadcast'] = 'n/a';
    }
      

    $devinfo['hwaddress'] = trim(file_get_contents("/sys/class/net/${dev}/address"));
    $devinfo['rx_bytes'] = file_get_contents("/sys/class/net/${dev}/statistics/rx_bytes");
    $devinfo['tx_bytes'] = file_get_contents("/sys/class/net/${dev}/statistics/tx_bytes");
        
    return $devinfo;
}


