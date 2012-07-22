<?php
include ('dao/rdvDAO_Interface.php');

class rdvDAO_Impl implements rdvDAO_Interface {
	private $con;
	public function __construct() {
		$host = "localhost";
		$port = "3306";
		$database = "cabinet_med";
		$username = "root";
		$password = "";

		try {
			$this -> con = new PDO("mysql:host=" . $host . ";port=" . $port . ";dbname=" . $database . ";", $username, $password);
			$this -> con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $e) {
			echo "Erreur : " . $e -> getMessage() . "<br />";
			echo "N° :" . $e -> getCode();
		}
	}
	
	public function persistRDV($rdv){
		$persistRDV = $this->con->prepare("INSERT INTO `rdv`(`patient_idpatient`, `date`, `motif`) VALUES (?,?,?)");
		$persistRDV->execute(array($rdv->getPatient(), $rdv->getDate(), $rdv->getMotif()));
	}
	
	public function getRDVsByDate($dt){
		$listRDVQuery = $this -> con->prepare("SELECT * FROM rdv WHERE date=?");
		return $listRDVQuery->execute(array($dt));
	}
	
	public function removeRDV($id){
		$removeRDVQuery = $this->con->prepare("DELETE FROM rdv WHERE idrdv=?");
		$removeRDVQuery->execute(array($id));
	}
	
	public function getRDVsByPatient($idpatient){
		$listRDVQuery = $this -> con->prepare("SELECT * FROM rdv WHERE patient_idpatient=?");
		return $listRDVQuery->execute(array($idpatient));
	}
}
?>