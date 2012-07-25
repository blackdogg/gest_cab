<?php
require_once ("dao/examDAO_Interface.php");

class examDAO_Impl implements examDAO_Interface {
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
	
	public function persistExam($e){
		$insertExam = $this->con->prepare("INSERT INTO `patient_exam`(`patient_idpatient`, `type_exam_id`, `date_exam`, `rapport`) VALUES (?,?,?,?)");
		$insertExam->execute(array($e->getPatient(), $e->getType(), $e->getDate(), $e->getRapport()));
	}
	
	public function listExam(){
		$getExam = $this->con->query("SELECT * FROM `patient_exam`
									INNER JOIN patient ON patient.idpatient = patient_exam.patient_idpatient
									INNER JOIN type_exam ON type_exam.idtype_exam = patient_exam.type_exam_id");
		return $getExam->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function examByDate($dt){
		$exByDate = $this->con->prepare("SELECT nom, prenom, nom_exam, date_exam, rapport FROM `patient_exam` 
										INNER JOIN patient ON patient.idpatient = patient_exam.patient_idpatient
										INNER JOIN type_exam ON type_exam.idtype_exam = patient_exam.type_exam_id
										WHERE DATE(date_exam) = ?");
		$exByDate->execute(array($dt));
		return $exByDate->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function examByPatient($id){
		$exByPatient = $this->con->prepare("SELECT nom, prenom, nom_exam, date_exam, rapport FROM `patient_exam` 
										INNER JOIN patient ON patient.idpatient = patient_exam.patient_idpatient
										INNER JOIN type_exam ON type_exam.idtype_exam = patient_exam.type_exam_id
										WHERE patient_idpatient = ?");
		$exByPatient->execute(array($id));
		return $exByPatient->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function examByType($type){
		$exByType = $this->con->prepare("SELECT nom, prenom, nom_exam, date_exam, rapport FROM `patient_exam` 
										INNER JOIN patient ON patient.idpatient = patient_exam.patient_idpatient
										INNER JOIN type_exam ON type_exam.idtype_exam = patient_exam.type_exam_id
										WHERE type_exam_id = ?");
		$exByType->execute(array($type));
		return $exByType->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function delExam($id){
		$this->con->query("DELETE FROM patient_exam WHERE id_ex=".$this->con->quote($id));
	}

}
?>