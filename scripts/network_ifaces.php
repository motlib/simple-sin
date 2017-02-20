<?php
include_once 'utils/net.php';

foreach($config['network']['ifaces'] as $iface): ?>

<p>
<?php $devinfo = net_get_dev_info($iface); ?>
Interface <span style="font-weight:bold;"><?php echo $iface; ?></span>
(<?php echo $devinfo['hwaddress']; ?>)
with IP address <span style="font-weight:bold;"><?php echo $devinfo['ipaddress']; ?></span>
has received <?php echo $devinfo['rx_bytes_usr']; ?> 
and sent <?php echo $devinfo['tx_bytes_usr']; ?>.
</p>

<?php endforeach; ?>