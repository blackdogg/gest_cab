<?php
class Patient{
	private $nom;
	private $prenom;
	private $date_naiss;
	private $sf;
	private $sp;
	
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
	
	public function setDateNiass($dt){
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