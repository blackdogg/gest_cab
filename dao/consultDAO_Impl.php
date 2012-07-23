<?php
require_once ('dao/consultDAO_Interface.php');

class consultDAO_Impl implements consultDAO_Interface {
	private $con;

	public function __construct() {
		$host = "localhost";
		$port = "3306";
		$database = "cabinet_med";
		$username = "root";
		$password = "";

		try {
			$this -> con = new PDO("mysql:host=" . $host . ";port=" . $port . ";dbname=" . $database . ";", $username, $password);
			$this -> con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $e) {
			echo "Erreur : " . $e -> getMessage() . "<br />";
			echo "N° :" . $e -> getCode();
		}
	}

	public function persistConsult($c) {
		$insertCon = $this -> con -> prepare("INSERT INTO `consultation`(`patient_idpatient`, `date`, `rapport`) VALUES (?,?,?)");
		$insertCon -> execute(array($c -> getPaient(), $c -> getDaet(), $c -> getRapport()));
	}

	public function listConsults() {
		$getConsults = $this -> con -> query("SELECT nom, prenom , date, rapport FROM consultation
										INNER JOIN patient ON patient.idpatient = consultation.patient_idpatient");
		return $getConsults -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function consultByDate($dt) {
		$getConsultByDate = $this -> con -> prepare("SELECT nom, prenom , date, rapport FROM consultation
										INNER JOIN patient ON patient.idpatient = consultation.patient_idpatient
										WHERE date=");
		$getConsultByDate -> execute(array($dt));
		return $getConsultByDate -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function consultByPatient($patient) {
		$getConsultByPatient = $this -> con -> prepare("SELECT nom, prenom , date, rapport FROM consultation
										INNER JOIN patient ON patient.idpatient = consultation.patient_idpatient
										WHERE date=");
		$getConsultByPatient -> execute(array($patient));
		return $getConsultByPatient -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function removeConsult($id) {
		$this -> con -> query("DELETE FROM consultation WHERE idconsultation=" . $this -> con -> quote($id));
	}
}
?>