<?php
class Main {

	public function __construct() {

	}

	public function process() {
		if (isset($_GET['page'])) {
			if (file_exists('controllers/' . $_GET['page'] . 'Controller.php')) {
				require ('controllers/' . $_GET['page'] . 'Controller.php');
				$class = $_GET['page'] . 'Controller';
				$control = new $class;
				$control -> process();
			} else {
				echo "Vous avez demander une page qui n'existe pas".$_GET['page'];
			}
		} else {
			$this -> loadDefaultView();
		}
	}

	public function loadDefaultView() {
		$view_path = 'views/home.php';
		include ($view_path);
	}

}
?>