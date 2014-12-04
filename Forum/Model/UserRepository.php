<?php

require_once("..\Forum\Model\Repository.php");
require_once("..\Forum\Model\User.php");

class UserRepository extends Repository{

	private $user;

	public function __construct(){
		$this->dbTable = "usertable";
	}

	public function addUser(){}

	public function getPassword($userID){

	}

	public function LogIn(){}



}