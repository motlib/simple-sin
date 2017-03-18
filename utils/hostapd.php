<?php

include_once 'cmd.php';

/* Selected interface 'wlan0'
10:41:7f:da:d0:85
flags=[AUTH][ASSOC][AUTHORIZED][SHORT_PREAMBLE][WMM]
aid=2
capability=0x431
listen_interval=20
supported_rates=82 84 8b 96 24 30 48 6c 0c 12 18 60
timeout_next=NULLFUNC POLL
dot11RSNAStatsSTAAddress=10:41:7f:da:d0:85
dot11RSNAStatsVersion=1
dot11RSNAStatsSelectedPairwiseCipher=00-0f-ac-4
dot11RSNAStatsTKIPLocalMICFailures=0
dot11RSNAStatsTKIPRemoteMICFailures=0
hostapdWPAPTKState=11
hostapdWPAPTKGroupState=0
rx_packets=231
tx_packets=160
rx_bytes=29119
tx_bytes=118030
connected_time=5
*/

function hostapd_get_stations($interface) {
    $out = get_cmd_output('hostapd_cli all_sta');

    $lines = split("\n", $out);

    $stations = array();

    $sta = null;
    
    foreach($lines as $line) {
        $res = preg_match('/^([a-f0-9:]+)$/', $line, $match);
        if($res === 1) {
            if($sta) {
                $stations[] = $sta;
            }
            $sta = array(
                'address' => $match[0]);
            continue;
        }

        $res = preg_match('/^(.*?)=(.*)$/', $line, $match);
        if($res === 1) {
            $sta[$match[1]] = $match[2];
        }
    }

    if($sta) {
        $stations[] = $sta;
    }

    return $stations;
}