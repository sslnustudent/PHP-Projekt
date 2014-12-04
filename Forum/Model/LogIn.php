<?php

require_once("..\Forum\Model\UserRepository.php");
require_once("..\Forum\Model\User.php");

class LogIn{

	private $user;

	public function __construct($id){
	$db = new UserRepository();
	$this->user = $db->getUser($id);
	}

	public function loggingIn($user, $password)
	{
			
		if($user === $this->user && $password === $this->password){
		$_SESSION["LoggedIn"] = 1;
		return true;
		}
		elseif($user === $this->user && $password === md5($this->password)){
			$_SESSION["LoggedIn"] = 1;
			return true;
		}
		else{
		return false;
		}
	}

	public function loggedIn()
	{
		if(isset($_SESSION["LoggedIn"]) == true){
			return true;
		}
		else{
			return false;
		}
	}

	public function logOut(){
		unset($_SESSION["LoggedIn"]);
	}
}