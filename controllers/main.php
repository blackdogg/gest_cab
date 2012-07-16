<?php
class Main{
	
	public function __construct(){
		
	}
	
	public function process(){
		if(isset($_GET['page'])){
			echo "loading ".$_GET['page'].".php";
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