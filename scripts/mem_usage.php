<?php
include_once 'utils/meminfo.php';

$meminfo = mem_get_info();

$memuse = sprintf('%dMB', $meminfo['htopInUse'] / 1024);
$memtotal = sprintf('%dMB', $meminfo['MemTotal'] / 1024);

$pct = $meminfo['htopPctInUse'];
$spct = sprintf('%.1f%%', 100 * $pct);
?>

<p>The system uses <span style="font-weight: bold; color: <?php echo get_css_color($pct); ?>">
<?php echo $memuse; ?> (<?php echo $spct; ?>)</span>
of the total
<span style="font-weight: bold;"><?php echo $memtotal; ?></span> of system memory.</div>
