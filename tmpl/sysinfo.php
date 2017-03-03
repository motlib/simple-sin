<?php /* -*- mode:html -*- */ ?>

<p>
  Current system date is
  <?= fmt_bold($time) ?>.
</p>

<p>
  Host
  <?= fmt_bold($hostname) ?>
  is running kernel
  <?= fmt_bold($kernel) ?>
  for
  <?= $uptime ?>.
  Load average is 
  <?php echo get_html_color($lavg_1, $lavg_1); ?>
  <?php echo get_html_color($lavg_5, $lavg_5); ?>
  <?php echo get_html_color($lavg_15, $lavg_15); ?>
</p>
