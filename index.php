<?php

/* Used for debugging. */
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set("display_errors", 1);

include_once 'scripts/cmd.php';
include_once 'scripts/render.php';
include_once('scripts/dnsmasq.php');
include_once('scripts/opiz.php');

function render_box($title, $script) {
    $output = 

    $context = array(
        'title' => $title,
        'output' => render("scripts/${script}.php"),
    );
    
    display('tmpl/toolbox.php', $context);
}

function render_boxes($boxspecs) {
    foreach($boxspecs as $spec) {
        render_box($spec['title'], $spec['script']);
    }
}


$boxspecs = array(
    array('title' => 'System Info', 'script' => 'sysinfo'),
);  

?>

<html>
<head>
<link rel="stylesheet" href="res/style.css" type="text/css" />
</head>
<body onload="setTimeout('location.reload(true);', 10000);">

<?php print_cmd("System Info", "uname -a"); ?>
<?php print_cmd("Uptime", "uptime"); ?>
<?php print_cmd("Memory Usage", "free -h"); ?>
<?php print_dhcp_leases() ?>
<?php opiz_sbc_temp(); ?>

<?php render_boxes($boxspecs); ?>



    </body>
</html>