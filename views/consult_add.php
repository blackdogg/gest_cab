<h2 class="page_title">Enregistrer une consultation</h2>

<form name="add_consult" method="post" action="">
	<label for="patient">Patient :</label>
	<span>
		<input type="text" name="nompatient" id="nompatient" readonly="readonly" />
		<img class="pop_btn" src="images/patients-icon.gif" width="16" height="16" onclick="popSelectPatient()" /></span>
	<input type="hidden" name="patient" id="patient" />

	<label for="dt_cons">Date :</label>
	<input type="text" name="dt_cons" id="dt_cons" />

	<label for="rapport">Rapport :</label>
	<textarea name="rapport" id="rapport"></textarea>	
	

	<div class="form_ctrl">
		<input type="submit" name="ok" id="ok" value="Valider"/>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$("#dt_cons").datepicker({
			yearRange : "-0:+5",
			changeMonth : true,
			changeYear : true
		});
		$("#dt_cons").datepicker("option", "dateFormat", "yy-mm-dd");
	});

	function popSelectPatient() {
		popup = window.open('views/popups/patient_list.php', 'Selection du patient', 'width=720,height=480');
	}
</script>

<?php
if (isset($_POST['ok'])) {
	$consult = new Consultation($_POST['patient'], $_POST['dt_cons'], $_POST['rapport']);
	$consDAO = new consultDAO_Impl;
	$consDAO->persistConsult($consult);
	safe_redirect('index.php?page=consult&action=list');
}
?>