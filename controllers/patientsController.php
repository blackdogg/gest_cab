<?php
require_once ('dao/patientDAO_Impl.php');

class patientsController {
	private $action;
	private $dao;

	public function __construct() {
		$this -> action = 'list';
		$this -> dao = new PatientDAO_Impl();
	}

	public function process() {
		if (isset($_GET['action'])) {
			$this -> action = $_GET['action'];
			switch($this->action) {
				case 'list' :
					$patients = $this -> dao -> getPatientList();
					$this -> loadView('patients', $patients);
					break;
				case 'add' :
					$this -> loadView('patient_add', NULL);
					break;
				case 'del' :
					$this -> dao -> removePatient($_GET['id']);
					safe_redirect('index.php?page=patients&action=list');
					break;
				case 'detail' :					
					$p = $this->dao->getPatient($_GET['id']);
					$this->loadView('patient_detail', $p);
					break;
				default :
					$this -> action = 'list';
					$patients = $this -> dao -> getPatientList();
					$this -> loadView('patients', $patients);
			}
		} else {
			$this -> action = 'list';
			$patients = $this -> dao -> getPatientList();
			$this -> loadView('patients', $patients);
		}
	}

	public function loadView($v, $data) {
		$view = 'views/' . $v . '.php';
		$patients = $data;
		require ($view);
	}

}
?>