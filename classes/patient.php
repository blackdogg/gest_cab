<?php
class Patient {
	private $idpatient;
	private $nom;
	private $prenom;
	private $date_naiss;
	private $adresse;
	private $num_tel;
	private $aicdf;
	private $aicdp;
	private $sf;
	private $sp;

	public function __construct($nom, $prenom, $dt, $adr, $sf, $sp, $aicdf, $aicdp, $tel) {
		$this -> nom = $nom;
		$this -> prenom = $prenom;
		$this -> date_naiss = $dt;
		$this -> sf = $sf;
		$this -> sp = $sp;
		$this -> adresse = $adr;
		$this -> date_naiss = $dt;
		$this -> aicdf = $aicdf;
		$this -> aicdp = $aicdp;
		$this -> num_tel = $tel;
	}

	public function setId($id) {
		$this -> idpatient = $id;
	}

	public function getId() {
		return $this -> idpatient;
	}

	public function setNom($nom) {
		$this -> nom = $nom;
	}

	public function getNom() {
		return $this -> nom;
	}

	public function setPrenom($pren) {
		$this -> prenom = $pren;
	}

	public function getPrenom() {
		return $this -> prenom;
	}

	public function setDateNaiss($dt) {
		$this -> date_naiss = $dt;
	}

	public function getDateNaiss() {
		return $this -> date_naiss;
	}

	public function setSf($sf) {
		$this -> sf = $sf;
	}

	public function getSf() {
		return $this -> sf;
	}

	public function setSp($sp) {
		$this -> sp = $sp;
	}

	public function getSp() {
		return $this -> sp;
	}

	public function setAicdF($aicd) {
		$this -> aicdf = $aicd;
	}

	public function getAicdF() {
		return $this -> aicdf;
	}

	public function setAicdP($aicd) {
		$this -> aicdp = $aicd;
	}

	public function getAicdP() {
		return $this -> aicdp;
	}

	public function setAdresse($adr) {
		$this -> adresse = $adr;
	}

	public function getAdresse() {
		return $this -> adresse;
	}

	public function setTel($tel) {
		$this -> num_tel = $tel;
	}

	public function getTel() {
		return $this -> num_tel;
	}

}
?>