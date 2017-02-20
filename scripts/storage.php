<?php
include_once 'utils/storage.php';

$stinfo = storage_get_info();
?>

<?php foreach($config['storage']['mount_points'] as $mp): ?>
<?php
  $mpinfo = $stinfo[$mp];
  $pct = $mpinfo['used'] / $mpinfo['size'];
?>
<p>The filesystem at <span style="font-weight:bold;"><?php echo $mp; ?></span> is
<span style="font-weight: bold; color:<?php echo get_css_color($pct); ?>"><?php echo $mpinfo['used_pct']; ?></span> full.</p>
<?php endforeach;?>
