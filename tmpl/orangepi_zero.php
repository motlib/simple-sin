<?php /* -*- mode:html -*- */ ?>

<p>
  CPUs running at
  <?= fmt_bold($freq) ?>.
  SOC temperature is
  <?= get_html_color($soc_temp, $soc_temp_pct) ?>.
</p>
