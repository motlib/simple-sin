<?php

/**
 * Map a value between 0 and 1 to a color between red and green.
 */
function get_css_color($val, $map) {
    $col = get_color_mapping($val, $map);
    
    $r = sprintf("%d", $col[0]);
    $g = sprintf("%d", $col[1]);
    $b = sprintf("%d", $col[2]);

    return "rgb($r, $g, $b)";;
}    


/* Color map going from green over orange to red. */
$red_green_map = array(
    array(0, 200, 0), // green
    array(255,220, 0), // orange
    array(255, 0, 0)); // red

/**
 * Map $val between 0 and 1 to a color, e.g. to be used for a color
 * scale indicating system load or temperature.
 *
 * By default a green - orange - red map is used, but other maps can
 * be supplied in the $map parameter as an array of RGB vectors.
 *
 * @returns An array with red, green, blue components.
 */
function get_color_mapping($val, $map=NULL) {
    /* Limit input to range [0, 1]. */
    $val = max(0.0, min(1.0, $val));

    /* Get the default map, if no other map is given. */
    if($map == NULL) {
        global $red_green_map;
        $map = $red_green_map;
    }

    /* Number of intervals in map. */
    $n = count($map) - 1;
    
    /* Calculate index of the lower relevant color vector. Prevent
     * edge case if $val == 1.0 by limiting $pi index.*/
    $col_idx = min(floor($val * $n), $n - 1);

    /* Get the start and and end color vectors. */
    $col_s = $map[$col_idx];
    $col_e = $map[$col_idx + 1];

    /* Calculate length of one interval. */
    $intlen = 1.0 / $n;
    /* Start value of curent interval. */
    $ints = $intlen * $col_idx; 

    /* Map $val to [0..1] range in interval again. */
    $val -= $ints;
    $val /= $intlen;

    /* Linear interpolate between interval start and end vectors. */
    $col = array(
        $col_s[0] + ($val * ($col_e[0] - $col_s[0])),
        $col_s[1] + ($val * ($col_e[1] - $col_s[1])),
        $col_s[2] + ($val * ($col_e[2] - $col_s[2])),
    );
    
    return $col;
}

/**
 * Return html to format $text according to $val mapped to a color.
 */
function get_html_color($text, $val, $bold=true, $tag='span', $map=NULL) {
    if($bold == true) {
        $style = "font-weight:bold;";
    }

    $style .= 'color:' . get_css_color($val, $map) . ';';

    return "<${tag} style=\"${style}\">${text}</${tag}>";
}
