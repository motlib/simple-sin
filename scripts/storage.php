<?php /* -*- mode:html -*- */
include_once 'utils/storage.php';
include_once 'utils/format.php';

$stinfo = storage_get_info();
?>

<?php foreach($config['storage']['mount_points'] as $mp): ?>
<?php
  $mpinfo = $stinfo[$mp];
  $pct = $mpinfo['used'] / $mpinfo['size'];
?>
<p>
  The
  <?= $mpinfo['type'] ?>
  filesystem at
  <?= fmt_bold($mp) ?> (<?= $mpinfo['device'] ?>)
  is
  <?= get_html_color($mpinfo['used_pct'], $pct) ?>
  full.
</p>
<?php endforeach;?>
