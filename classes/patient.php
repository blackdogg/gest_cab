<?php
class Patient{
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
	
	public function __construct($nom, $prenom, $dt, $sf, $sp){
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->date_naiss = $dt;
		$this->sf = $sf;
		$this->sp = $sp;
	}
	
	public function setId($id){
		$this->idpatient = $id;
	}
	
	public function getId(){
		return $this->idpatient;
	}
	
	public function setNom($nom){
		$this->nom = $nom;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function  setPrenom($pren){
		$this->prenom = $pren;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	
	public function setDateNaiss($dt){
		$this->date_naiss = $dt;
	}
	
	public function getDateNaiss(){
		return $this->date_naiss;
	}
	
	public function setSf($sf){
		$this->sf = $sf;
	}
	
	public function getSf(){
		return $this->sf;
	}
	
	public function setSp($sp){
		$this->sp = $sp;
	}
	
	public function getSp(){
		return $this->sp;
	}
}
?>