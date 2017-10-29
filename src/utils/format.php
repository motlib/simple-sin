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


/**
 * Format text in bold.
 */
function fmt_bold($text) {
    return '<span style="font-weight:bold;">' . $text . '</span>';
}


/**
 * Round $num to the specified number of significant figures. 
 */
function fmt_sig($num, $sig=3) {
    if($num == 0) {
        return 0;
    }

    $l = floor(log10($num)) + 1;
    
    $num = $num / pow(10, ($l - $sig));
    
    $num = round($num);    

    return ($num * pow(10, ($l - $sig)));
}


/**
 * Format $bytes with the right data size value and the specified
 * number of significant figures.
 */
function fmt_bytes($bytes, $sig = 3) {
    $bytes = abs($bytes);
    
    $sizes = array(
        'TB' => pow(1024, 4),
        'GB' => pow(1024, 3),
        'MB' => pow(1024, 2),
        'kB' => pow(1024, 1),
    );
    
    foreach($sizes as $u => $r) {
        if($bytes >= $r) {
            return fmt_sig($bytes / $r, $sig) . $u;
        }
    }

    return fmt_sig($bytes, $sig) . 'B';
}
