<!-- -*- mode:html -*- -->

<?php
/* Used for debugging. */
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set("display_errors", 1);

include_once 'utils/render.php';
include_once 'config.php';
?>

<html>
  <head>
    <title>SIN - System Informaion</title>
    <link rel="stylesheet" href="res/style.css" type="text/css" />
  </head>
  
  <body onload="setTimeout('location.reload(true);', 10000);">

    <h1>SIN - System Information</h1>
    
    <?php render_boxes($config['boxspecs']); ?>

    <p class="devinfo">SIN - (c) Andreas Schroeder</p>
  </body>
</html>
