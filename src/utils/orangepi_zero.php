<?php
include_once 'utils/cmd.php';

/**
 * Get OrangePi Zero related system info.
 */
function orangepi_zero_get_info() {
    $info = array();
        
    $raw = file_get_contents('/sys/class/thermal/thermal_zone0/temp');
    $temp = $raw / 1000.0;
    $info['soc_temp'] = $temp;
    $info['soc_temp_s'] = sprintf('%d°C', $temp);
    $info['soc_temp_pct'] = ($temp - 20.0) / (80.0 - 20.0);

    $freq = get_cmd_output('cpufreq-info -f');
    $info['freq'] = $freq;
    $info['freq_s'] = ($freq / 1000.0) . 'MHz';

    return $info;
}