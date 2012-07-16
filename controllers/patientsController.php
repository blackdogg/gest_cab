<?php
require_once('dao/patientDAO_Impl.php');

class PatientController{
	private $action;
	private $dao;
	public function __construct(){
		$this->action = 'list';
		$dao = new PatientDAO_Impl();
	}
	
	public function process(){
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
			switch($this->action){
				case 'list':
					break;
				case 'add':
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