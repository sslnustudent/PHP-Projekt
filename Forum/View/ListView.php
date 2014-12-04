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

		if(!empty($_POST["newThreadtbn"])){
			$ret .= "<h2>Skiv din tråd</h2>";
			$ret .= "<form action='' method='post' enctype='multipart/form-data'>
				<fieldset>
				<legend>Skriv in din tråd</legend>
				<label>Namn på tråden</label>
				<input name='threadnamtxt' type='text' value=''>
				<label>Ange texten för din kommentar</label>
				<input name='commenttxt' type='text' value=''>
				<input type='submit' name='threadbtn' value='Lägg till tråd'>
				</fieldset>
				</form>";
		}

		//Kommentarerna i en tråd
		if(isset($_GET["thread"])){
			
			$db = new CommentRepository();
			$CommentList = $db->toList($_GET["thread"]);
			for($i=1; $i <= count($CommentList); $i++){


				$ret .= "<div class='CommentFrame'>";
				$ret .= "<p class='CommentUser'>";
				$ret .= $CommentList[$i-1]->getName();
				$ret .= "</p>";
				$ret .= "<p class='CommentTime'> ";
				$ret .= $CommentList[$i-1]->getTime();
				$ret .= "</p>";
				$ret .= "<p class='CommentText'> ";
				$ret .= $CommentList[$i-1]->getText();
				$ret .= "</p>";
				$ret .= "</div>";

			}
				$ret .= "<div id=MakeCommentDiv>";
				$ret .= "<form action='' method='post' enctype='multipart/form-data'>
				<label ID='TextLabel'>Skriv in din kommentar</label>
				<input name='commenttxt' class='writebox' TextMode='MultiLine' MaxLength='300' type='text' value=''>
				<input type='submit' ID='CommentButton' value='Lägg till kommentar'>
				</form>";
				$ret .= "</div>";
			
		}
		// Lista över alla trådar
		else{
			//Knapp för ny tråd
			$ret .= "<form action='' method='post' enctype='multipart/form-data'>
			<input type='submit' name='newThreadtbn' value='Ny tråd'>
			</form>";
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