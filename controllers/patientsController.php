<?php
require_once('dao/patientDAO_Impl.php');

class patientsController{
	private $action;
	private $dao;
	private $db;
	public function __construct($db){
		$this->db = $db;
		$this->action = 'list';
		$this->dao = new PatientDAO_Impl($this->db);
	}
		
	public function process(){
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
			switch($this->action){
				case 'list':
					$patients = $this->dao->getPatientList();
					$this->loadView('patients');
					break;
				case 'add':
					$this->loadView('patient_add');
					break;
				case 'del':
					break;
				case 'search':
					break;
				default:
					$this->action='list';
			}
		}else{
			
		}
	}
	
	public function loadView($v){
		$view = 'views/'.$v.'.php';
		include($view);
	}
}
?>