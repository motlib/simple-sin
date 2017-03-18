<?php /* -*- mode:html -*- */ ?>

<?php foreach($stations as $sta): ?>
<p>
  Station <?= fmt_bold($sta['address']) ?>
  is connected for
  <?= $sta['connected_time'] ?>s
  and has send <?= fmt_bytes($sta['tx_bytes']) ?>
  and received <?= fmt_bytes($sta['rx_bytes']) ?>.
</p>
<?php endforeach; ?>
