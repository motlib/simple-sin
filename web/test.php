<?php
$loader = require_once __DIR__ . '/../vendor/autoload.php';

//use Motlib\WebFW\Controller;

$p = $loader->getPrefixes();
var_dump($p);

$c = 'Motlib\\WebFW\\Controller';
echo "looking for " . $c;
$res = $loader->loadClass($c);
echo 'loaded: ';
var_dump($res);

use Motlib\WebFW\ProjectPaths;

Motlib\WebFW\ProjectPaths::setRoot(__DIR__.'/..');

$p = ProjectPaths::getPath('tmpl');
var_dump($p);

//$ctrl = new Motlib\WebFW\Controller();

//$ctrl->dispatch();
?>   

