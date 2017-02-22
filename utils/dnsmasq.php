<?php

include_once 'utils/cmd.php';

function dnsmasq_get_dhcp_leases() {
    $output = get_cmd_output('cat /var/lib/misc/dnsmasq.leases');

    $leases = array();
    
    $lines = explode("\n", $output);
    foreach($lines as $line) {
        $d = explode(' ', $line);

        if(count($d) < 4) {
            continue;
        }
        
        $fields = array(
            'mac' => $d[1],
            'ip' => $d[2],
            'hostname' => $d[3]
        );
        
        if($d[0] != '0') {
            $fields['start'] = strftime("%c", $d[0]);
        } else {
            $fields['start'] = 'n/a';
        }

        $leases[] = $fields;
    }

    return $leases;
}

function print_dhcp_leases() {
    $leases = dnsmasq_get_dhcp_leases();
    
    display('tmpl/dhcp-leases.php', array(
        'leases' => $leases));
}