<!-- -*- mode:html -*- -->
<?php
   include_once 'utils/sin.php';
   $sin = new Sin();
?>   

<!DOCTYPE html>
<html>
  <head>
    <title>SIN - System Information</title>
    <meta name="viewport"
          content="width=device-width; initial-scale=1.0" />

    <link rel="stylesheet" href="res/style.php" type="text/css" />
    
    <script type="text/javascript" src="res/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="res/reload_js.php"></script>
    <script type="text/javascript" src="res/toggle.js"></script>
  </head>

  <body>
    <h1>SIN - System Information</h1>
    
    <?php $sin->render_boxes(); ?>

    <p class="devinfo">
      <a href="https://github.com/motlib/simple-sin">Simple SIN</a>
      - (c) Andreas Schroeder
    </p>
  </body>
</html>
