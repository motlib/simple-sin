<?php /* -*- mode:html -*- */ ?>

<p>
  The system uses
  <?= fmt_bold($memused) ?>
  (<?= get_html_color($spct, $pct) ?>) 
  of the total
  <?= fmt_bold($memtotal) ?>
  of system memory.
</p>
