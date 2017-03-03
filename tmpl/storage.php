<?php /* -*- mode:html -*- */ ?>

<?php foreach($mpinfos as $mp): ?>
<p>
  The
  <?= $mp['type'] ?>
  filesystem at
  <?= fmt_bold($mp['mountpoint']) ?>
  (<?= $mp['device'] ?>)
  uses
  <?= fmt_bold(fmt_bytes($mp['used'], 3)) ?>
  (<?= get_html_color($mp['used_pct'], $mp['pct']) ?>)
  of
  <?= fmt_bold(fmt_bytes($mp['size'], 3)) ?>.
</p>
<?php endforeach;?>
