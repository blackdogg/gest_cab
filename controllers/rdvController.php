<?php
require_once ('dao/rdvDAO_Impl.php');

class rdvController{
	private $action;
	private $dao;
	
	function __construct(){
		$this->action='list';
		$this->dao = new rdvDAO_Impl;
	}
	
	function process(){
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
			switch ($this->action) {
				case 'list':
					if(isset($_POST['dt'])&&($_POST['dt'] != "")){
						$rdvs = $this->dao->getRDVsByDate($_POST['dt']);
					}elseif(isset($_POST['patient'])&&($_POST['patient'] != "")){
						$rdvs = $this->dao->getRDVsByPatient($_POST['patient']);
					}else{
						$rdvs=$this->dao->getRDVs();
					}
					$this->loadView('rdv', $rdvs);
					break;
				case 'add':
					$this->action = 'add';
					$this->loadView('rdv_add', NULL);
					break;
				case 'del':
					break;
				default:
					break;
			}
		}else{
			
		}
	}
	
	function loadView($v, $data){
		$view = 'views/' . $v . '.php';
		$rdvs = $data;
		include ($view);
	}
}
?>