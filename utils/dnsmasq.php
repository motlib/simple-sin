<?php

include_once 'utils/cmd.php';

function _comp_hostname($a, $b) {
    return strnatcmp($a['hostname'], $b['hostname']);
}

function dnsmasq_get_dhcp_leases() {
    $output = get_cmd_output('cat /var/lib/misc/dnsmasq.leases');

    $leases = array();
    
    $lines = explode("\n", $output);
    foreach($lines as $line) {
        $d = explode(' ', $line);
        if(count($d) != 5) {
            continue;
        }
        
        
        $lease = array(
            'end_timestamp' => $d[0],
            'mac' => $d[1],
            'ip' => $d[2],
            'hostname' => $d[3],
        );
        
        if($d[0] != '0') {
            /* date is a unix timestamp */
            $dt = new DateTime();
            $dt->setTimestamp($d[0]);
            $lease['end'] = $dt;
            $lease['end_ival'] = (new DateTime())->diff($lease['end']);
        } else {
            $lease['end'] = NULL;
            $lease['end_ival'] = NULL;
        }

        $leases[] = $lease;
    }

    usort($leases, '_comp_hostname');
    
    return $leases;
}
