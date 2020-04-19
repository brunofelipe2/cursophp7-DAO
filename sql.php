<?php

class Sql extends PDO{

	private $conn;

	public function __construct(){
							
		$this->conn = new PDO("mysql:host=localhost:3308;dbname=dbphp7", "root", "");
	}

	private function setParams($statment, $parameters = array()){

		//associar os comandos a esses paramentos
		foreach ($parameters as $key => $value) {
			
			$this->setParams($key, $value);
		}

	}

	private function setParam($statement, $key, $value){

		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){

		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt;
		
	}

	public function select($rawQuery, $params= array()):array{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}

?>