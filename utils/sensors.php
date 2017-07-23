<?php

include_once "utils/cmd.php";

function bme280_get_data() {
    //FIXME: Everything's hardcoded... :-(
    $out = get_cmd_output('python /opt/bme280/bme280.py --os 2');

    $lines = split("\n", $out);

    $data = array();
    foreach($lines as $line) {
        $dp = split("=", $line);
        if(count($dp) == 2) {
            $data[$dp[0]] = $dp[1];
        }
    }

    return $data;
}
