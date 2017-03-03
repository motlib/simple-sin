<?php /* -*- mode:html -*- */
include_once 'utils/format.php';
?>

<?php foreach($sin->times as $script => $time): ?>
<p><?= fmt_bold($script) ?> load time is <?= fmt_sig($time, 2) ?>ms.</p>
<?php endforeach; ?>

<p>
  Total load time <?= fmt_sig($sin->get_total_time(), 2) ?>ms.
</p>
