<?php

require_once("..\Forum\View\HTMLView.php");

session_start();

//$controller = new LogInController();
$htmlbody = "<h1>Test</h1>";
//$controller->doControll();

$view = new HTMLView();
$view->echoHTML($htmlbody);