<pre><?php

/**
 * OrangePi Zero specific data
 */

include_once('utils/cmd.php');


function opiz_sbc_temp() {
    $val = get_cmd_output('cat /sys/class/thermal/thermal_zone0/temp');

    $val = $val / 1000.0;

    printf('SBC: %.1f°C', $val);
}

opiz_sbc_temp();
?></pre>