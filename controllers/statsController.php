<?php
class statsController {
	private $db;

	function __construct() {
		$host = "localhost";
		$port = "3306";
		$database = "cabinet_med";
		$username = "root";
		$password = "";

		try {
			$this -> db = new PDO("mysql:host=" . $host . ";port=" . $port . ";dbname=" . $database . ";", $username, $password);
		} catch(Exception $e) {
			echo "Erreur : " . $e -> getMessage() . "<br />";
			echo "N° :" . $e -> getCode();
		}
	}

	public function process() {
		$stats = array();
		if ((isset($_POST['dt_from']) && ($_POST['dt_from'] != "")) && (isset($_POST['dt_to']) && ($_POST['dt_to'] != ""))) {
			$consultQ = $this -> db -> query("SELECT COUNT(idconsultation) FROM consultation WHERE date BETWEEN '" . $_POST['dt_from'] . "' AND '" . $_POST['dt_to'] . "'");
			$nCons = $consultQ -> fetchColumn();
			$stats['ncons'] = $nCons;
			
			$ecgQ = $this->db->query("SELECT COUNT(id_ex) FROM patient_exam WHERE date_exam BETWEEN ".$_POST['dt_from']." AND ".$_POST['dt_to']." AND type_exam_id=1");
			$nEcg = $ecgQ->fetchColumn();
			$stats['ecg'] = $nEcg;
			
			$mapaQ = $this->db->query("SELECT COUNT(id_ex) FROM patient_exam WHERE date_exam BETWEEN ".$_POST['dt_from']." AND ".$_POST['dt_to']." AND type_exam_id=2");
			$nMapa = $mapaQ->fetchColumn();
			$stats['mapa'] = $nMapa;
			
			$edcQ = $this->db->query("SELECT COUNT(id_ex) FROM patient_exam WHERE date_exam BETWEEN ".$_POST['dt_from']." AND ".$_POST['dt_to']." AND type_exam_id=3");
			$nEdc = $edcQ->fetchColumn();
			$stats['edc'] = $nEdc;
			
			$edvQ = $this->db->query("SELECT COUNT(id_ex) FROM patient_exam WHERE date_exam BETWEEN ".$_POST['dt_from']." AND ".$_POST['dt_to']." AND type_exam_id=4");
			$nEdv = $edvQ->fetchColumn();
			$stats['edv'] = $nEdv;
			
			$t = $nEcg+$nEdc+$nEdv+$nMapa;
			$stats['total'] = $t;
		}
		$this -> loadView('stats', $stats);
	}

	function loadView($v, $data) {
		$view = 'views/' . $v . '.php';
		$stats = $data;
		include ($view);
	}

}
?>