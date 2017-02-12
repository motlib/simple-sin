<?php
include_once 'scripts/cmd.php';
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
    
</body>
</html>