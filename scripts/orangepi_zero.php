<?php 

/**
 * OrangePi Zero specific data
 */

include_once 'utils/orangepi_zero.php';

function sin_get_orangepi_zero($sin, &$context) {
    $context['title'] = 'SBC Info';

    $info = orangepi_zero_get_info();

    $context['soc_temp'] = fmt_sig($info['soc_temp'],2) . '℃ ';
    $context['soc_temp_pct'] = $info['soc_temp_pct'];
    $context['freq'] = fmt_sig($info['freq'] / 1000, 2) . 'MHz';
}

