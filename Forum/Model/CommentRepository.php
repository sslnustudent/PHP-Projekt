<?php

require_once("..\Forum\Model\Repository.php");
require_once("..\Forum\Model\Comment.php");
class CommentRepository extends Repository{

	private $comments;

	public function __construct(){
		$this->dbTable = "commenttable";
			
	}

	public function addComment($text, $thread, $user){

		$db = $this->connection();

		$sql = "INSERT INTO $this->dbTable (CommentText, UserID, ThreadID) VALUES (?, ?, ?)";
		$params = array($text, $thread, $user);

		$query = $db->prepare($sql);
		$query->execute($params);

	}

	public function toList($threadID){

	
			$db = $this->connection();
			$sql = "SELECT * FROM $this->dbTable WHERE ThreadID = $threadID";
			$query = $db->prepare($sql);
			$query->execute();

			foreach ($query->fetchAll() as $owner) {
				$text = $owner["CommentText"];
				$id = $owner["CommentID"];
				$user = $owner["UserID"];
				$thread = $owner["ThreadID"];

				$comment = new Comment($id, $thread, $text, $user);

				$this->comments[] = $comment;
			}

			return $this->comments;
		

	}

}