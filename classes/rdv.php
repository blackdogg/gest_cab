<?php
class Rdv{
	private $id;
	private $patient_idpatient;
	private $daterdv;
	private $motif;
	
	public function __construct($idpatient, $date, $motif){
		$this->patient_idpatient = $idpatient;
		$this->daterdv = $date;
		$this->motif = $motif;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setPatient($id){
		$this->patient_idpatient = $id;
	}
	
	public function getPatient(){
		return $this->patient_idpatient;
	}
	
	public function setDate($dt){
		$this->daterdv = $dt;
	}
	
	public function getDate(){
		return $this->daterdv;
	}
	
	public function setMotif($m){
		$this->motif = $mt;
	}
	
	public function getMotif(){
		return $this->motif;
	}
}
?>