<?php
    require_once('dao/patientDAO_Interface.php');
	require_once('db.php');
	
	class PatientDAO_Impl implements PatientDAO{
		public function persistPatient(Patient $p){
			$persist = $db->prepare("INSERT INTO `patient`(`nom`, `prenom`, `date_naissance`, `sf`, `sp`) VALUES (?,?,?,?,?)");
			$persist->execute(array($p->getNom(),$p->getPrenom(),$p->getDateNaiss(),$p->getSf(),$p->getSp()));
		}
		
		public function getPatient($id){
			$getPatient = $db->prepare("SELECT `idpatient`, `nom`, `prenom`, `date_naissance`, `sf`, `sp` FROM `patient` WHERE idpatient=?");
			$getPatient->execute(array($id));
			$result = $getPatient->fetch(PDO::FETCH_ASSOC);
			$patient = new Patient($result['nom'], $result['prenom'], $result['date_naissance'], $result['sf'], $result['sp']);
			$patient->setId($result['idpatient']);
			return $patient;
		}
		
		public function getPatientList(){
			$list = $db->query("SELECT * FROM patient");
			$patients = $list->fetchAll(PDO::FETCH_ASSOC);
			return $patients;
		}
		
		public function getPatientRDV($is){
			
		}
		
		public function getPatientEXM($id){
			
		}
		
		public function getPatientEVO($id){
			
		}
		
		public function getPatientCON($id){
			
		}
	}
?>