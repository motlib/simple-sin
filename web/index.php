<?php
require_once __DIR__ . '/../vendor/autoload.php';

/* Set the project root directory */
Motlib\WebFW\ProjectPaths::setRoot(__DIR__ . '/..');

$ctrl = new Motlib\WebFW\Controller();
$ctrl->addActionClass('Motlib\\SIN\\IndexActions');
$ctrl->dispatch();

?>   

