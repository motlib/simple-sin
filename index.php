<!-- -*- mode:html -*- -->

<?php
include_once 'utils/render.php';
include_once 'config.php';

if($config['web']['enable_debug_msgs']) {
    /* Used for debugging. */
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    ini_set("display_errors", 1);
}
?>

<html>
  <head>
    <title>SIN - System Informaion</title>
    <link rel="stylesheet" href="res/style.css" type="text/css" />
  </head>

  <script>
    var setup_reload = function() {
      setTimeout(
        'location.reload(true);',
        1000 * <?php echo $config['web']['reload_time']; ?>);
    }
  </script>
  
  <body onload="setup_reload();">
    <h1>SIN - System Information</h1>
    
    <?php render_boxes($config['boxspecs']); ?>

    <p class="devinfo"><a href="https://github.com/motlib/simple-sin">Simple
    SIN</a> - (c) Andreas Schroeder</p>
  </body>
</html>
