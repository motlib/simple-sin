<?php

include_once 'render.php';

function get_cmd_output($cmd) {
    $out = shell_exec($cmd);

    if($out === NULL) {
        $out = "Failed to execute command: $cmd";
    }
        
    return htmlspecialchars($out);
}


function print_cmd($title, $cmd) {
    $output = get_cmd_output($cmd);

    $context = array('title' => $title, 'output' => "<pre>$output</pre>");
    display('tmpl/toolbox.php', $context);
}

function print_dhcp_leases() {
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

    $context = array('leases' => $leases);
    $leasetable = render('tmpl/dhcp-leases.php', $context);
    
    $context = array(
        'title' => 'DHCP Leases',
        'output' => $leasetable);
    display('tmpl/toolbox.php', $context);
}