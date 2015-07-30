<?php

require('src/autoloader.php');

$autoloader = new Autoloader;
$autoloader->register();

//
//$_POST['input'] = '';
//$_POST['program'] = '++++++++[>++++[>++>+++>+++>+<<<<-]>+>+>->>+[<]<-]>>.>---.+++++++..+++.>>.<-.<.+++.------.--------.>>+.>++.';
//$_POST['program'] = '>++++++++[<+++++++++>-]<.>>+>+>++>[-]+<[>[->+<<++++>]<<]>.+++++++..+++.>>+++++++.<<<[[-]<[-]>]<+++++++++++++++.>>.+++.------.--------.>>+.>++++.';

$controller = new \BrainfuckPHP\Controller\Controller();
$controller->initialise();
$controller->run();
