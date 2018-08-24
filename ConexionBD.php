<?php

class ConexionBD{
	private $mysqli = null;
	private $host = "";
	private $user = "";
	private $pw = "";
	private $bd = "";

	public function getMySQLi(){
		return $mysqli;
	}

	public function setMySQLi($mysqli){
		$this->$mysqli = $mysqli;
	}

	public function getHost(){
		return $host;
	}

	public function setHost($host){
		$this->$host = $host;
	}

	public function getUser(){
		return $user;
	}

	public function setUser($user){
		$this->$user = $user;
	}

	public function getPw(){
		return $pw;
	}

	public function setPw($pw){
		$this->$pw = $pw;
	}

	public function getBd(){
		return $bd;
	}

	public function setBd($bd){
		$this->$bd = $bd;
	}


}

?>