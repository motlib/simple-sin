<?php include_once 'utils/format.php'; ?>

<?php foreach($devs as $dev): ?>
<p>
  Interface
  <?= fmt_bold($dev['iface']) ?>
  (<?= $dev['hwaddress']; ?>)
  with IP address <?= fmt_bold($dev['ipaddress']) ?>
  has received <?= $dev['rx_bytes_usr']; ?> 
  and sent <?= $dev['tx_bytes_usr']; ?>.
</p>
<?php endforeach; ?>
