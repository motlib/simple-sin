<?php
include_once 'utils/cmd.php';

$loadavg = explode(' ', get_cmd_output('cat /proc/loadavg'));
$uptime = trim(str_replace('up ', '', get_cmd_output('uptime -p')));
?>

<div>
Host
<span style="font-weight: bold;"><?php echo get_cmd_output('hostname -f') ?></span>
is running kernel
<span style="font-weight: bold;"><?php echo get_cmd_output('uname -r') ?></span>
for <?php echo $uptime; ?>.
</div>

<div>Load average is 
<?php for($i = 0; $i < 3; ++$i): ?>
  <span style="font-weight: bold; color: <?php echo get_css_color($loadavg[$i]); ?>"><?php echo $loadavg[$i]; ?></span>, 
<?php endfor; ?>
</div>
