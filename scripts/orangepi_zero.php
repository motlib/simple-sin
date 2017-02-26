<?php /* -*- mode:html -*- */

/**
 * OrangePi Zero specific data
 */

include_once 'utils/orangepi_zero.php';
include_once 'utils/format.php';

$info = orangepi_zero_get_info();
?>

<p>
  CPUs running at
  <?= fmt_bold($info['freq_s']) ?>.
  SOC temperature is
  <?= get_html_color($info['soc_temp_s'], $info['soc_temp_pct']) ?>.
</p>
