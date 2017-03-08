<?php /* -*- mode:html -*- */ ?>

<p>
  The system uses
  <?= fmt_bold(fmt_bytes($memused, 2)) ?>
  (<?= get_html_color(fmt_sig(100 * $pct, 3) . '%', $pct) ?>) 
  of the total
  <?= fmt_bold(fmt_bytes($memtotal, 2)) ?>
  of system memory.
</p>
