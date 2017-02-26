<?php /* -*- mode:html -*- */

include_once 'utils/format.php';
include_once 'utils/sysinfo.php';

$loadavg = get_loadavg();
?>

<p>
  Current system date is
  <?= fmt_bold(strftime('%Y-%m-%d')) ?>
  and time is
  <?= fmt_bold(strftime('%T')) ?>.
</p>

<p>
  Host
  <?= fmt_bold(get_hostname()) ?>
  is running kernel
  <?= fmt_bold(get_kernel_version()) ?>
  for <?= fmt_date_interval(get_uptime()) ?>.
  Load average is 
  <?php for($i = 0; $i < 3; ++$i): ?>
  <?php echo get_html_color($loadavg[$i],$loadavg[$i]) ?>
  <?php endfor; ?>
</p>
