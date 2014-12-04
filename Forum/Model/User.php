<?php

class User{

	private $userId;
	private $userName;
	private $password;

	public function __construct($id, $name){
		$this->userId = $id;
		$this->userName = $name;
	}

	public function getName(){
		return $this->userName;
	}

	public function getId(){
		return $this->userId;
	}

	public function getPassword(){
		return $this->password;
	}
}