<pre><?php
include_once 'utils/cmd.php';

$loadavg = get_cmd_output('cat /proc/loadavg');
$loads = explode(' ', $loadavg);


echo get_cmd_output('uname -a');
echo trim(get_cmd_output('uptime'));
echo "\n\n";



function get_color($val) {
    $val = max(0, min(1, $val));

        
    $r = sprintf("%d", 255 * $val);
    $g = sprintf("%d", 255 * (1 - $val));
    $b = sprintf("%d", 255 * 0);

    $c = "rgb($r, $g, $b)";

    return $c;
}    

$load1 = $loads[0];
$c1 = get_color($loads[0]);

$load5 = $loads[1];
$c5 = get_color($loads[1]);

$load15 = $loads[2];
$c15 = get_color($loads[2]);
?>
</pre>

<div>Load: <span style="color: <?php echo $c1; ?>"><?php echo $load1; ?></span>, 
    <span style="color: <?php echo $c5; ?>"><?php echo $load5; ?></span>, 
<span style="color: <?php echo $c15; ?>"><?php echo $load15; ?></span> </div>


