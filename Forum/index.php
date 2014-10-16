<?php

require_once("..\Forum\View\HTMLView.php");
require_once("..\Forum\Model\ThreadRepository.php");
require_once("..\Forum\Model\CommentRepository.php");
require_once("..\Forum\Model\Thread.php");
require_once("..\Forum\Model\Comment.php");
require_once("..\Forum\View\ListView.php");

session_start();

//$controller = new LogInController();
$view = new ListView();
$htmlbody = $view->showList();

//$controller->doControll();

$view = new HTMLView();
$view->echoHTML($htmlbody);