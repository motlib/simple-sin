<?php
include_once 'utils/storage.php';

$stinfo = storage_get_info();
?>

<?php foreach($config['storage']['mount_points'] as $mp): ?>
<?php
  $mpinfo = $stinfo[$mp];
  $pct = $mpinfo['used'] / $mpinfo['size'];
?>
<p>
  The <?= $mpinfo['type'] ?> filesystem
  mounted from <?= $mpinfo['device'] ?>
  to <span style="font-weight:bold;"><?= $mp; ?></span>
  is <?= get_html_color($mpinfo['used_pct'], $pct) ?> full.
</p>
<?php endforeach;?>
