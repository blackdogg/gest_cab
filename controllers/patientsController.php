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
					break;
				case 'search' :
					break;
				default :
					$this -> action = 'list';
			}
		} else {

		}
	}

	public function loadView($v, $data) {
		$view = 'views/' . $v . '.php';
		$patients = $data;
		include ($view);
	}

}
?>