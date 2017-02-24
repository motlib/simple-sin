<?php
include_once 'utils/meminfo.php';

$meminfo = mem_get_info();

$memuse = sprintf('%dMB', $meminfo['htopInUse'] / 1024);
$memtotal = sprintf('%dMB', $meminfo['MemTotal'] / 1024);

$pct = $meminfo['htopPctInUse'];
$spct = sprintf('%.1f%%', 100 * $pct);
?>

<p>The system uses
<?= get_html_color($memuse . ' (' . $spct . ')', $pct); ?>
of the total
<span style="font-weight: bold;"><?= $memtotal; ?></span>
of system memory.</p>
