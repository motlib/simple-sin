<?php 

include_once 'utils/dnsmasq.php';

function sin_get_dnsmasq_dhcp_leases($sin, &$context) {
    $context['leases'] = dnsmasq_get_dhcp_leases();
}
?>

