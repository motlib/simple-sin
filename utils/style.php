<?php

/**
 * Map a value between 0 and 1 to a color between red and green.
 */
function get_css_color($val) {

    $map = get_color_mapping($val);
    
    $r = sprintf("%d", $map[0]);
    $g = sprintf("%d", $map[1]);
    $b = sprintf("%d", $map[2]);

    $c = "rgb($r, $g, $b)";

    return $c;
}    


function get_color_mapping($val) {
    /* Limit input to range [0, 1]. */
    $val = max(0, min(1, $val));

    return array(
        255 * $val,
        255 * (1 - $val),
        0,
    );
}

/**
 * Return html to format $text according to $val mapped to a color.
 */
function get_html_color($text, $val, $bold=true, $tag='span') {
    if($bold == true) {
        $style = "font-weight:bold;";
    }

    $style .= 'color:' . get_css_color($val) . ';';

    return "<${tag} style=\"${style}\">${text}</${tag}>\n";
}

