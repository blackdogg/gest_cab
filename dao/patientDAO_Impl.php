<?php
require_once ('dao/patientDAO_Interface.php' );

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
	echo "Erreur : " . $e -> getMessage() . "
	<br />
	";
	echo "N° :" . $e -> getCode();
	}
	}

	public function persistPatient($p) {
	$persist = $this -> con -> prepare(
"INSERT INTO `patient`(`nom`, `prenom`, `date_naissance`, `adresse`, `tel`, `sf`, `sp`, `aicdf`, `aicdp`) VALUES (?,?,?,?,?,?,?,?,?)");
		$persist -> execute(array($p -> getNom(), $p -> getPrenom(), $p -> getDateNaiss(), $p -> getAdresse(), $p -> getTel(), $p -> getSf(), $p -> getSp(), $p -> getAicdF(), $p -> getAicdP()));
	}
	
	public function removePatient($p){
		$this->con->query("DELETE FROM patient WHERE idpatient=".$this->con->quote($p->getId(),PDO::PARAM_INT));
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

	public function getPatientRDV($id) {
		$listRDVs = $this -> con -> query("SELECT * FROM rdv WHERE id_patient=" . $this -> con -> quote($id, PDO::PARAM_INT));
		return $listRDVs -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPatientEXM($id) {
		$listEXMs = $this -> con -> query("SELECT * FROM examen WHERE id_patient=" . $this -> con -> quote($id, PDO::PARAM_INT));
		return $listEXMs -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPatientEVO($id) {
		$listEVOs = $this -> con -> query("SELECT FROM evolution WHERE id_patient=" . $this -> con -> quote($id, PDO::PARAM_INT));
		return $listEVOs -> fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPatientCON($id) {
		$listCONs = $this -> con -> query("SELECT FROM evolution WHERE id_patient=" . $this -> con -> quote($id, PDO::PARAM_INT));
		return $listCONs -> fetchAll(PDO::FETCH_ASSOC);
	}

}
?>