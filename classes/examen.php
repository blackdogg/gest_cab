<?php
class Examen {
	private $id_ex;
	private $type_exam_id;
	private $patient_idpatient;
	private $date_exam;
	private $rapport;

	public function __construct($type, $patient, $date, $rapport) {
		$this -> type_exam_id = $type;
		$this -> patient_idpatient = $patient;
		$this -> date_exam = $date;
		$this -> rapport = $rapport;
	}

	public function setId($id) {
		$this -> id_ex = $id;
	}

	public function getId() {
		return $this -> id_ex;
	}

	public function setType($type) {
		$this -> type_exam_id = $type;
	}

	public function getType() {
		return $this -> type_exam_id;
	}

	public function setPatient($idpatient) {
		$this -> patient_idpatient = $idpatient;
	}

	public function getPatient() {
		return $this -> patient_idpatient;
	}

	public function setDate($dt) {
		$this -> date_exam = $dt;
	}

	public function getDate() {
		return $this -> date_exam;
	}

	public function setRapport($rap) {
		$this -> rapport = $rap;
	}

	public function getRapport() {
		return $this -> rapport;
	}

}
?>