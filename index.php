<?php

require('src/autoloader.php');

$autoloader = new Autoloader;
$autoloader->register();

$controller = new \BrainfuckPHP\Controller\Controller();
$controller->initialise();
$controller->run();
