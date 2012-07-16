<?php
class Main{
	
	public function __construct(){
		
	}
	
	public function process(){
		if(isset($_GET['action'])){
			
			if(file_exists('controllers/'.$_GET['page'].'Controller.php')){
				include('controllers/'.$_GET['page'].'Controller.php');
				$class = $_GET['page'].'Controller';
				$control = new $class;
				$control->process();
			}else{
				echo "404";
			}
		}else{
			$this->loadDefaultView();
		}
	}
	
	public function loadDefaultView(){
		$view_path = 'views/home.php';
		include($view_path);
	}
}
?>