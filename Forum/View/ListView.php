<?php

require_once("..\Forum\Model\ThreadRepository.php");
require_once("..\Forum\Model\CommentRepository.php");
require_once("..\Forum\Model\Thread.php");
require_once("..\Forum\Model\Comment.php");

class ListView{

	public function showList(){

		$ret = "<h1>Forum</h1>";


		if(!empty($_POST["commenttxt"])){
			$db = new CommentRepository();
			$db->addComment($_POST["commenttxt"], 1, $_GET["thread"]);
		}
		if(isset($_GET["thread"])){
			
			$db = new CommentRepository();
			$CommentList = $db->toList($_GET["thread"]);
			for($i=1; $i <= count($CommentList); $i++){
				$ret .= "<p> ";
				$ret .= $CommentList[$i-1]->getText();
				$ret .= "</p>";
			}

				$ret .= "<form action='' method='post' enctype='multipart/form-data'>
				<fieldset>
				<legend>Skriv in din kommentar</legend>
				<input name='commenttxt' type='text' value=''>
				<input type='submit' name value='Kommenterar'>
				</fieldset>
				</form>";
			
		}
		else{
			$db = new ThreadRepository();
			$threadsList = $db->toList();
			for($i=1; $i <= count($threadsList); $i++){
				$ret .= "<a href='?thread=";
				$ret .= $threadsList[$i-1]->getID();
				$ret .= "'>";
				$ret .= $threadsList[$i-1]->getName();
				$ret .= "</a>";
				$ret .= "<p></p>";
			}
		}
		return $ret;
	}
}