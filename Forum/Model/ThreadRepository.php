<?php

require_once("..\Forum\Model\Repository.php");
require_once("..\Forum\Model\Thread.php");

class ThreadRepository extends Repository{

	private $threads;

	public function __construct(){
		$this->dbTable = "threadstable";
			
	}

	public function addThread($name, $threadID){

		$db = $this->connection();

		$sql = "INSERT INTO $this->dbTable (Name, ThreadID) VALUES (?, ?)";
		$params = array($name, $threadID);

		$query = $db->prepare($sql);
		$query->execute($params);

	}

	public function toList(){

	
			$db = $this->connection();
			$sql = "SELECT * FROM $this->dbTable";
			$query = $db->prepare($sql);
			$query->execute();

			foreach ($query->fetchAll() as $owner) {
				$name = $owner["Name"];
				$id = $owner["ThreadID"];

				$thread = new Thread($name, $id);

				$this->threads[] = $thread;
			}

			return $this->threads;
		

	}

}