<?php /* -*- mode:html -*- */ ?>

<?php foreach($times as $name => $time): ?>
<p><?= fmt_bold($name) ?> load time is <?= fmt_sig($time, 2) ?>ms.</p>
<?php endforeach; ?>
