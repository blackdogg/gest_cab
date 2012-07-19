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
}
?>