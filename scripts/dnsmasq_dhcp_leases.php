<?php /* -*- mode:html -*- */

include_once 'utils/dnsmasq.php';

$leases = dnsmasq_get_dhcp_leases();
?>

<table class="datatable">
  <tr>
    <th>MAC Address</th>
    <th>IP Address</th>
    <th>Lease Expiration</th>
  </tr>
  <?php foreach($leases as $lease): ?>
  <tr>
    <td colspan="3"><?= fmt_bold($lease['hostname']) ?></td>
  </tr>
  <tr>
    <td><?= $lease['mac'] ?></td>
    <td><?= $lease['ip'] ?></td>
    <td><?= fmt_date_interval($lease['end_ival']) ?></td>
  </tr>
  <?php endforeach ?>
</table>
