<?php /* -*- mode:html -*- */ ?>

<?php foreach($devs as $dev): ?>
<p>
  Interface
  <?= fmt_bold($dev['iface']) ?>
  (<?= $dev['hwaddress']; ?>)
  with IP address <?= fmt_bold($dev['ipaddress']) ?>
  has received <?= fmt_bytes($dev['rx_bytes']) ?> 
  and sent <?= fmt_bytes($dev['tx_bytes']) ?>.
</p>
<?php endforeach; ?>
