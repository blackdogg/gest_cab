<?php
include ('classes/rdv.php');

interface rdvDAO_Interface {
	public function persistRDV($rdv);
	public function getRDVs();
	public function getRDVsByDate($dt);
	public function getRDVsByPatient($idpatient);
	public function removeRDV($id);
}
?>