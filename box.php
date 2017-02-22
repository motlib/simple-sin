<?php
include_once 'utils/sin.php';
include_once 'utils/render.php';

//TODO: Add error handling and escaping!
$script = $_GET['script'];

sin_init();
echo sin_render_box($script, false);

