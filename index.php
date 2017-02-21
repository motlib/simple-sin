<!-- -*- mode:html -*- -->

<?php
   include_once 'utils/sin.php';
   $t1 = microtime(true);

   sin_init();

?>   

<html>
  <head>
    <title>SIN - System Information</title>
    <link rel="stylesheet" href="res/style.css" type="text/css" />
    <meta name="viewport"
          content="width=device-width; initial-scale=1.0" />
  </head>

  <script type="text/javascript" src="res/reload.js"></script>
  <script type="text/javascript" src="res/toggle.js"></script>
  
  <body onload="setup_reload(<?php echo $config['web']['reload_time']; ?>);">
    <h1>SIN - System Information</h1>
    
    <?php sin_render_boxes($config['boxspecs']); ?>

    <p class="devinfo"><a href="https://github.com/motlib/simple-sin">Simple
        SIN</a> - (c) Andreas Schroeder</p>

    <?php $t2 = microtime(true);
          if($config['web']['debug'] == true):
    ?>
    <div style="font-size:x-small;">
      DEBUG: Load time <?php printf('%.3fs', $t2 - $t1); ?>
    </div>
    <?php endif; ?>
  </body>
</html>
