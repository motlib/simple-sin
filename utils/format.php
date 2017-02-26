<?php

/**
 * Format output of a DateInterval value.
 *
 * If the value is NULL, $default is returned.
 */
function fmt_date_interval($ival, $default='') {
    if($ival == NULL) {
        return $default;
    }

    $fmt = '%h hours, %i minutes';
    
    if($ival->days > 0) {
        $fmt = '%a days, ' . $fmt;
    }
    
    return $ival->format($fmt);

}

/**
 * Format output of a DateTime value.
 *
 * If the value is NULL, $default is returned.
 */
function fmt_date($dt, $default='') {
    if($dt == NULL) {
        return $default;
    }

    return $dt->format('%c');
}


function fmt_bold($text) {
    return '<span style="font-weight:bold;">' . $text . '</span>';
}