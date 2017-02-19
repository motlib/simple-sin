<?php

/**
 * OrangePi Zero specific data
 */

include_once('utils/cmd.php');


$val = get_cmd_output('cat /sys/class/thermal/thermal_zone0/temp');
$temp = $val / 1000.0;

$stemp = sprintf('%.1f°C', $temp);

$pct = ($temp - 20.0) / (80.0 - 20.0);

?>
<div>SBC temperature is
<span style="font-weight: bold; color: <?php echo get_css_color($pct); ?>">
<?php echo $stemp; ?>
</span>.
</div>