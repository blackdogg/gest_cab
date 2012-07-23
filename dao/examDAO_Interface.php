<?php
include("classes/examen.php");

interface examDAO_Interface{
	public function persistExam($e);
	public function listExam();
	public function examByPatient($id);
	public function examByDate($dt);
	public function examByType($type);
	public function delExam($id);
}
?>