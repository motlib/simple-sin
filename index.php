<!-- -*- mode:html -*- -->

<?php
   include_once 'utils/sin.php';
   sin_init();
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
    
    <?php sin_render_boxes($config['boxspecs']); ?>

    <p class="devinfo"><a href="https://github.com/motlib/simple-sin">Simple
    SIN</a> - (c) Andreas Schroeder</p>
  </body>
</html>
