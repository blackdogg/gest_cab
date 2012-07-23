<?php
class Consultation {
	private $idconsultation;
	private $patient;
	private $date_consult;
	private $rapport;

	public function __construct($patien, $date, $rapport) {
		$this -> patient = $patien;
		$this -> date_consult = $date;
		$this -> rapport = $rapport;
	}

	public function setId($id) {
		$this -> idconsultation = $id;
	}

	public function getId() {
		return $this -> idconsultation;
	}

	public function setPatient($id) {
		$this -> patient = $id;
	}

	public function getPatient() {
		return $this -> patient;
	}

	public function setDateConsult($dt) {
		$this -> date_consult = $dt;
	}

	public function getDateConsult() {
		return $this -> date_consult;
	}

	public function setRapport($rap) {
		$this -> rapport = $rap;
	}

	public function getRapport() {
		return $this -> rapport;
	}

}
?>