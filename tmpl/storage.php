<?php /* -*- mode:html -*- */
include_once 'utils/format.php';
?>

<?php foreach($mpinfos as $mp): ?>
<p>
  The
  <?= $mp['type'] ?>
  filesystem at
  <?= fmt_bold($mp['mountpoint']) ?> (<?= $mp['device'] ?>)
  is
  <?= get_html_color($mp['used_pct'], $mp['pct']) ?>
  full.
</p>
<?php endforeach;?>
