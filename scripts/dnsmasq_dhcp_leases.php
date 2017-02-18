<?php
include_once 'utils/dnsmasq.php';

$leases = dnsmasq_get_dhcp_leases();
?>

<table class="datatable">
  <tr>
    <th>Hostname</th>
    <th>MAC Address</th>
    <th>IP Address</th>
    <th>Lease Start Time</th>
  </tr>
  <?php foreach($leases as $lease): ?>
  <tr>
    <td><?php echo $lease['hostname'] ?></td>
    <td><?php echo $lease['mac'] ?></td>
    <td><?php echo $lease['ip'] ?></td>
    <td><?php echo $lease['start'] ?></td>
  </tr>
  <?php endforeach ?>
</table>
