<?php
require_once('dao/examDAO_Impl.php');

class examsController{
	private $dao;
	private $action;
	
	public function __construct(){
		$this->dao = new examDAO_Impl;
		$this->action = 'list';
	}
	
	public function process(){
		if(isset($_GET['ation'])){
			$this->action = $_GET['action'];
			switch($this->action){
				case 'list':
					if(isset($_GET['dt'])){
						$exams = $this->dao->examByDate($_GET['dt']);
					}elseif(isset($_GET['patient'])){
						$exams = $this->dao->examByPatient($_GET['patient']);
					}else{
						$exams=NULL;
					}
					$this->loadView('exams', $exams);
					break;
				case 'add':
					$this->loadView('exams_add', NULL);
					break;
				default :
					$this->action = 'add';
					$this->loadView('exams_add', NULL);
					break;
			}
		}
	}
	
	public function loadView($v, $data) {
		$view = 'views/' . $v . '.php';
		$consults = $data;
		include ($view);
	}
}
?>