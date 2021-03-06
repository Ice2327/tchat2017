<?php

class DB{

	private $host ="";
	private $login = "root";
	private $pwd = "";
	private $dataname = "sql8614_tchat";
	private $db;


	public function __construct($host=null,$login=null,$pwd=null,$dataname=null){
		if($host!=null){
			$this->host = DB_HOST;
			$this->login = DB_LOGIN;
			$this->pwd = DB_PASS;
			$this->dataname = DB_NAME;
		}
		try{
			$this->db = new PDO("mysql:host=".$this->host.';dbname='.$this->dataname, $this->login, $this->pwd, array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		}catch(PDOExecption $e){
			die("Connexion à la db impossible");
		}
	}
	public function query($sql){
		$req = $this->db->query($sql);
		return $req->fetchAll(PDO::FETCH_ASSOC);
	} 
}

