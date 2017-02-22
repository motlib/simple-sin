<?php

//TODO: move to utility script
include_once 'utils/cmd.php';

$loadavg = explode(' ', get_cmd_output('cat /proc/loadavg'));
$uptime = trim(str_replace('up ', '', get_cmd_output('uptime -p')));
?>

<p>
Host
<span style="font-weight: bold;"><?php echo get_cmd_output('hostname -f') ?></span>
is running kernel
<span style="font-weight: bold;"><?php echo get_cmd_output('uname -r') ?></span>
for <?php echo $uptime; ?>.
Load average is 
<?php for($i = 0; $i < 3; ++$i): ?>
<?php echo get_html_color($loadavg[$i],$loadavg[$i]) ?>
  <!-- <span style="font-weight: bold; color: <?php echo get_css_color($loadavg[$i]); ?>"><?php echo $loadavg[$i]; ?></span>, -->
<?php endfor; ?>
</p>
