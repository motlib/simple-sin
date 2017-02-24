<?php
include_once 'utils/dnsmasq.php';

$leases = dnsmasq_get_dhcp_leases();
?>

<table class="datatable">
  <tr>
    <th>Hostname</th>
    <th>MAC Address</th>
    <th>IP Address</th>
    <th>Lease End Time</th>
  </tr>
  <?php foreach($leases as $lease): ?>
  <tr>
    <td><?= $lease['hostname'] ?></td>
    <td><?= $lease['mac'] ?></td>
    <td><?= $lease['ip'] ?></td>
    <td><?= $lease['start'] ?></td>
  </tr>
  <?php endforeach ?>
</table>
