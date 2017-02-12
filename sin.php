<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set("display_errors", 1);
include_once 'scripts/cmd.php';
include_once('scripts/dnsmasq.php');
include_once('scripts/opiz.php');

?>

<html>
<head>
<link rel="stylesheet" href="res/style.css" type="text/css" />
</head>
<body>

<?php print_cmd("System Info", "uname -a"); ?>
<?php print_cmd("Uptime", "uptime"); ?>
<?php print_cmd("Memory Usage", "free -h"); ?>
<?php print_dhcp_leases() ?>
<?php opiz_sbc_temp(); ?>
</body>
</html>