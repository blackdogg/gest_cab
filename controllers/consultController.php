<?php
require_once('dao/consultDAO_Impl.php');

class consultController{
	private $dao;
	private $action;
	
	function __construct(){
		$this->dao = new consultDAO_Impl;
	}
	
	public function process(){
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
			switch ($this->action) {
				case 'list':
					if(isset($_POST['dt'])&&($_POST['dt'] != "")){
						$consults = $this->dao->consultByDate($_POST['dt']);
					}elseif(isset($_POST['patient'])&&($_POST['patient'] != "")){
						$consults = $this->dao->consultByPatient($_POST['patient']);
					}else{
						$consults = $this->dao->listConsults();
					}
					$this->loadView('consults', $consults);
					break;
				case 'add':
					$this->action = 'add';
					$this->loadView('consult_add', NULL);
					break;
				case 'del':
					$this->action = 'del';
					$this->dao->removeConsult($_GET['id']);
					break;		
				default:								
					break;
			}
		}else{
			$this->action='list';
			$consults = $this->dao->listConsults();
			$this->loadView('consults', $consults);
		}
	}
	
	public function loadView($v, $data) {
		$view = 'views/' . $v . '.php';
		$consults = $data;
		include ($view);
	}
}
?>