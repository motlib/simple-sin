<?php /* -*- mode:html -*- */

include_once 'utils/meminfo.php';
include_once 'utils/format.php';

//TODO: make meminfo return byte values
$meminfo = mem_get_info();
$memuse = $meminfo['htopInUse'] * 1024;
$memtotal = $meminfo['MemTotal'] * 1024;

$pct = $meminfo['htopPctInUse'];
$spct = sprintf('%.1f%%', 100 * $pct);
?>

<p>
  The system uses
  <?= fmt_bold(fmt_bytes($memuse, 2)) ?>
  (<?= get_html_color($spct, $pct) ?>) 
  of the total
  <?= fmt_bold(fmt_bytes($memtotal, 2)) ?>
  of system memory.
</p>
