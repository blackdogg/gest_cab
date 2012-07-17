<?php
require_once ('dao/patientDAO_Interface.php');

class PatientDAO_Impl implements PatientDAO {
	private $con;
	public function __construct($db) {
		$this -> con = $db;
	}

	public function persistPatient(Patient $p) {
		$persist = $this -> con -> prepare("INSERT INTO `patient`(`nom`, `prenom`, `date_naissance`, `sf`, `sp`) VALUES (?,?,?,?,?)");
		$persist -> execute(array($p -> getNom(), $p -> getPrenom(), $p -> getDateNaiss(), $p -> getSf(), $p -> getSp()));
	}

	public function getPatient($id) {
		$getPatient = $this -> con -> prepare("SELECT `idpatient`, `nom`, `prenom`, `date_naissance`, `sf`, `sp` FROM `patient` WHERE idpatient=?");
		$getPatient -> execute(array($id));
		$result = $getPatient -> fetch(PDO::FETCH_ASSOC);
		$patient = new Patient($result['nom'], $result['prenom'], $result['date_naissance'], $result['sf'], $result['sp']);
		$patient -> setId($result['idpatient']);
		return $patient;
	}

	public function getPatientList() {
		$list = $this -> con -> query("SELECT * FROM patient");
		return $list -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPatientRDV($is) {

	}

	public function getPatientEXM($id) {

	}

	public function getPatientEVO($id) {

	}

	public function getPatientCON($id) {

	}

}
?>