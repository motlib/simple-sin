<?php

/**
 * OrangePi Zero specific data
 */

include_once('cmd.php');


function opiz_sbc_temp() {
    $val = get_cmd_output('cat /sys/class/thermal/thermal_zone0/temp');

    $val = $val / 1000.0;

    $output = sprintf('<pre>SBC: %.1f°C</pre>', $val);

    display('tmpl/toolbox.php', array(
        'title' => 'Temperatures',
        'output' => $output));
}