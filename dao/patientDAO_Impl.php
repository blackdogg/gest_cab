<?php
require_once ('dao/patientDAO_Interface.php');

class PatientDAO_Impl implements PatientDAO {
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

	public function persistPatient($p) {
		$persist = $this -> con -> prepare("INSERT INTO `patient`(`nom`, `prenom`, `date_naissance`, `adresse`, `tel`, `sf`, `sp`, `aicdf`, `aicdp`) VALUES (?,?,?,?,?,?,?,?,?)");
		$persist -> execute(array($p -> getNom(), $p -> getPrenom(), $p -> getDateNaiss(), $p -> getAdresse(), $p -> getTel(), $p -> getSf(), $p -> getSp(), $p -> getAicdF(), $p -> getAicdP()));
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