<?php

class Comment{

	private $commentId;
	private $threadId;
	private $commentText;
	private $userID;

	public function __construct($id, $thread, $text, $user){
		$this->commentId = $id;
		$this->threadId = $thread;
		$this->commentText = $text;
		$this->userID = $user;
	}

	public function getText(){
		return $this->commentText;
	}

	public function getId(){
		return $this->commentId;
	}
}