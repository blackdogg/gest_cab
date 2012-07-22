<?php
require_once ('classes/consultation.php');

interface consultDAO_Interface {
	public function persistConsul($c);
	public function listConsults();
	public function consultByPatient($patient);
	public function consultByDate($dt);
	public function removeConsult($id);
}
?>