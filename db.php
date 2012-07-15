<?php
    $host = "";
	$port = "3306";
	$database = "";
	$username = "";
	$password = "";
	
	try{
		$db = new PDO("mysql:host=".$host.";port=".$port.";dbname=".$database.";",$username,$password);
	}catch(Exception $e){
		echo "Erreur : ".$e->getMessage()."<br />";
		echo "N° :".$e->getCode();
	}
?>