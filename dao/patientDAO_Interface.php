<?php
	include('classes/patient.php');
	
    interface PatientDAO{
    	public function persistPatient(Patient $p);
    	public function getPatientList();
		public function getPatient($id);
		//public function getPatient($nom);
		public function getPatientRDV($id);
		public function getPatientEVO($id);
		public function getPatientEXM($id);
		public function getPatientCON($id);
    }
?>