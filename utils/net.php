<?php
include_once 'utils/cmd.php';

function net_get_dev_info($dev) {
    $devinfo = array();
    
    $data = get_cmd_output("ifconfig $dev");

    //TODO: detect ifconfig variant / version and adapt or find other method to gather data.
    
    /* ifconfig variant 1:
       
       ens160: flags=4163<UP,BROADCAST,RUNNING,MULTICAST>  mtu 1500
       inet 10.180.2.190  netmask 255.255.255.0  broadcast 10.180.2.255
       inet6 fe80::250:56ff:fe8c:19dd  prefixlen 64  scopeid 0x20<link>
       ether 00:50:56:8c:19:dd  txqueuelen 1000  (Ethernet)
       RX packets 3817100  bytes 898905888 (898.9 MB)
       RX errors 0  dropped 130  overruns 0  frame 0
       TX packets 741070  bytes 1661290108 (1.6 GB)
       TX errors 0  dropped 0 overruns 0  carrier 0  collisions 0
    */
    
    $res = preg_match('/inet( addr:)?\s*([.0-9]+)/s', $data, $matches);
    $devinfo['ipaddress'] = ($res === 1 ? $matches[2] : 'n/a');

    $res = preg_match('/(HWaddr|ether)\s*([0-9a-zA-Z:]+)/s', $data, $matches);
    $devinfo['hwaddress'] = ($res === 1 ? $matches[2] : 'n/a');

    $res = preg_match('/RX bytes:\s*(\d+) \((.*?)\)/s', $data, $matches);
    $devinfo['rx_bytes'] = ($res === 1 ? $matches[1] : 'n/a');
    $devinfo['rx_bytes_usr'] = ($res === 1 ? $matches[2] : 'n/a');

    $res = preg_match('/TX bytes:\s*(\d+) \((.*?)\)/s', $data, $matches);
    $devinfo['tx_bytes'] = ($res === 1 ? $matches[1] : 'n/a');
    $devinfo['tx_bytes_usr'] = ($res === 1 ? $matches[2] : 'n/a');
        
    return $devinfo;
}


