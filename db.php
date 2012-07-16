<?php
    $host = "localhost";
	$port = "3306";
	$database = "cabinet_med";
	$username = "root";
	$password = "";
	
	try{
		$db = new PDO("mysql:host=".$host.";port=".$port.";dbname=".$database.";",$username,$password);
	}catch(Exception $e){
		echo "Erreur : ".$e->getMessage()."<br />";
		echo "N° :".$e->getCode();
	}
?>