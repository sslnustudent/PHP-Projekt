<?php

class Comment{

	private $commentId;
	private $threadId;
	private $commentText;
	private $userID;
	private $userName;
	private $time;

	public function __construct($id, $thread, $text, $user, $name, $timeWritten){
		$this->commentId = $id;
		$this->threadId = $thread;
		$this->commentText = $text;
		$this->userID = $user;
		$this->userName = $name;
		$this->time = $timeWritten;
	}

	public function getText(){
		return $this->commentText;
	}

	public function getId(){
		return $this->commentId;
	}

	public function getTime(){
		return $this->time;
	}

	public function getName(){
		return $this->userName;
	}
}