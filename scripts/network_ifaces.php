<?php
include_once 'utils/net.php';

foreach($config['network']['ifaces'] as $iface): ?>

<p>
<?php $devinfo = net_get_dev_info($iface); ?>
Interface <span style="font-weight:bold;"><?= $iface; ?></span>
(<?= $devinfo['hwaddress']; ?>)
with IP address <span style="font-weight:bold;"><?= $devinfo['ipaddress']; ?></span>
has received <?= $devinfo['rx_bytes_usr']; ?> 
and sent <?= $devinfo['tx_bytes_usr']; ?>.
</p>

<?php endforeach; ?>