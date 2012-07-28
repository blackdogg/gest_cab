<?php
require_once('dao/examDAO_Impl.php');

class examsController{
	private $dao;
	private $action;
	
	public function __construct(){
		$this->dao = new examDAO_Impl;
		//$this->action = 'list';
	}
	
	public function process(){
		if(isset($_GET['action'])){
			$this->action = $_GET['action'];
			switch($this->action){
				case 'list':
					if(isset($_POST['dt'])&&($_POST['dt'] != "")){
						$exams = $this->dao->examByDate($_POST['dt']);
					}elseif(isset($_POST['patient'])&&($_POST['patient'] != "")){
						$exams = $this->dao->examByPatient($_POST['patient']);
					}else{
						$exams = $this->dao->listExam();
					}
					$this->loadView('exams', $exams);
					break;
				case 'add':
					$this->loadView('exams_add', NULL);
					break;
				case 'del':
					$this->action = 'del';
					$this->dao->delExam($_GET['id']);
					safe_redirect('index.php?page=exams&action=list');
					break;
				default :
					break;
			}
		}else{
			$this->action = 'list_all';
			$exams = $this->dao->listExam();
			$this->loadView('exams', $exams);
		}
	}
	
	public function loadView($v, $data) {
		$view = 'views/' . $v . '.php';
		$examens = $data;
		include ($view);
	}
}
?>