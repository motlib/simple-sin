<?php /* -*- mode:html -*- */
include_once 'utils/format.php';
?>

<?php foreach($times as $name => $time): ?>
<p><?= fmt_bold($name) ?> load time is <?= fmt_sig($time, 2) ?>ms.</p>
<?php endforeach; ?>
