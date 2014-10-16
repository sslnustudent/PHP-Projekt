<?php

class Thread{
	private $threadId;
	private $threadName;
	private $threadIsClosed;

	public function __construct($name, $id){
		$this->threadId = $id;
		$this->threadName = $name;
	}

	public function getName(){
		return $this->threadName;
	}

	public function getId(){
		return $this->threadId;
	}
}