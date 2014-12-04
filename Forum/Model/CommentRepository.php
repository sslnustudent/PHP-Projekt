<?php

require_once("..\Forum\Model\Repository.php");
require_once("..\Forum\Model\Comment.php");
class CommentRepository extends Repository{

	private $comments;

	public function __construct(){
		$this->dbTable = "commenttable";
		$this->dbTable2 = "usertable";
			
	}

	public function addComment($text, $thread, $user){

		$db = $this->connection();

		$sql = "INSERT INTO $this->dbTable (CommentText, UserID, ThreadID) VALUES (?, ?, ?)";
		$params = array($text, $thread, $user);

		$query = $db->prepare($sql);
		$query->execute($params);

	}

	public function deleteComment($commentID){

		$db = $this->connection();

		$sql = "DELETE FROM $this->dbTable WHERE CommentID = ?";

		$query = $db->prepare($sql);
		$query->execute($commentID);
		

	}

	public function editComment($commentText, $commentID){
		$db = $this->connection();

		$sql = "UPDATE$this->dbTable SET CommentText = ? WHERE CommentID = ?";

		$query = $db->prepare($sql);
		$query->execute($commentText, $commentID);

	}

	public function toList($threadID){

			$db = $this->connection();
			//Kolla om funka med sqln
			$sql = "SELECT * FROM $this->dbTable LEFT JOIN $this->dbTable2 ON $this->dbTable.UserID=$this->dbTable2.UserID WHERE ThreadID = $threadID";
			$query = $db->prepare($sql);
			$query->execute();

			foreach ($query->fetchAll() as $owner) {
				$text = $owner["CommentText"];
				$id = $owner["CommentID"];
				$user = $owner["UserID"];
				$thread = $owner["ThreadID"];
				$time = $owner["TimeWritten"];
				$userName = $owner["UserName"];

				$comment = new Comment($id, $thread, $text, $user, $userName, $time);

				$this->comments[] = $comment;
			}

			return $this->comments;
		

	}

}